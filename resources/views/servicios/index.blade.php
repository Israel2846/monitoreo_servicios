@extends('layout.base')

@section('title', 'servicios')

@section('content')

    <h1>Servicios</h1>
    <a class="ui orange button" href="{{ route('servicios.create') }}">Crear servicio</a>

    <table class="ui celled striped orange table">
        <thead>
            <tr>
                <th>NOMBRE</th>
                <th>IP</th>
                <th>MAC</th>
                <th>SELECCIONAR</th>
                <th>ELIMINAR</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($servicios as $servicio)
                <tr>
                    <td>
                        {{ $servicio->nombre }}
                    </td>
                    <td class="collapsing">
                        {{ $servicio->ip }}
                    </td>
                    <td class="collapsing">
                        {{ $servicio->mac }}
                    </td>
                    <td class="collapsing" style="text-align: center">
                        <a href="{{ route('servicios.edit', $servicio) }}" class="ui animated fade circular orange button"
                            tabindex="0">
                            <div class="visible content">Ver</div>
                            <div class="hidden content">
                                <i class="eye icon"></i>
                            </div>
                        </a>
                    </td>
                    <td class="collapsing" style="text-align: center">
                        <form action="{{ route('servicios.destroy', $servicio) }}" method="post">
                            @csrf
                            @method('delete')

                            <button class="ui red circular icon button" type="submit"><i class="trash icon"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
