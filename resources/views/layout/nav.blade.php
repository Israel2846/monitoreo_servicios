<div class="ui container">
    <div class="ui top attached centered tabular menu">
        <a class="item active" data-tab="estado_actual">Estado actual</a>
        <a class="item" data-tab="incidencias">Incidencias</a>
    </div>

    <div class="ui bottom attached tab segment active" data-tab="estado_actual">
        <div class="ui segment container">
            @yield('estado_actual')
        </div>
    </div>

    <div class="ui bottom attached tab segment" data-tab="incidencias">
        @yield('incidencias')
    </div>
</div>

<script>
    $('.menu .item').tab();
</script>
