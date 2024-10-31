<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Turnos;

class TurnosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        turnos::create([
            'start_time' => '08:00',
            'end_time' => '16:00',
            'shift_date' => '2024-10-01',
            'user_id' => 11,
        ]);
    }
}
