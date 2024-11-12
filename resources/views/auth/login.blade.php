<x-guest-layout>
  <div class="flex min-h-screen bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('img/LAUNCH-Vespucio-8.jpg') }}')">
      {{-- Panel izquierdo con imagen de fondo (visible en desktop) --}}
      <div class="hidden lg:block lg:w-1/2 relative">
          {{-- Puedes agregar contenido adicional sobre la imagen aquí --}}
          <div class="absolute inset-0 flex items-center justify-center">
              <div class="text-white p-8">
                  <h1 class="text-4xl font-bold mb-4">Bienvenido de vuelta</h1>
                  <p class="text-xl">Inicia sesión para continuar</p>
              </div>
          </div>
      </div>

      {{-- Panel derecho con el formulario --}}
      <div class="w-full lg:w-1/2 flex items-center justify-center p-8 bg-white/95 dark:bg-gray-900/95">
          <div class="w-full max-w-2xl">
              <!-- Session Status -->
              <x-auth-session-status class="mb-4" :status="session('status')" />

              <form method="POST" action="{{ route('login') }}" class="space-y-6">
                  @csrf

                  <!-- Email Address -->
                  <div>
                      <x-input-label for="email" :value="__('Email')" class="text-gray-700 dark:text-gray-300 text-lg" />
                      <x-text-input
                          id="email"
                          class="mt-2 block w-full px-4 py-3 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-800 dark:border-gray-700 dark:text-white text-lg"
                          type="email"
                          name="email"
                          :value="old('email')"
                          required
                          autofocus
                          autocomplete="username"
                      />
                      <x-input-error :messages="$errors->get('email')" class="mt-2" />
                  </div>

                  <!-- Password -->
                  <div class="mt-6">
                      <x-input-label for="password" :value="__('Password')" class="text-gray-700 dark:text-gray-300 text-lg" />
                      <div class="relative">
                          <x-text-input
                              id="password"
                              class="mt-2 block w-full px-4 py-3 bg-white border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-800 dark:border-gray-700 dark:text-white text-lg"
                              type="password"
                              name="password"
                              required
                              autocomplete="current-password"
                          />
                      </div>
                      <x-input-error :messages="$errors->get('password')" class="mt-2" />
                  </div>

                  <!-- Remember Me -->
                  <div class="flex items-center justify-between mt-6">
                      <label for="remember_me" class="inline-flex items-center">
                          <input
                              id="remember_me"
                              type="checkbox"
                              class="w-5 h-5 rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                              name="remember"
                          >
                          <span class="ms-3 text-base text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                      </label>
                  </div>

                  <div class="flex items-center justify-between mt-6">
                      @if (Route::has('password.request'))
                          <a class="text-base text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300" href="{{ route('password.request') }}">
                              {{ __('Forgot your password?') }}
                          </a>
                      @endif

                      <x-primary-button class="px-6 py-3 text-base bg-indigo-600 hover:bg-indigo-700">
                          {{ __('Log in') }}
                      </x-primary-button>
                  </div>
              </form>
          </div>
      </div>
  </div>
</x-guest-layout>
