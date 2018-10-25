<!-- Contenido General | PROMOS -->
<!-- Plantilla -->
@extends('general')
<?php
$user = App\User::find(auth()->user()->id);
$businesses = App\Business::all();
?>
@section('boostrap')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
@endsection
<!-- Titulo -->
@section('titulo', 'Promociones')
@section('styles')
    <link rel="stylesheet" href="{{asset('dist/DataTables/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/sweetalert2.min.css')}}">
    <link href="{{asset('dist/css/product-carousel.css')}}" rel="stylesheet">
    <link href="{{asset('dist/css/carrito.css')}}" rel="stylesheet">
    {{-- Animación Boletín --}}
    <link href="{{asset('dist/css/boletin.css')}}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
@endsection
<!-- Contenido -->
@section('contenido')
<!-- Carrito de compras -->
@include('modules.modalCarrito')
{{-- Carousel --}}
@include('modules.carousel')
<div class="container">
    <div class="row  my-4 text-usuario txtXXL text-center">
        <div class="col-4 p-0">
            <span class="align-self-center fa fa-rocket mh-100"></span>
            <p class="lead align-self-end text-center">Rápido</p>
        </div>
        <div class="col-4 p-0">
            <span class="align-self-center far fa-life-ring mh-50"></span>
            <p class="lead align-self-end text-center">Seguro</p>
        </div>
        <div class="col-4 p-0">
            <span class="align-self-center fas fa-star"></span>
            <p class="lead align-self-end text-center">Calidad</p>
        </div>
    </div>
</div>
@endsection

@section('contenido-padding')
@foreach ($businesses as $business)
    @php
        $promos = $business->getBusinessPromos();
    @endphp
    @if ($promos->first() != null)
<br>
<div class="card-oferta-container container-fluid">
    <div class="row col-lg-12">
        <div class="col-md-6">
            <img class="float-left rounded-circle mr-4" style="height:60px" src="{{$business->getBusinessImg($business)}}" />
            <h3 class="text-usuario">{{$business->nombre}}</h3>
            <h5>Con {{$promos->count()}} oferta(s) para ti</h5>
        </div>
    </div>
    <div id="carousel-{{$business->id}}" class="carousel slide" data-ride="carousel" data-interval="9000">
        <!-- Wrapper for slides -->
        <div class="carousel-inner principal_{{$business->id}} row w-100 mx-auto" role="listbox">
            <?php $i = 0; ?>
            @foreach ($promos as $promo)
            @if($i != 1)
                <div class="carousel-item items_{{$business->id}} col-md-3 active">
                <?php $i = 1; ?>
                @else
                <div class="carousel-item items_{{$business->id}} col-md-3">
                    @endif
                    <div class="card card-product mx-auto d-block">
                        <div class="img-wrap">
                            <a onclick="agregarCarrito({{$promo->getProduct()->id}})" class="text-white top-left btn btn-primary btnAgregarOferta btn-goppBtn btn-m">Agregar</a>
                            <a class="btn price-new top-right text-white bg-red rounded-circle">${{$promo->precio}}</a>
                            <a href="{{route('usuario.productos', ['producto' => $promo->getProduct()])}}"><img src="{{$promo->getProduct()->getProductImg()}}" class="img-fluid" style="width:100%">
                        <h6 class="title text-dots">{{$promo->encabezado}}</h6></a>
                        </div>
                        <div class="info-wrap">
                            <h6 class="title text-dots text-truncate" style="height:20px;max-width: 100%;">{{$promo->descripcion}}</h6>
                            <h6 class="title text-dots">Hasta: {{$promo->fecha_fin}}</h6>
                            <div class="action-wrap">

                                <div class="price-wrap h5">
                                    <span class="price-new">${{$promo->precio}}</span>
                                    <del class="price-old">${{$promo->getProduct()->precio}}</del>
                                </div>
                                <!-- price-wrap.// -->
                            </div>
                            <!-- action-wrap -->
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carousel-{{$business->id}}" role="button" data-slide="prev" style="width: 20px!important;">
                <span class="text-usuario txtM fas fa-caret-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel-{{$business->id}}" role="button" data-slide="next" style="width: 20px!important;">
                <span class="text-usuario txtM fas fa-caret-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
@endif
@endforeach
    @include('modules.footerMenu')
    <!-- Boletín -->
@component('modules.formBoletin')
    @php
        $boletin = App\Boletin::inRandomOrder()->get()->first();
    @endphp
    @slot('titulo',$boletin->titulo)
    @slot('contenido',$boletin->contenido)
    @slot('enlace',$boletin->enlace)
    @slot('imagen',$boletin->getBoletinImg())
@endcomponent
@endsection
{{-- Menú Footer --}}
{{-- ----------------------------------------------------- --}}
@section('scripts')
{{-- Animación de boletín --}}
<script src="{{asset('dist/js/sweetalert2.min.js')}}"></script>
<script src="{{asset('dist/DataTables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('dist/js/boletin.js')}}"></script>
@routes
<script src="{{asset('dist/js/carrito.js')}}"></script>
{{-- Movimiento de ofertas --}}
@foreach($businesses as $business)
    @php
        $promos = $business->getBusinessPromos();
    @endphp
    @if ($promos->first() != null)
        <script>
                $('#carousel-{{$business->id}}').on('slide.bs.carousel', function (e) {
                    var $e = $(e.relatedTarget);
                    var idx = $e.index();
                    var itemsPerSlide = 4;
                    var totalItems = $('.items_{{$business->id}}').length;

                    if (idx >= totalItems-(itemsPerSlide-1)) {
                        var it = itemsPerSlide - (totalItems - idx);
                        for (var i=0; i<it; i++) {
                            // append slides to end
                            if (e.direction=="left") {
                                $('.items_{{$business->id}}').eq(i).appendTo('.principal_{{$business->id}}');
                            }
                            else {
                                $('.items_{{$business->id}}').eq(0).appendTo('.principal_{{$business->id}}');
                            }
                        }
                    }
                });
        </script>
    @endif
@endforeach
@endsection
