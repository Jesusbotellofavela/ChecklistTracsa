<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeneradoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('generadores')->insert([
            ['id' => 1, 'name' => 'Generador 1', 'model' => 'G-1000', 'serial_number' => 'SN123456'],
            ['id' => 2, 'name' => 'Generador 2', 'model' => 'G-2000', 'serial_number' => 'SN654321'],
            ['id' => 3, 'name' => 'Generador 3', 'model' => 'G-3000', 'serial_number' => 'SN112233'],
            // Puedes agregar más registros si es necesario
        ]);
    }
}
