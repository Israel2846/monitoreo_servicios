@extends('layout.base')

@section('title', 'servicios')

@section('content')

    <h1>Servicios</h1>
    <a class="ui blue button" href="{{ route('servicios.create') }}">Crear servicio</a>

    <table class="ui blue table">
        <thead>
            <tr>
                <th>NOMBRE</th>
                <th>IP</th>
                <th>MAC</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($servicios as $servicio)
                <tr>
                    <td>
                        {{ $servicio->nombre }}
                    </td>
                    <td>
                        {{ $servicio->ip }}
                    </td>
                    <td>
                        {{ $servicio->mac }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
