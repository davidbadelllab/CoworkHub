<x-guest-layout>

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
<script src="https://cdn.tailwindcss.com"></script>

<style>
    .gradient-text {
        background: linear-gradient(to right, #4F46E5, #7C3AED);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .fade-up {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .fade-up.visible {
        opacity: 1;
        transform: translateY(0);
    }

    .feature-card {
        transition: all 0.3s ease;
    }

    .feature-card:hover {
        transform: translateY(-10px) scale(1.02);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }

    .pricing-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .pricing-card:hover {
        transform: scale(1.05);
    }

    .testimonial-card {
        transition: all 0.5s ease;
    }

    .testimonial-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    }

    .scroll-images {
        animation: scroll 20s linear infinite;
    }

    @keyframes scroll {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }

    .gradient-border {
        background: linear-gradient(white, white) padding-box,
                    linear-gradient(to right, #4F46E5, #7C3AED) border-box;
        border: 3px solid transparent;
    }


/* Ocultar scrollbar */
.hide-scroll-bar {
  -ms-overflow-style: none;  /* IE y Edge */
  scrollbar-width: none;     /* Firefox */
  scroll-behavior: smooth;
}

.hide-scroll-bar::-webkit-scrollbar {
  display: none;  /* Chrome, Safari y Opera */
}

/* Animaciones para las cards */
.pricing-card {
  transition: all 0.3s ease;
}

.pricing-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
}

