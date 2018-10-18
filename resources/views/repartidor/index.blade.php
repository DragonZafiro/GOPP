<!-- Contenido General | REPARTIDORES -->
<!-- Plantilla -->
@extends('general')
@php $user = App\User::find(auth()->user()->id); @endphp
<!-- Titulo -->
@section('titulo', 'Repartidores en mi Zona')
<!-- Contenido -->
@section('contenido')

@endsection
@section('contenido-padding')
<div class="container">
    ESTOS SON LOS REPARTIDORES EN TU ZONA
</div>
@endsection
