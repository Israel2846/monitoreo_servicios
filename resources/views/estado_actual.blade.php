@extends('layout.base')

@section('title', 'index')

@section('content')
    <h1>Estado actual</h1>

    <a href="{{ route('enviar_ping') }}" class="ui orange button">Prueba de ping</a>
@endsection
