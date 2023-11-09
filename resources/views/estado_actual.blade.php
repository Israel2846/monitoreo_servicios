@extends('layout.base')

@section('title', 'index')

@section('content')
    <h1>Estado actual</h1>

    <canvas id="grafica"></canvas>

    <script src="http://localhost/monitoreo_servicios/resources/js/estado_actual.js"></script>
@endsection
