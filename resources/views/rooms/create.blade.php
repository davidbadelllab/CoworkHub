<x-app-layout>
  <x-slot name="header">
      <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">
          {{ __('Crear Nueva Sala') }}
      </h1>
  </x-slot>

  <div class="py-12">
      <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
              <div class="p-6 space-y-6">
                  <form method="POST" action="{{ route('rooms.store') }}" class="space-y-6">
                      @csrf

                      <div class="mb-3">
                          <label for="name" class="form-label text-gray-700 dark:text-gray-300">
                              {{ __('Nombre') }}
                          </label>
                          <input type="text" id="name" name="name"
                                 class="form-control @error('name') is-invalid @enderror"
                                 value="{{ old('name') }}" required autofocus>
                          @error('name')
                              <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                      </div>

                      <div class="mb-3">
                          <label for="description" class="form-label text-gray-700 dark:text-gray-300">
                              {{ __('Descripción') }}
                          </label>
                          <textarea id="description" name="description" rows="4"
                                    class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                          @error('description')
                              <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                      </div>

                      <div class="d-flex justify-content-end gap-3">
                          <a href="{{ route('rooms.index') }}"
                             class="btn btn-secondary">
                              {{ __('Cancelar') }}
                          </a>
                          <button type="submit"
                                  class="btn btn-primary">
                              {{ __('Crear Sala') }}
                          </button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
