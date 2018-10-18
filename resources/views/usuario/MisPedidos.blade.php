@extends('general')
@php
    $user = App\User::find(auth()->user()->id);
    $promos = App\Business::all();
@endphp
<!-- Titulo -->
@section('titulo', 'Mis Pedidos')
<!-- Contenido -->
@section('contenido')
	<div class="container text-center">
		<h5 class="txtXXL text-usuario">Mis pedidos</h5>
    </div>
@endsection
@section('contenido-padding')
<div class="container text-center">
    <table class="text-center">
        <tr style="">
            <td><h3 class="col-12">Pedido</h3></td>
            <td><h3 class="col-12">Tiempo de entrega aproximada</h3></td>
            <td><h3 class="col-12">Puntos generados</h3></td>
        </tr>
        <tr style="">
            <td><img class="img-fluid rounded-circle" style="height:100px;"  src="{{asset('dist/img/user/profile/default.jpg')}}" >
            <h6 class="title text-dots col-12"><a href="#">HAMBURGUESA</a></h6>
            </td>
            <td><h5>30 minutos</h5></td>
            <td><h5>100 puntos</h5></td>
        </tr>
        <tr style="">
            <td><img class="img-fluid rounded-circle"  style="height:100px;" src="{{asset('dist/img/user/profile/default.jpg')}}" >
                <h6 class="title text-dots col-12"><a href="#">HAMBURGUESA</a></h6>
            </td>
            <td><h5>50 minutos</h5></td>
            <td><h5>150 puntos</h5></td>
        </tr>
    </table>
</div>
@endsection
