@extends('layout.base')

@section('title', 'index')

@section('content')
    <h1>Estado actual</h1>

    @foreach ($servicios as $servicio)
        <canvas id="{{ $servicio->nombre }}"></canvas>
    @endforeach

    <script src="http://192.168.41.101/monitoreo_servicios/resources/js/estado_actual.js"></script>
@endsection
