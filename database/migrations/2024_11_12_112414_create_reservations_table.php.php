<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
  {
    Schema::create('reservations', function (Blueprint $table) {
      $table->id();
      $table->foreignId('user_id')->constrained()->onDelete('cascade');
      $table->foreignId('room_id')->constrained()->onDelete('cascade');
      $table->dateTime('start_time');
      $table->dateTime('end_time');
      $table->enum('status', ['pendiente', 'aceptada', 'rechazada', 'confirmada', 'cancelada', 'finalizada'])->default('pendiente');
      $table->text('notes')->nullable();
      $table->timestamps();
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('reservations');
  }
};