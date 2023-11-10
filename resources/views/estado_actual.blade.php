@extends('layout.base')

@section('title', 'Estado actual')

@section('content')
    <h1>Estado actual</h1>

    <div class="ui two column grid">
        @foreach ($servicios as $servicio)
            <div class="column">
                <canvas id="{{ $servicio->nombre }}"></canvas>
            </div>
        @endforeach
    </div>

    <script src="http://192.168.41.101/monitoreo_servicios/resources/js/estado_actual.js"></script>
@endsection
