<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ReservationController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('welcome');
});

Route::get('/dashboard', function () {
  return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


  Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');
  Route::get('/rooms/{room}', [RoomController::class, 'show'])->name('rooms.show');


  Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
  Route::get('/reservations/create', [ReservationController::class, 'create'])->name('reservations.create');
  Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
  Route::get('/reservations/{reservation}', [ReservationController::class, 'show'])->name('reservations.show');


  Route::middleware(AdminMiddleware::class)->group(function () {
    Route::get('/rooms/create', [RoomController::class, 'create'])->name('rooms.create');
    Route::post('/rooms', [RoomController::class, 'store'])->name('rooms.store');
    Route::get('/rooms/{room}/edit', [RoomController::class, 'edit'])->name('rooms.edit');
    Route::put('/rooms/{room}', [RoomController::class, 'update'])->name('rooms.update');
    Route::delete('/rooms/{room}', [RoomController::class, 'destroy'])->name('rooms.destroy');


    Route::match(['post', 'patch'], '/reservations/{reservation}/status', [ReservationController::class, 'updateStatus'])
      ->name('reservations.update-status')
      ->middleware('can:admin');
  });
});

require __DIR__ . '/auth.php';
