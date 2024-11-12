<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Reservation;
use App\Policies\ReservationPolicy;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
  /**
   * The model to policy mappings for the application.
   *
   * @var array<class-string, class-string>
   */
  protected $policies = [
    Reservation::class => ReservationPolicy::class,
  ];

  /**
   * Register any authentication / authorization services.
   */
  public function boot(): void
  {
    $this->registerPolicies();

    // Registrar política para administradores
    Gate::define('admin', function ($user) {
      return $user->isAdmin();
    });

    // Define gates adicionales aquí si son necesarios
    Gate::define('manage-reservations', function ($user) {
      return $user->isAdmin();
    });

    Gate::define('view-reservation', function ($user, $reservation) {
      return $user->id === $reservation->user_id || $user->isAdmin();
    });

    Gate::define('update-reservation', function ($user, $reservation) {
      return $user->isAdmin();
    });

    Gate::define('delete-reservation', function ($user, $reservation) {
      return $user->id === $reservation->user_id || $user->isAdmin();
    });
  }
}
