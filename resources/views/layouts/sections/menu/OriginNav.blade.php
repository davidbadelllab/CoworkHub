<!--- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <style>
        /* Layout Styles */
        .layout-wrapper {
            min-height: 100vh;
        }

        .layout-container {
            display: flex;
            width: 100%;
        }

        .layout-menu {
            position: fixed;
            top: 0;
            left: 0;
            width: 260px;
            height: 100vh;
            background-color: #2f3349;
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        .layout-menu::-webkit-scrollbar {
            display: none;
        }

        .layout-page {
            margin-left: 260px;
            flex: 1;
            min-width: 0;
        }

        .menu-item.active {
            position: relative;
            background-color: rgba(147, 51, 234, 0.1);
        }

        .menu-item.active::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 3px;
            background-color: rgb(147, 51, 234);
        }

        .app-brand {
            padding: 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        @media (max-width: 1024px) {
            .layout-page {
                margin-left: 0;
            }
        }
    </style>
    <div class="layout-container">
        <!-- Menu -->
        <aside id="layout-menu" class="layout-menu menu-vertical">
            <div class="app-brand">
                <a href="/" class="flex items-center">
                    <span class="text-lg font-bold text-white">CoWorkHub</span>
                </a>
            </div>

            <!-- User Profile Section -->
            <div class="px-3 py-3 border-b border-slate-700">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-full bg-gray-200"></div>
                    <div>
                        <span class="block text-sm font-medium text-white">{{ Auth::user()->name }}</span>
                        <span
                            class="text-xs text-gray-400">{{ Auth::user()->is_admin ? 'Administrator' : 'User' }}</span>
                    </div>
                </div>
            </div>

            <div class="menu-inner py-2">
                <ul class="menu-inner-list">
                    <!-- Dashboard -->
                    <li class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <a href="{{ route('dashboard') }}"
                            class="flex items-center gap-2 px-3 py-2 text-gray-300 hover:text-white transition-colors">
                            <i class="ri-dashboard-line text-lg"></i>
                            <span class="text-sm">Dashboard</span>
                        </a>
                    </li>

                    <!-- Rooms -->
                    <li class="menu-item {{ request()->routeIs('rooms.*') ? 'active' : '' }}">
                        <a href="{{ route('rooms.index') }}"
                            class="flex items-center gap-2 px-3 py-2 text-gray-300 hover:text-white transition-colors">
                            <i class="ri-home-4-line text-lg"></i>
                            <span class="text-sm">Salas</span>
                        </a>
                    </li>

                    <!-- Reservations -->
                    <li class="menu-item {{ request()->routeIs('reservations.*') ? 'active' : '' }}">
                        <a href="{{ route('reservations.index') }}"
                            class="flex items-center gap-2 px-3 py-2 text-gray-300 hover:text-white transition-colors">
                            <i class="ri-calendar-line text-lg"></i>
                            <span class="text-sm">Reservaciones</span>
                        </a>
                    </li>

                    @if (Auth::user()->is_admin)
                        <!-- Admin Section -->
                        <li class="px-3 py-2">
                            <span class="text-xs font-semibold text-gray-400 uppercase">Administración</span>
                        </li>

                        <!-- Room Management -->
                        <li class="menu-item {{ request()->routeIs('rooms.create') ? 'active' : '' }}">
                            <a href="{{ route('rooms.create') }}"
                                class="flex items-center gap-2 px-3 py-2 text-gray-300 hover:text-white transition-colors">
                                <i class="ri-settings-line text-lg"></i>
                                <span class="text-sm">Gestión de Salas</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </aside>

        <!-- Layout page -->
        <div class="layout-page">
            <!-- Navbar -->
            <nav class="bg-white px-6 py-3 h-16 shadow">
                <div class="flex justify-between items-center">
                    <h2 class="text-xl font-semibold">Panel de Administración</h2>
                </div>
            </nav>

            <!-- Content wrapper -->
            <div class="content-wrapper p-6">
                <!-- Content -->
                <div class="container mx-auto">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</div>
