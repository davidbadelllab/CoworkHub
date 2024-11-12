<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Editar Sala') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                  <form method="POST" action="{{ route('rooms.update', $room) }}">
                      @csrf
                      @method('PUT')

                      <div class="mb-3">
                          <label for="name" class="form-label">Nombre</label>
                          <input type="text" class="form-control @error('name') is-invalid @enderror"
                                 id="name" name="name" value="{{ old('name', $room->name) }}" required>
                          @error('name')
                              <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                      </div>

                      <div class="mb-3">
                          <label for="description" class="form-label">Descripción</label>
                          <textarea class="form-control @error('description') is-invalid @enderror"
                                    id="description" name="description">{{ old('description', $room->description) }}</textarea>
                          @error('description')
                              <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                      </div>

                      <div class="mb-3">
                          <button type="submit" class="btn btn-primary">Actualizar Sala</button>
                          <a href="{{ route('rooms.index') }}" class="btn btn-secondary">Cancelar</a>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
