@extends('general')
@php
    $user = App\User::find(auth()->user()->id);
    $promos = App\Business::all();
@endphp
<!-- Titulo -->
@section('titulo', 'Praemie')
<!-- Contenido -->
@section('contenido-padding')
	<div class="col-4">
		    <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Para ti... </h2>
	</div>
	<div class="container text-center">
		<h5 class="txtXXL text-praemie">GOPP Praemie</h5>
		<div class="conteiner text-center col-12" >
		<h3>Envios gratis ilimitados por $134.00mn/mes</h3>
			<h3>* Prueba gratis 3 dias *</h3>
		<p><a class="btn btn-goppBtn btn-primary btn-m" href="#" role="button">Más beneficios</a></p>
	    </div>
   	</div>
@endsection
