<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
  public function run(): void
  {
    $adminRole = Role::where('name', 'admin')->first();
    $userRole = Role::where('name', 'user')->first();

    if (!$adminRole || !$userRole) {
      echo "Roles required (admin, user) not found. Exiting seeder.";
      return;
    }


    User::create([
      'name' => 'Admin User',
      'email' => 'admin@example.com',
      'password' => Hash::make('password'),
      'role_id' => $adminRole->id,
      'email_verified_at' => now(),
    ]);

    User::create([
      'name' => 'User Demo',
      'email' => 'user@example.com',
      'password' => Hash::make('password'),
      'role_id' => $userRole->id,
      'email_verified_at' => now(),
    ]);


    User::factory(5)->create([
      'role_id' => $userRole->id,
    ]);
  }
}
