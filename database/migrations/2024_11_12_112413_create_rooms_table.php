<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
  {
    Schema::create('rooms', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->enum('type', ['hot_desk', 'dedicated_desk', 'private_office']);
      $table->text('description');
      $table->integer('capacity');
      $table->decimal('price', 10, 2);
      $table->json('amenities');
      $table->enum('status', ['available', 'occupied', 'maintenance'])->default('available');
      $table->boolean('is_active')->default(true);
      $table->timestamps();
    });
  }

  public function down(): void
  {
    Schema::dropIfExists('rooms');
  }
};
