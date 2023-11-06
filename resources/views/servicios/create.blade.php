@extends('layout.base')

@section('title', 'Crear Servicio')

@section('content')
    <form action="{{ route('servicios.store') }}" method="post" class="ui fluid form">
        @csrf
        <div class="field">
            <label>Nombre del servicio</label>
            <input type="text" name="nombre" placeholder="Escribe aquí el nombre del servicio" value="{{ old('nombre') }}">
            @error('nombre')
                <label style="color: red">{{ $message }}</label>
            @enderror
        </div>

        <div class="field">
            <label>Ip de servicio</label>
            <input type="text" name="ip" placeholder="Escribe aquí la dirección IP" value="{{ old('ip') }}">
            @error('ip')
                <label style="color: red">{{ $message }}</label>
            @enderror
        </div>


        <div class="field">
            <label>MAC de servicio</label>
            <input type="text" name="mac" placeholder="Escribe aquí la dirección MAC" value="{{ old('mac') }}">
            @error('mac')
                <label style="color: red">{{ $message }}</label>
            @enderror
        </div>

        <div class="field">
            <button type="submit" class="ui blue button">Alta</button>
        </div>
    </form>
@endsection
