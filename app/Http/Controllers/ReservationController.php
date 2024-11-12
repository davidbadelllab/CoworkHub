<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ReservationController extends Controller
{
  use AuthorizesRequests;

  public function index()
  {
    $reservations = Reservation::with(['room', 'user'])->get();
    return view('reservations.index', compact('reservations'));
  }

  public function create()
  {
    $rooms = Room::where('status', 'available')->get();
    return view('reservations.create', compact('rooms'));
  }

  public function store(Request $request)
  {
    $validated = $request->validate([
      'room_id' => 'required|exists:rooms,id',
      'start_time' => 'required|date|after:now',
      'notes' => 'nullable|string|max:500'
    ]);

    $start_time = Carbon::parse($validated['start_time']);
    $end_time = $start_time->copy()->addHour();

    // Verificar disponibilidad
    $exists = Reservation::where('room_id', $validated['room_id'])
      ->where(function ($query) use ($start_time, $end_time) {
        $query->where(function ($q) use ($start_time, $end_time) {
          $q->where('start_time', '<=', $start_time)
            ->where('end_time', '>', $start_time);
        })
          ->orWhere(function ($q) use ($start_time, $end_time) {
            $q->where('start_time', '<', $end_time)
              ->where('end_time', '>=', $end_time);
          });
      })->exists();

    if ($exists) {
      return back()->with('error', 'La sala no está disponible en ese horario.');
    }

    try {
      Reservation::create([
        'user_id' => auth()->id(),
        'room_id' => $validated['room_id'],
        'start_time' => $start_time,
        'end_time' => $end_time,
        'status' => 'pendiente',
        'notes' => $validated['notes'] ?? null
      ]);

      return redirect()
        ->route('reservations.index')
        ->with('success', 'Reserva creada exitosamente.');
    } catch (\Exception $e) {
      return back()
        ->with('error', 'Ocurrió un error al crear la reserva. Por favor, intente nuevamente.');
    }
  }

  public function show(Reservation $reservation)
  {
    try {
      $this->authorize('view', $reservation);
      return view('reservations.show', compact('reservation'));
    } catch (\Exception $e) {
      return redirect()
        ->route('reservations.index')
        ->with('error', 'No tiene permisos para ver esta reserva.');
    }
  }

  public function updateStatus(Request $request, Reservation $reservation)
  {
    $validated = $request->validate([
      'status' => 'required|in:aceptada,rechazada'
    ]);

    try {
      $reservation->update([
        'status' => $validated['status']
      ]);

      return redirect()
        ->route('reservations.index')
        ->with('success', 'Estado de la reservación actualizado correctamente.');
    } catch (\Exception $e) {
      return back()
        ->with('error', 'Error al actualizar el estado de la reservación.');
    }
  }

  public function destroy(Reservation $reservation)
  {
    try {
      $this->authorize('delete', $reservation);
      $reservation->delete();

      return redirect()
        ->route('reservations.index')
        ->with('success', 'Reserva cancelada exitosamente.');
    } catch (\Exception $e) {
      return back()
        ->with('error', 'Error al cancelar la reserva.');
    }
  }

  public function getAvailableRooms(Request $request)
  {
    try {
      $start_time = Carbon::parse($request->start_time);
      $end_time = $start_time->copy()->addHour();

      $availableRooms = Room::where('status', 'available')
        ->whereNotExists(function ($query) use ($start_time, $end_time) {
          $query->select('rooms.id')
            ->from('reservations')
            ->whereColumn('reservations.room_id', 'rooms.id')
            ->where(function ($q) use ($start_time, $end_time) {
              $q->where(function ($inner) use ($start_time) {
                $inner->where('start_time', '<=', $start_time)
                  ->where('end_time', '>', $start_time);
              })->orWhere(function ($inner) use ($end_time) {
                $inner->where('start_time', '<', $end_time)
                  ->where('end_time', '>=', $end_time);
              });
            });
        })->get();

      return response()->json([
        'success' => true,
        'rooms' => $availableRooms
      ]);
    } catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'message' => 'Error al obtener las salas disponibles.'
      ], 500);
    }
  }
}
