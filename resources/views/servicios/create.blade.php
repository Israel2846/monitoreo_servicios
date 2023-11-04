@extends('layout.base')

@section('title', 'Crear Servicio')

@section('content')
    <form action="" method="post" class="ui fluid form">
        @csrf
        <div class="field">
            <label>Nombre del servicio</label>
            <input type="text" name="nombre">
        </div>
    </form>
@endsection