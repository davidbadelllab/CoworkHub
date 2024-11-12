<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Vite: CSS and JS -->
    @vite(['resources/assets/vendor/fonts/remixicon/remixicon.scss', 'resources/assets/vendor/scss/core.scss', 'resources/assets/vendor/scss/theme-default.scss', 'resources/assets/css/demo.css', 'resources/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.scss', 'resources/css/app.css', 'resources/js/app.js'])


    <!--Icons and boostraps -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Bootstrap and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

    <style>
        .dashboard-layout {
            display: flex;
            min-height: 100vh;
            background-color: #f8fafc;
        }

        .sidebar {
            width: 250px;
            background-color: #1f2937;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
        }

        .main-content {
            flex-grow: 1;
            margin-left: 250px;
            padding: 2rem;
            background-color: #ffffff;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            padding: 1.5rem 0;
        }

        .dashboard-card {
            background-color: #fff;
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .dashboard-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .dark .dashboard-card {
            background-color: #374151;
        }

        .dark .main-content {
            background-color: #1f2937;
        }

        /* Estilos para el contenedor de toasts */
        .toast-container {
            z-index: 1050;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 0;
                transform: translateX(-100%);
                transition: transform 0.3s ease-in-out;
            }

            .sidebar.show {
                width: 250px;
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>

<body class="font-figtree antialiased">
    <!-- Toast Container -->
    <div class="toast-container position-fixed top-0 end-0 p-3">
        @if (session('success'))
            <div class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive"
                aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('success') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
        @endif

        @if (session('error'))
            <div class="toast align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive"
                aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('error') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
        @endif

        @if (session('warning'))
            <div class="toast align-items-center text-dark bg-warning border-0" role="alert" aria-live="assertive"
                aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('warning') }}
                    </div>
                    <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
        @endif

        @if (session('info'))
            <div class="toast align-items-center text-white bg-info border-0" role="alert" aria-live="assertive"
                aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('info') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
        @endif
    </div>

    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <!-- Navbar -->
        @include('layouts.sections.navbar.navbar')

        <!-- Layout with Sidebar and Main Content -->
        <div class="dashboard-layout">
            <!-- Sidebar -->
            <div class="sidebar">
                @include('layouts.sections.menu.verticalMenu')
            </div>

            <!-- Main Content Area -->
            <main class="main-content">
                <div class="container-fluid">
                    <h1 class="text-2xl font-semibold mb-6">Dashboard</h1>

                    <div class="dashboard-grid">
                        <!-- Rooms Overview Card -->
                        <x-dashboard-card title="Salas Disponibles"
                            description="Gestiona y visualiza todas las salas disponibles" icon="office-building"
                            link="{{ route('rooms.index') }}" />

                        <!-- Reservations Card -->
                        <x-dashboard-card title="Reservaciones" description="Ver y administrar todas las reservaciones"
                            icon="calendar" link="{{ route('reservations.index') }}" />

                        <!-- New Reservation Card -->
                        <x-dashboard-card title="Nueva Reservación" description="Crear una nueva reservación de sala"
                            icon="plus-circle" link="{{ route('reservations.create') }}" />

                        <!-- Reports Card -->
                        <x-dashboard-card title="Reportes" description="Accede a los reportes y estadísticas"
                            icon="clipboard-list" link="#" />
                    </div>
                </div>
                {{ $slot }}
            </main>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var toastElList = [].slice.call(document.querySelectorAll('.toast'));
            var toastList = toastElList.map(function(toastEl) {
                return new bootstrap.Toast(toastEl, {
                    autohide: true,
                    delay: 3000
                });
            });

            // Mostrar los toasts
            toastList.forEach(toast => toast.show());
        });
    </script>
</body>

</html>
