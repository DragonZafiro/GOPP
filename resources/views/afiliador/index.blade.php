<!-- Contenido General | MIS NEGOCIOS -->
<!-- Plantilla -->
@extends('general')
@php $user = App\User::find(auth()->user()->id); @endphp
<!-- Titulo -->
@section('titulo', 'Mis Negocios')
<!-- Contenido -->
@section('contenido')

@endsection
@section('contenido-padding')
<div class="container">
    MIS NEGOCIOS
</div>
@endsection
