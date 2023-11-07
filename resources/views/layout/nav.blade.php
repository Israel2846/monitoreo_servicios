<nav class="ui secondary menu">
    <a class="item {{ request()->routeIs('estado_actual') ? 'active' : '' }}" href="{{ route('estado_actual') }}">Estado
        actual</a>
    <a class="item {{ request()->routeIs('servicios.*') ? 'active' : '' }}"
        href="{{ route('servicios.index') }}">Servicios</a>
    <a class="item {{ request()->routeIs('incidencias.*') ? 'active' : '' }}" href="#">Incidencias</a>
</nav>
