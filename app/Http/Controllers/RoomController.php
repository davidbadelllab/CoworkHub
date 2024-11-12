<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
  public function index()
  {

    $rooms = Room::when(request('type'), function ($query, $type) {
      return $query->where('type', $type);
    })
      ->where('status', 'available')
      ->get();

    return view('rooms.index', compact('rooms'));
  }

  public function show(Room $room)
  {
    return view('rooms.show', compact('room'));
  }

  public function create()
  {
    return view('rooms.create');
  }

  public function store(Request $request)
  {
    $validated = $request->validate([
      'name' => 'required|string|max:255',
      'type' => 'required|in:hot_desk,dedicated_desk,private_office',
      'description' => 'required|string',
      'capacity' => 'required|integer|min:1',
      'price' => 'required|numeric|min:0',
      'amenities' => 'required|array',
      'status' => 'required|in:available,occupied,maintenance',
    ]);

    $room = Room::create($validated);

    return redirect()
      ->route('rooms.show', $room)
      ->with('success', 'Sala creada exitosamente.');
  }

  public function edit(Room $room)
  {
    return view('rooms.edit', compact('room'));
  }

  public function update(Request $request, Room $room)
  {
    $validated = $request->validate([
      'name' => 'required|string|max:255',
      'type' => 'required|in:hot_desk,dedicated_desk,private_office',
      'description' => 'required|string',
      'capacity' => 'required|integer|min:1',
      'price' => 'required|numeric|min:0',
      'amenities' => 'required|array',
      'status' => 'required|in:available,occupied,maintenance',
    ]);

    $room->update($validated);

    return redirect()
      ->route('rooms.show', $room)
      ->with('success', 'Sala actualizada exitosamente.');
  }

  public function destroy(Room $room)
  {
    $room->delete();

    return redirect()
      ->route('rooms.index')
      ->with('success', 'Sala eliminada exitosamente.');
  }
}
