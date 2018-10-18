@extends('general')
@php
    $user = App\User::find(auth()->user()->id);
@endphp
<!-- Titulo -->
@section('titulo', 'Acerca de')
@section('contenido-padding')
<div class="container text-center">
    <h5 class="txtXXL text-usuario">Acerca de!</h5>
    <p>Contáctanos por email: contacto@gopp.com</p>
</div>
@endsection
