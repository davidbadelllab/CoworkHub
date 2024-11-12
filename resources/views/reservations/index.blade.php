<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mis Reservaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (!auth()->user()->isAdmin())
                <div class="mb-4">
                    <a href="{{ route('reservations.create') }}" class="btn btn-primary">
                        Nueva Reservación
                    </a>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Sala</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Estado</th>
                                @if (auth()->user()->isAdmin())
                                    <th>Usuario</th>
                                    <th>Acciones</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservations as $reservation)
                                <tr>
                                    <td>{{ $reservation->room->name }}</td>
                                    <td>{{ $reservation->start_time->format('Y-m-d') }}</td>
                                    <td>{{ $reservation->start_time->format('H:i') }}</td>
                                    <td>
                                        <span
                                            class="badge bg-{{ $reservation->status === 'pendiente' ? 'warning' : ($reservation->status === 'aceptada' ? 'success' : 'danger') }}">
                                            {{ ucfirst($reservation->status) }}
                                        </span>
                                    </td>
                                    @if (auth()->user()->isAdmin())
                                        <td>{{ $reservation->user->name }}</td>
                                        <td>
                                            <form action="{{ route('reservations.update-status', $reservation) }}"
                                                method="POST" class="inline">
                                                @csrf
                                                @method('PATCH')
                                                <select name="status" class="form-control form-control-sm">
                                                    <option value="aceptada"
                                                        @if ($reservation->status == 'aceptada') selected @endif>Aceptada
                                                    </option>
                                                    <option value="rechazada"
                                                        @if ($reservation->status == 'rechazada') selected @endif>Rechazada
                                                    </option>
                                                </select>
                                                <button type="submit"
                                                    class="btn btn-sm btn-primary">Actualizar</button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
