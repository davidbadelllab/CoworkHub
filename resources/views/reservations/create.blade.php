<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Nueva Reservación') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                  <form method="POST" action="{{ route('reservations.store') }}">
                      @csrf

                      <div class="mb-3">
                          <label for="room_id" class="form-label">Sala</label>
                          <select name="room_id" id="room_id" class="form-control @error('room_id') is-invalid @enderror" required>
                              <option value="">Seleccione una sala</option>
                              @foreach($rooms as $room)
                                  <option value="{{ $room->id }}" {{ old('room_id') == $room->id ? 'selected' : '' }}>
                                      {{ $room->name }}
                                  </option>
                              @endforeach
                          </select>
                          @error('room_id')
                              <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                      </div>

                      <div class="mb-3">
                          <label for="start_time" class="form-label">Fecha y Hora</label>
                          <input type="datetime-local" class="form-control @error('start_time') is-invalid @enderror"
                                 id="start_time" name="start_time" value="{{ old('start_time') }}" required>
                          @error('start_time')
                              <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                      </div>

                      <div class="mb-3">
                          <button type="submit" class="btn btn-primary">Crear Reservación</button>
                          <a href="{{ route('reservations.index') }}" class="btn btn-secondary">Cancelar</a>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
