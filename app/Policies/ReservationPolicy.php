<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Reservation;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReservationPolicy
{
  public function view(User $user, Reservation $reservation)
  {
    return $user->id === $reservation->user_id || $user->isAdmin();
  }

  public function update(User $user, Reservation $reservation)
  {
    return $user->isAdmin();
  }

  public function delete(User $user, Reservation $reservation)
  {
    return $user->id === $reservation->user_id || $user->isAdmin();
  }
}
