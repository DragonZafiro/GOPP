<!-- Contenido General | PROMOS -->
<!-- Plantilla -->
@extends('general') @php
@endphp
<!-- Titulo -->
@section('titulo', 'Mapa')
@section('styles')
<style>
    /* Set the size of the div element that contains the map */
    #mapaUsuario {
        height: 400px;
        /* The height is 400 pixels */
        width: 100%;
        /* The width is the width of the web page */
    }
</style>
@endsection
<!-- Contenido -->
<!-- Barra de búsqueda -->
@section('contenido-padding')
<div class="main container text-center">
    <h1 class="display-4 text-usuario">Cerca de ti</h1>
    <div>
        @include('modules.googleMaps')
    </div>
</div>
@endsection
