<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Parametros; // Asegúrate de que el modelo esté bien importado

class ParameterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parameters = [
            ['generadores_id' => 1, 'parameter_name' => 'Estado del motor', 'unit' => 'ON/OFF'],
            ['generadores_id' => 1, 'parameter_name' => 'Potencia del motor', 'unit' => 'kW', 'min_value' => 0, 'max_value' => 1800],
            ['generadores_id' => 1, 'parameter_name' => 'Horómetro', 'unit' => 'HRS'],
            ['generadores_id' => 1, 'parameter_name' => 'Genset kWh', 'unit' => 'kWh'],
            ['generadores_id' => 1, 'parameter_name' => 'Genset kVAh', 'unit' => 'kVAh'],
            ['generadores_id' => 1, 'parameter_name' => 'RPM', 'unit' => 'RPM', 'min_value' => 1700, 'max_value' => 1900],
            ['generadores_id' => 1, 'parameter_name' => 'Engine Oil Pressure', 'unit' => 'PSI', 'min_value' => 40, 'max_value' => 80],
            ['generadores_id' => 1, 'parameter_name' => 'Oil Filter Diff Pressure', 'unit' => 'PSI', 'min_value' => 4, 'max_value' => 6.5],
            ['generadores_id' => 1, 'parameter_name' => 'Nivel Aceite Motor', 'unit' => 'Low/High'],
            ['generadores_id' => 1, 'parameter_name' => 'Temp Cable Exterior Muestra 1', 'unit' => '°C', 'min_value' => 10, 'max_value' => 90],
            ['generadores_id' => 1, 'parameter_name' => 'Temp Cable Exterior Muestra 2', 'unit' => '°C', 'min_value' => 10, 'max_value' => 90],
            ['generadores_id' => 1, 'parameter_name' => 'Temp Cable Exterior Muestra 3', 'unit' => '°C', 'min_value' => 10, 'max_value' => 90],
            ['generadores_id' => 1, 'parameter_name' => 'Temp Balero Lado Libre', 'unit' => '°C', 'min_value' => 10, 'max_value' => 90],
            ['generadores_id' => 1, 'parameter_name' => 'Temp Balero Lado Acople', 'unit' => '°C', 'min_value' => 10, 'max_value' => 90],
            ['generadores_id' => 1, 'parameter_name' => 'Temp Generador', 'unit' => '°C', 'min_value' => 10, 'max_value' => 90],
            ['generadores_id' => 1, 'parameter_name' => 'Jacket Water Temperature', 'unit' => '°C', 'min_value' => 79, 'max_value' => 99],
            ['generadores_id' => 1, 'parameter_name' => 'Condición Entrada AC', 'unit' => 'ON/OFF'],
            ['generadores_id' => 1, 'parameter_name' => 'Voltaje de Salida DC', 'unit' => 'VDC', 'min_value' => 24, 'max_value' => 28],
            ['generadores_id' => 1, 'parameter_name' => 'Fuel Pressure', 'unit' => 'KPa', 'min_value' => 40, 'max_value' => 80],
            ['generadores_id' => 1, 'parameter_name' => 'Nivel de Diesel', 'unit' => '%', 'min_value' => 40, 'max_value' => 100],
        ];

        foreach ($parameters as $parameter) {
            Parametros::create($parameter); // Usar el modelo Parametros
        }
    }
}
