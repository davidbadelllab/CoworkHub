<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Salas de Coworking') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          @if(auth()->user()->isAdmin())
              <div class="mb-4">
                  <a href="{{ route('rooms.create') }}" class="btn btn-primary">
                      Crear Nueva Sala
                  </a>
              </div>
          @endif

          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                      @foreach($rooms as $room)
                          <div class="border rounded p-4">
                              <h3 class="text-lg font-semibold">{{ $room->name }}</h3>
                              <p class="text-gray-600">{{ $room->description }}</p>

                              <div class="mt-4">
                                  @if(auth()->user()->isAdmin())
                                      <a href="{{ route('rooms.edit', $room) }}" class="btn btn-sm btn-secondary">
                                          Editar
                                      </a>
                                      <form action="{{ route('rooms.destroy', $room) }}" method="POST" class="inline">
                                          @csrf
                                          @method('DELETE')
                                          <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Está seguro?')">
                                              Eliminar
                                          </button>
                                      </form>
                                  @else
                                      <a href="{{ route('reservations.create', ['room_id' => $room->id]) }}" class="btn btn-sm btn-primary">
                                          Reservar
                                      </a>
                                  @endif
                              </div>
                          </div>
                      @endforeach
                  </div>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
