<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RoomSeeder extends Seeder
{

  public function run(): void
  {
    $locations = ['Norte', 'Sur', 'Este', 'Oeste', 'Central'];
    $floors = ['1er Piso', '2do Piso', '3er Piso', '4to Piso'];
    $now = Carbon::now();


    for ($i = 1; $i <= 10; $i++) {
      DB::table('rooms')->insert([
        'name' => "Hot Desk " . $locations[array_rand($locations)] . " " . $floors[array_rand($floors)],
        'type' => 'hot_desk',
        'description' => "Espacio de trabajo flexible con acceso a escritorio disponible cuando lo necesites.
                                Incluye WiFi de alta velocidad y 5 horas de sala de reuniones.",
        'capacity' => rand(1, 1),
        'price' => 199.00,
        'amenities' => json_encode([
          'Asiento Flexible',
          'WiFi de Alta Velocidad',
          '5 Horas de Sala de Reuniones',
          'Acceso al Área Común',
          'Café y Agua Gratis',
          'Impresiones Básicas'
        ]),
        'status' => 'available',
        'created_at' => $now,
        'updated_at' => $now,
      ]);
    }


    for ($i = 1; $i <= 10; $i++) {
      DB::table('rooms')->insert([
        'name' => "Dedicated Desk " . $locations[array_rand($locations)] . " " . $floors[array_rand($floors)],
        'type' => 'dedicated_desk',
        'description' => "Tu propio escritorio en un espacio compartido con almacenamiento con llave y
                                silla ergonómica. Acceso 24/7 y 10 horas de sala de reuniones.",
        'capacity' => 1,
        'price' => 299.00,
        'amenities' => json_encode([
          'Escritorio Personal Reservado',
          'Acceso 24/7',
          '10 Horas de Sala de Reuniones',
          'Almacenamiento con Llave',
          'Silla Ergonómica',
          'WiFi de Alta Velocidad',
          'Café y Agua Gratis',
          'Impresiones y Escaneos',
          'Casillero Personal'
        ]),
        'status' => 'available',
        'created_at' => $now,
        'updated_at' => $now,
      ]);
    }


    for ($i = 1; $i <= 10; $i++) {
      $capacity = rand(1, 20);
      DB::table('rooms')->insert([
        'name' => "Private Office " . $locations[array_rand($locations)] . " " . $floors[array_rand($floors)],
        'type' => 'private_office',
        'description' => "Oficina privada amueblada con acceso 24/7, perfecta para equipos de 1-20 personas.
                                Espacio personalizable y 20 horas de sala de reuniones.",
        'capacity' => $capacity,
        'price' => 899.00 * ceil($capacity / 4),
        'amenities' => json_encode([
          'Espacio Privado para Equipos',
          'Espacio Personalizable',
          '20 Horas de Sala de Reuniones',
          'Acceso 24/7',
          'WiFi de Alta Velocidad',
          'Sala de Reuniones Privada',
          'Almacenamiento Cerrado',
          'Café y Agua Gratis',
          'Impresiones y Escaneos Ilimitados',
          'Dirección Comercial',
          'Recepción de Correo',
          'Limpieza Diaria',
          'Control de Acceso'
        ]),
        'status' => 'available',
        'created_at' => $now,
        'updated_at' => $now,
      ]);
    }
  }
}
