<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
  public function run(): void
  {
    DB::table('roles')->insert([
      [
        'name' => 'admin',
        'description' => 'Administrador del sistema',
        'created_at' => now(),
        'updated_at' => now(),
      ],
      [
        'name' => 'user',
        'description' => 'Usuario regular',
        'created_at' => now(),
        'updated_at' => now(),
      ],
    ]);
  }
}