/* Estilo para el texto gradiente */
.gradient-text {
  background: linear-gradient(to right, #4F46E5, #7C3AED);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

</style>
@endpush

@section('content')
    <!-- Navigation -->
    <nav class="fixed w-full bg-white/80 dark:bg-gray-900/80 backdrop-blur-xl z-50 border-b border-gray-200 dark:border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex-shrink-0 flex items-center">
                    <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                    <span class="ml-2 text-2xl font-bold gradient-text text-white">CoWorkHub</span>
                </div>

                <div class="hidden md:flex space-x-8">
                    <a href="#spaces" class="text-gray-600 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400 transition">Spaces</a>
                    <a href="#amenities" class="text-gray-600 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400 transition">Amenities</a>
                    <a href="#pricing" class="text-gray-600 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400 transition">Pricing</a>
                    <a href="#events" class="text-gray-600 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400 transition">Events</a>
                </div>

                <div class="flex items-center space-x-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="px-4 py-2 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                            Dashboard
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="px-4 py-2 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700 transition">
                                Logout
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="px-4 py-2 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                            Login
                        </a>
                        <a href="{{ route('register') }}" class="px-4 py-2 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700 transition">
                            Start Free
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section with Video Background -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <video class="w-full h-full object-cover" autoplay loop muted playsinline>
              <source src="{{ asset('assets/video/coworking-bg.mp4') }}" type="video/mp4">
            </video>
            <div class="absolute inset-0 bg-black/50"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32 text-center">
            <h1 class="animate__animated animate__fadeInUp text-5xl md:text-7xl font-bold text-white mb-6">
                Where Great Work
                <span class="text-indigo-400">Happens</span>
            </h1>
            <p class="animate__animated animate__fadeInUp animate__delay-1s text-xl text-gray-200 mb-12 max-w-3xl mx-auto">
                Join a community of innovators, entrepreneurs, and creators. Find your perfect workspace and unlock your potential.
            </p>
            <div class="animate__animated animate__fadeInUp animate__delay-2s flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#tour" class="px-8 py-4 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700 transition transform hover:scale-105">
                    Book a Tour
                </a>
                <a href="#pricing" class="px-8 py-4 rounded-lg border-2 border-white text-white hover:bg-white hover:text-indigo-600 transition transform hover:scale-105">
                    View Pricing
                </a>
            </div>
        </div>

        <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
            </svg>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-20 bg-white dark:bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center fade-up">
                    <div class="text-4xl font-bold text-white mb-2" data-counter="3000">12000</div>
                    <div class="text-gray-600 dark:text-gray-400">Members</div>
                </div>
                <div class="text-center fade-up">
                    <div class="text-4xl font-bold text-white mb-2" data-counter="5">199</div>
                    <div class="text-gray-600 dark:text-gray-400">Locations</div>
                </div>
                <div class="text-center fade-up">
                    <div class="text-4xl font-bold text-white mb-2" data-counter="500">400</div>
                    <div class="text-gray-600 dark:text-gray-400">Events Yearly</div>
                </div>
                <div class="text-center fade-up">
                    <div class="text-4xl font-bold text-white mb-2" data-counter="98">100%</div>
                    <div class="text-gray-600 dark:text-gray-400">% Satisfaction</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Spaces Section -->
    <section id="spaces" class="py-20 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold text-center mb-16 fade-up">
                <span class="gradient-text text-white">Workspace Solutions</span>
            </h2>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Private Offices -->
                <div class="bg-white dark:bg-gray-800 rounded-xl overflow-hidden shadow-lg feature-card">
                    <img src="{{ asset('img/private-office.jpg') }}" alt="Private Office" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold  text-white mb-2">Private Offices</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">
                            Furnished private offices with 24/7 access, perfect for teams of 1-20 people.
                        </p>
                        <a href="#contact" class="text-indigo-600 hover:text-indigo-700 font-medium">Learn More →</a>
                    </div>
                </div>

                <!-- Dedicated Desks -->
                <div class="bg-white dark:bg-gray-800 rounded-xl overflow-hidden shadow-lg feature-card">
                    <img src="{{ asset('img/dedicated-desk.jpg') }}" alt="Dedicated Desk" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-white mb-2">Dedicated Desks</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">
                            Your own desk in a shared space with lockable storage and ergonomic chair.
                        </p>
                        <a href="#contact" class="text-indigo-600 hover:text-indigo-700 font-medium">Learn More →</a>
                    </div>
                </div>

                <!-- Hot Desks -->
                <div class="bg-white dark:bg-gray-800 rounded-xl overflow-hidden shadow-lg feature-card">
                    <img src="{{ asset('img/hot-desk.jpg') }}" alt="Hot Desk" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-white mb-2">Hot Desks</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">
                            Flexible workspace access with any available desk when you need it.
                        </p>
                        <a href="#contact" class="text-indigo-600 hover:text-indigo-700 font-medium">Learn More →</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Amenities Section -->
    <section id="amenities" class="py-20 bg-white dark:bg-gray-800">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <h2 class="text-4xl font-bold text-center mb-16 fade-up">
              <span class="gradient-text text-white">Premium Amenities</span>
          </h2>

          <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
              <!-- WiFi -->
              <div class="text-center fade-up">
                  <div class="w-16 h-16 mx-auto mb-4 bg-indigo-100 dark:bg-indigo-900 rounded-full flex items-center justify-center">
                      <svg class="w-8 h-8 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.14 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0" />
                      </svg>
                  </div>
                  <h3 class="text-lg font-semibold text-gray-900 dark:text-white">High-Speed WiFi</h3>
              </div>

              <!-- Meeting Rooms -->
              <div class="text-center fade-up">
                  <div class="w-16 h-16 mx-auto mb-4 bg-indigo-100 dark:bg-indigo-900 rounded-full flex items-center justify-center">
                      <svg class="w-8 h-8 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                      </svg>
                  </div>
                  <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Meeting Rooms</h3>
              </div>

              <!-- Coffee Bar -->
              <div class="text-center fade-up">
                  <div class="w-16 h-16 mx-auto mb-4 bg-indigo-100 dark:bg-indigo-900 rounded-full flex items-center justify-center">
                      <svg class="w-8 h-8 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                      </svg>
                  </div>
                  <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Coffee Bar</h3>
              </div>

              <!-- 24/7 Access -->
              <div class="text-center fade-up">
                  <div class="w-16 h-16 mx-auto mb-4 bg-indigo-100 dark:bg-indigo-900 rounded-full flex items-center justify-center">
                      <svg class="w-8 h-8 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>
                  </div>
                  <h3 class="text-lg font-semibold text-gray-900 dark:text-white">24/7 Access</h3>
              </div>

              <!-- Phone Booths -->
              <div class="text-center fade-up">
                  <div class="w-16 h-16 mx-auto mb-4 bg-indigo-100 dark:bg-indigo-900 rounded-full flex items-center justify-center">
                      <svg class="w-8 h-8 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                      </svg>
                  </div>
                  <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Phone Booths</h3>
              </div>

              <!-- Mail Service -->
              <div class="text-center fade-up">
                  <div class="w-16 h-16 mx-auto mb-4 bg-indigo-100 dark:bg-indigo-900 rounded-full flex items-center justify-center">
                      <svg class="w-8 h-8 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                      </svg>
                  </div>
                  <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Mail Service</h3>
              </div>

              <!-- Printing -->
              <div class="text-center fade-up">
                  <div class="w-16 h-16 mx-auto mb-4 bg-indigo-100 dark:bg-indigo-900 rounded-full flex items-center justify-center">
                      <svg class="w-8 h-8 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                      </svg>
                  </div>
                  <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Printing</h3>
              </div>

              <!-- Event Space -->
              <div class="text-center fade-up">
                  <div class="w-16 h-16 mx-auto mb-4 bg-indigo-100 dark:bg-indigo-900 rounded-full flex items-center justify-center">
                      <svg class="w-8 h-8 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                      </svg>
                  </div>
                  <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Event Space</h3>
              </div>
          </div>
      </div>
  </section>

<!-- Contenedor principal con máximo ancho y centrado -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
  <!-- Título de la sección -->
  <h2 class="text-4xl font-bold text-center mb-16">
      <span class="gradient-text">Simple, Transparent Pricing</span>
  </h2>

  <!-- Contenedor del scroll con gradientes -->
  <div class="relative">
      <!-- Gradientes para indicar scroll -->
      <div class="absolute left-0 top-0 bottom-0 w-20 bg-gradient-to-r from-gray-50 to-transparent z-10 pointer-events-none"></div>
      <div class="absolute right-0 top-0 bottom-0 w-20 bg-gradient-to-l from-gray-50 to-transparent z-10 pointer-events-none"></div>

      <!-- Contenedor del scroll -->
      <div class="overflow-x-auto pb-12 hide-scroll-bar">
          <!-- Contenedor flex centrado -->
          <div class="flex gap-8 p-4 mx-auto justify-center min-w-max">
              <!-- Hot Desk Plan -->
              <div class="w-[350px] pricing-card bg-white rounded-xl p-8 shadow-xl relative border border-gray-100 hover:border-indigo-500 transition-all duration-300 transform hover:-translate-y-1">
                  <div class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                      <span class="px-6 py-2 rounded-full text-sm font-semibold bg-indigo-100 text-indigo-600 shadow-lg">
                          STARTER
                      </span>
                  </div>
                  <h3 class="text-xl font-bold text-center text-gray-800 mt-6">Hot Desk</h3>
                  <div class="text-center my-8">
                      <span class="text-4xl font-bold text-gray-900">$199</span>
                      <span class="text-gray-600">/month</span>
                  </div>
                  <ul class="space-y-4 mb-8">
                      <li class="flex items-center text-gray-600">
                          <svg class="w-5 h-5 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                          </svg>
                          <span>Flexible Seating</span>
                      </li>
                      <li class="flex items-center text-gray-600">
                          <svg class="w-5 h-5 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                          </svg>
                          <span>High-Speed WiFi</span>
                      </li>
                      <li class="flex items-center text-gray-600">
                          <svg class="w-5 h-5 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                          </svg>
                          <span>5 Meeting Room Hours</span>
                      </li>
                  </ul>
                  <button class="w-full py-3 rounded-lg border-2 border-indigo-600 text-indigo-600 hover:bg-indigo-600 hover:text-white transition-all duration-300 transform hover:scale-105">
                      Get Started
                  </button>
              </div>

              <!-- Dedicated Desk Plan -->
              <div class="w-[350px] pricing-card bg-white rounded-xl p-8 shadow-xl relative border border-gray-100 hover:border-indigo-500 transition-all duration-300 transform hover:-translate-y-1">
                  <div class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                      <span class="px-6 py-2 rounded-full text-sm font-semibold bg-indigo-600 text-white shadow-lg">
                          POPULAR
                      </span>
                  </div>
                  <h3 class="text-xl font-bold text-center text-gray-800 mt-6">Dedicated Desk</h3>
                  <div class="text-center my-8">
                      <span class="text-4xl font-bold text-gray-900">$299</span>
                      <span class="text-gray-600">/month</span>
                  </div>
                  <ul class="space-y-4 mb-8">
                      <li class="flex items-center text-gray-600">
                          <svg class="w-5 h-5 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                          </svg>
                          <span>Personal Reserved Desk</span>
                      </li>
                      <li class="flex items-center text-gray-600">
                          <svg class="w-5 h-5 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                          </svg>
                          <span>24/7 Access</span>
                      </li>
                      <li class="flex items-center text-gray-600">
                          <svg class="w-5 h-5 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                          </svg>
                          <span>10 Meeting Room Hours</span>
                      </li>
                  </ul>
                  <button class="w-full py-3 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700 transition-all duration-300 transform hover:scale-105">
                      Get Started
                  </button>
              </div>

              <!-- Private Office Plan -->
              <div class="w-[350px] pricing-card bg-white rounded-xl p-8 shadow-xl relative border border-gray-100 hover:border-indigo-500 transition-all duration-300 transform hover:-translate-y-1">
                  <div class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                      <span class="px-6 py-2 rounded-full text-sm font-semibold bg-gray-900 text-white shadow-lg">
                          ENTERPRISE
                      </span>
                  </div>
                  <h3 class="text-xl font-bold text-center text-gray-800 mt-6">Private Office</h3>
                  <div class="text-center my-8">
                      <span class="text-4xl font-bold text-gray-900">$899</span>
                      <span class="text-gray-600">/month</span>
                  </div>
                  <ul class="space-y-4 mb-8">
                      <li class="flex items-center text-gray-600">
                          <svg class="w-5 h-5 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                          </svg>
                          <span>Private Space for Teams</span>
                      </li>
                      <li class="flex items-center text-gray-600">
                          <svg class="w-5 h-5 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                          </svg>
                          <span>Customizable Space</span>
                      </li>
                      <li class="flex items-center text-gray-600">
                          <svg class="w-5 h-5 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                          </svg>
                          <span>20 Meeting Room Hours</span>
                      </li>
                  </ul>
                  <button class="w-full py-3 rounded-lg border-2 border-indigo-600 text-indigo-600 hover:bg-indigo-600 hover:text-white transition-all duration-300 transform hover:scale-105">
                      Contact Sales
                  </button>
              </div>
          </div>
      </div>
  </div>

  <!-- Indicadores de scroll (opcional) -->
  <div class="flex justify-center mt-8 gap-2">
      <button class="w-2 h-2 rounded-full bg-gray-300 hover:bg-indigo-600 transition-colors"></button>
      <button class="w-2 h-2 rounded-full bg-gray-300 hover:bg-indigo-600 transition-colors"></button>
      <button class="w-2 h-2 rounded-full bg-gray-300 hover:bg-indigo-600 transition-colors"></button>
  </div>
</div>

<!-- Testimonials Section -->
<section class="py-20 bg-white dark:bg-gray-800">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<h2 class="text-4xl font-bold text-center mb-16">
  <span class="gradient-text text-white">What Our Members Say</span>
</h2>

<div class="grid md:grid-cols-3 gap-8">
  <!-- Testimonial 1 -->
  <div class="testimonial-card bg-gray-50 dark:bg-gray-700 p-8 rounded-xl">
      <div class="flex items-center mb-4">
          <img src="{{ asset('img/testimonial-1.jpg') }}" alt="Member" class="w-12 h-12 rounded-full object-cover">
          <div class="ml-4">
              <h4 class="font-semibold">Sarah Johnson</h4>
              <p class="text-sm text-gray-600 dark:text-gray-400">Startup Founder</p>
          </div>
      </div>
      <div class="mb-4">
          ⭐⭐⭐⭐⭐
      </div>
      <p class="text-gray-600 dark:text-gray-400">
          "CoWorkHub has been instrumental in growing my business. The community here is amazing and the facilities are top-notch."
      </p>
  </div>

  <!-- Testimonial 2 -->
  <div class="testimonial-card bg-gray-50 dark:bg-gray-700 p-8 rounded-xl">
      <div class="flex items-center mb-4">
          <img src="{{ asset('img/testimonial-2.jpg') }}" alt="Member" class="w-12 h-12 rounded-full object-cover">
          <div class="ml-4">
              <h4 class="font-semibold">Mark Thompson</h4>
              <p class="text-sm text-gray-600 dark:text-gray-400">Freelance Designer</p>
          </div>
      </div>
      <div class="mb-4">
          ⭐⭐⭐⭐⭐
      </div>
      <p class="text-gray-600 dark:text-gray-400">
          "The flexibility and professional environment here have helped me become more productive than ever."
      </p>
  </div>

  <!-- Testimonial 3 -->
  <div class="testimonial-card bg-gray-50 dark:bg-gray-700 p-8 rounded-xl">
      <div class="flex items-center mb-4">
          <img src="{{ asset('img/testimonial-3.jpg') }}" alt="Member" class="w-12 h-12 rounded-full object-cover">
          <div class="ml-4">
              <h4 class="font-semibold">Emily Chen</h4>
              <p class="text-sm text-gray-600 dark:text-gray-400">Tech Entrepreneur</p>
          </div>
      </div>
      <div class="mb-4">
          ⭐⭐⭐⭐⭐
      </div>
      <p class="text-gray-600 dark:text-gray-400">
          "The networking opportunities and events have been invaluable for growing my startup."
      </p>
  </div>
</div>
</div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-20 bg-gray-50 dark:bg-gray-900">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="grid md:grid-cols-2 gap-16 items-center">
  <div>
      <h2 class="text-4xl font-bold mb-8">
          <span class="gradient-text text-white">Get in Touch</span>
      </h2>
      <p class="text-gray-600 dark:text-gray-400 mb-8">
          Ready to join our community? Schedule a tour or contact us for more information.
      </p>
      <div class="space-y-6">
          <div class="flex items-center">
              <div class="w-12 h-12 bg-indigo-100 dark:bg-indigo-900 rounded-lg flex items-center justify-center mr-4">
                  <svg class="w-6 h-6 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                  </svg>
              </div>
              <div>
                  <h3 class="font-semibold">Phone</h3>
                  <p class="text-gray-600 dark:text-gray-400">+1 (555) 123-4567</p>
              </div>
          </div>
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold">Email</h3>
                            <p class="text-gray-600 dark:text-gray-400">info@coworkhub.com</p>
                        </div>
                    </div>

                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-indigo-100 dark:bg-indigo-900 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold">Location</h3>
                            <p class="text-gray-600 dark:text-gray-400">123 Innovation Street, Tech City</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-xl p-8 shadow-lg">
                    <form class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Name
                            </label>
                            <input type="text" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Email
                            </label>
                            <input type="email" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Interested In
                            </label>
                            <select class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700">
                                <option>Hot Desk</option>
                                <option>Dedicated Desk</option>
                                <option>Private Office</option>
                                <option>Event Space</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Message
                            </label>
                            <textarea rows="4" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-700 focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700"></textarea>
                        </div>

                        <button type="submit" class="w-full py-3 px-4 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="py-20 bg-indigo-600">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-white mb-8">Stay Updated with CoWorkHub</h2>
            <p class="text-indigo-100 mb-8 max-w-2xl mx-auto">
                Subscribe to our newsletter for the latest updates, community news, and exclusive offers.
            </p>
            <form class="max-w-md mx-auto flex gap-4">
                <input type="email" placeholder="Enter your email" class="flex-1 px-4 py-3 rounded-lg focus:ring-2 focus:ring-white">
                <button type="submit" class="px-6 py-3 bg-white text-indigo-600 rounded-lg hover:bg-indigo-50 transition">
                    Subscribe
                </button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-400 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-white font-semibold mb-4">Company</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-white transition">About</a></li>
                        <li><a href="#" class="hover:text-white transition">Careers</a></li>
                        <li><a href="#" class="hover:text-white transition">Press</a></li>
                        <li><a href="#" class="hover:text-white transition">Blog</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-white font-semibold mb-4">Services</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-white transition">Hot Desks</a></li>
                        <li><a href="#" class="hover:text-white transition">Dedicated Desks</a></li>
                        <li><a href="#" class="hover:text-white transition">Private Offices</a></li>
                        <li><a href="#" class="hover:text-white transition">Meeting Rooms</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-white font-semibold mb-4">Resources</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-white transition">Community</a></li>
                        <li><a href="#" class="hover:text-white transition">Events</a></li>
                        <li><a href="#" class="hover:text-white transition">FAQ</a></li>
                        <li><a href="#" class="hover:text-white transition">Partners</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-white font-semibold mb-4">Contact</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-white transition">Support</a></li>
                        <li><a href="#" class="hover:text-white transition">Sales</a></li>
                        <li><a href="#" class="hover:text-white transition">Locations</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-12 pt-8 flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0">
                    <span>© 2024 CoWorkHub. All rights reserved.</span>
                </div>
                <div class="flex space-x-6">
                    <a href="#" class="hover:text-white transition">Terms</a>
                    <a href="#" class="hover:text-white transition">Privacy</a>
                    <a href="#" class="hover:text-white transition">Cookies</a>
                </div>
            </div>
        </div>
    </footer>

    @push('scripts')
    <script>
        // Animación para contadores
        function animateCounter(element) {
            const target = parseInt(element.getAttribute('data-counter'));
            const duration = 2000;
            const steps = 50;
            const stepValue = target / steps;
            let current = 0;

            const timer = setInterval(() => {
                current += stepValue;
                if (current >= target) {
                    element.textContent = target;
                    clearInterval(timer);
                } else {
                    element.textContent = Math.floor(current);
                }
            }, duration / steps);
        }

        // Intersection Observer para las animaciones
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    if (entry.target.classList.contains('fade-up')) {
                        entry.target.classList.add('visible');
                    }
                    if (entry.target.hasAttribute('data-counter')) {
                        animateCounter(entry.target);
                    }
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.fade-up, [data-counter]').forEach((el) => observer.observe(el));
    </script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        const container = document.querySelector('.hide-scroll-bar');
        const cards = container.children;
        const dots = document.querySelectorAll('.mt-8 button');

        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                const card = cards[index];
                card.scrollIntoView({ behavior: 'smooth', inline: 'center' });

                // Actualizar estado activo de los dots
                dots.forEach(d => d.classList.remove('bg-indigo-600'));
                dot.classList.add('bg-indigo-600');
            });
        });

        // Observar el scroll para actualizar los dots
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const index = Array.from(cards).indexOf(entry.target);
                    dots.forEach((dot, i) => {
                        dot.classList.toggle('bg-indigo-600', i === index);
                    });
                }
            });
        }, {
            root: container,
            threshold: 0.5
        });

        Array.from(cards).forEach(card => observer.observe(card));
      });
      </script>
    @endpush
</section>
</x-guest-layout>
