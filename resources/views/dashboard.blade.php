@extends('layouts.app')

@vite('resources/css/app.css')
@section('header')
<div class="text-center mt-8">
        <!-- Agregar imagen en la parte superior -->
        <img src="{{ asset('images/cincuenta.png') }}" alt="Logo Tracsa" class="mx-auto">

   <!-- <h2 class="text-3xl font-bold text-center text-gray-900 mt-8">
        Tracsa Energía
    </h2>-->
</div>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg">
                <div class="p-8">
                    <p>
  <!-- <h2 class="text-3xl font-bold text-center text-gray-900 mt-8">
        Tracsa Energía
    </h2>-->
                    <p class="text-lg text-gray-700 text-justify">
                        Iniciamos operaciones como parte de Grupo Tracsa y nos constituimos en el 2003 como Tracsa Energía con la misión de brindar soluciones integrales y efectivas en la generación de energía para las industrias farmacéutica, minera, química, data centers, alimenticia, entre otras, con el objetivo de hacer más rentable el negocio de nuestros clientes.
                    </p>
                    <p class="mt-4 text-lg text-gray-700 text-justify">
                        Ofrecemos una solución integral con proyectos autofinanciables para la generación de energía en horario punta así como de respaldo, teniendo el cliente un soporte automático para cualquier emergencia bajando sus costos.
                    </p>

                    <p class="mt-4 text-lg text-gray-700 text-justify">
                        <strong>Misión</strong><br>
                        Generar soluciones integrales efectivas para que nuestros clientes, en cada uno de los mercados que atendemos, hagan su negocio más rentable.
                    </p>

                    <p class="mt-4 text-lg text-gray-700 text-justify">
                        <strong>Visión</strong><br>
                        En Tracsa Energía buscamos ser una empresa líder que se caracterice por su innovación, su responsabilidad social y el cuidado al medio ambiente.
                    </p>

                    <p class="mt-4 text-lg text-gray-700 text-justify">
                        <strong>Valores</strong><br>
                        Nuestros objetivos y estrategias se forman a través de vivir profesionalmente los siguientes valores:
                    </p>

                    <ul class="list-inside list-disc mt-4 text-lg text-gray-700 text-justify">
                        <li>Satisfacción al cliente.</li>
                        <li>Trabajo en equipo.</li>
                        <li>Solidez financiera.</li>
                        <li>Mejora continua.</li>
                        <li>Honestidad.</li>
                        <li>Compromiso.</li>
                        <li>Innovación.</li>
                    </ul>

                </div>
            </div>

            <!-- Contenedor del calendario -->
            <!-- <div class="mt-8">
                <div id="calendar" style="width: 100%; height: 600px; background-color: lightgray;"></div>
            </div> -->
        </div>
    </div>
@endsection
