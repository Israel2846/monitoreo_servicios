@extends('layout.base')

@section('title', 'incidencias')

@section('content')

    <h1>Incidencias</h1>

    <table class="ui orange table">
        <thead>
            <tr>
                <th>SERVICIO</th>
                <th>FECHA DE INICIO</th>
                <th>FECHA DE SOLUCIÓN</th>
                <th> TIEMPO DE SOLUCIÓN</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($incidencias as $incidencia)
                <tr>
                    <td>{{ $incidencia->servicio->nombre }}</td>
                    <td>{{ $incidencia->fecha_inicio }}</td>
                    <td>{{ $incidencia->fecha_fin }}</td>
                    <td>{{ $incidencia->tiempo_solucion }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
