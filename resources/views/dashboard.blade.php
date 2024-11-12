<x-app-layout>
    <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        @if (session('status'))
            <div
                class="mb-4 px-4 py-2 bg-green-100 dark:bg-green-800 text-green-700 dark:text-green-200 rounded-lg transition-all duration-500 ease-in-out">
                {{ session('status') }}
            </div>
        @endif

        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                @if (auth()->user()->isAdmin())
                    <h2 class="text-2xl font-semibold mb-4">
                        {{ __('Panel de Administración') }}
                    </h2>
                    <p class="mb-6 text-gray-600 dark:text-gray-400">
                        {{ __('Bienvenido al panel de administración del sistema de reservas.') }}
                    </p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <x-dashboard-card title="{{ __('Gestionar Salas') }}"
                            description="{{ __('Administra las salas disponibles para reserva.') }}"
                            icon="office-building" link="{{ route('rooms.index') }}" />
                        <x-dashboard-card title="{{ __('Ver Reservaciones') }}"
                            description="{{ __('Revisa todas las reservaciones actuales.') }}" icon="calendar"
                            link="{{ route('reservations.index') }}" />
                    </div>
                @else
                    <h2 class="text-2xl font-semibold mb-4">
                        {{ __('Bienvenido a tu Panel') }}
                    </h2>
                    <p class="mb-6 text-gray-600 dark:text-gray-400">
                        {{ __('Desde aquí puedes gestionar tus reservas de espacios de coworking.') }}
                    </p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <x-dashboard-card title="{{ __('Nueva Reservación') }}"
                            description="{{ __('Reserva un nuevo espacio de coworking.') }}" icon="plus-circle"
                            link="{{ route('reservations.create') }}" />
                        <x-dashboard-card title="{{ __('Mis Reservaciones') }}"
                            description="{{ __('Revisa tus reservaciones actuales.') }}" icon="clipboard-list"
                            link="{{ route('reservations.index') }}" />
                    </div>
                @endif
            </div>
        </div>
    </main>
    </div>
</x-app-layout>
