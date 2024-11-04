@extends('layouts.app')

@vite('resources/css/app.css')
@section('header')
    <h2 class="text-3xl font-bold text-center text-gray-900 mt-8">
        Tracsa Energía
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg">
                <div class="p-8">
                    <p class="text-lg text-gray-700 text-justify">
                        Iniciamos operaciones como parte de Grupo Tracsa y nos constituimos en el 2003 como Tracsa Energía con la misión de brindar soluciones integrales y efectivas en la generación de energía para las industrias farmacéutica, minera, química, data centers, alimenticia, entre otras, con el objetivo de hacer más rentable el negocio de nuestros clientes.
                    </p>
                    <p class="mt-4 text-lg text-gray-700 text-justify">
                        Ofrecemos una solución integral con proyectos autofinanciables para la generación de energía en horario punta así como de respaldo, teniendo el cliente un soporte automático para cualquier emergencia bajando sus costos.
                    </p>
                </div>
            </div>

            <!-- Contenedor del calendario -->
          <!--  <div class="mt-8">
                <div id="calendar" style="width: 100%; height: 600px; background-color: lightgray;"></div>
            </div>-->



        </div>
    </div>
@endsection





