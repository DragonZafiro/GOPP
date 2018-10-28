@extends('general')
<!-- Titulo -->
@section('titulo', 'Mis Puntos')
<!-- Fondo Negro -->
@section('bg-color','bg-black')
<!-- Contenido -->
@section('contenido','')
@section('contenido-padding')
<div class="container">
    <div class="row">
        <h4 class="display-4">
            Hola {{$user->name}}. Tienes <span class="badge badge-usuario text-white">{{$user->puntos}}</span> dines.
        </h4>
    </div>
    <div class="row">
        <button class="btn btn-goppBtn btn-usuario" data-toggle="modal" data-target="#ingresarCodigo">Obtener mas dines</button>
    </div>
    <div class="row my-4">
        <h4 class="display-4 text-usuario">Vamos a canjearlos!</h4>
    </div>
    <div class="row">
        <ul class="nav nav-pills nav-pills-white mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link pill-gopp mx-2 active" id="pills-free-tab" data-toggle="pill" href="#pills-free" role="tab" aria-controls="pills-free" aria-selected="true">Gratis</a>
            </li>
            <li class="nav-item">
                <a class="nav-link pill-gopp mx-2" id="pills-discount-tab" data-toggle="pill" href="#pills-discount" role="tab" aria-controls="pills-discount" aria-selected="false">Descuentos</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="tab-content row col-lg-12" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-free" role="tabpanel" aria-labelledby="pills-free-tab">
                <div class="container">
                @foreach ($products as $producto)
                    <div class="row">
                        <img class="rounded-circle mr-4 mb-2" src="{{$producto->getProductImg()}}" style="height:50px; width:50px;">
                        <h5 class="mt-3">{{$producto->nombre}} <span class="text-red">gratis</span> por <p class="badge badge-usuario">{{$producto->puntos}}</p>
                            <span class="far fa-circle text-dines"></span>
                        </h5>
                    </div>
                @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="pills-discount" role="tabpanel" aria-labelledby="pills-discount-tab">
                <div class="container">
                    <div class="col-md-6">
                        <img class="float-left rounded-circle mr-4" style="height:60px; width:60px;" src="{{asset('dist/img/user/profile/default.jpg')}}" />
                        <h5 class="float-right">Descuento por <span class="badge badge-usuario ">5</span> <span class="fas fa-ticket-alt text-dines"></span></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@component('modules.modal')
    @slot('modal_action','#')
    @slot('nombre_modal','ingresarCodigo')
    @slot('modal_title')
        <p class="text-usuario">Ingresa un código para obtener dines</p>
    @endslot
    @slot('modal_content')
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon3">Codigo</span>
        </div>
        <input name="code" type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
    </div>
    @endslot
    @slot('modal_button')
        Obtener dines
    @endslot
@endcomponent
@endsection
