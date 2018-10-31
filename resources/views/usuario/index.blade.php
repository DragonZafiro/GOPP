<!-- Contenido General | PROMOS -->
<!-- Plantilla -->
@extends('general')
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
    <?php $promos = $business->getBusinessPromos(); ?>
    @if ($promos->first() != null)
<br>
<div class="card-oferta-container container-fluid">
    <div class="row col-lg-12">
        <div class="col-md-6">
            <img class="float-left rounded-circle mr-4" style="height:60px" src="{{$business->getBusinessImg()}}" />
            <h3 class="text-usuario">{{$business->nombre}}</h3>
            <h5>Con {{$promos->count()}} oferta(s) para ti</h5>
        </div>
    </div>
    @if($promos->count() > 4)
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
                    <div class="list col-sm-12">
                        <div class="product-card">
                            <span class="oferta">
                                <p>${{$promo->precio}}</p>
                            </span>
                            <span class="tag">
                                <span onclick="agregarCarrito({{$promo->getProduct()->id}})" class="fas fa-shopping-cart" aria-hidden="true"></span>
                            </span>
                            <a href="{{route('usuario.productos', ['producto' => $promo->getProduct()])}}">
                                <h2 >{{$promo->encabezado}}</h2>
                                <h4 >{{$promo->descripcion}}</h4>
                                <h4>Hasta: {{$promo->fecha_fin}}</h4>
                                <figure>
                                    <img src="{{$promo->getProduct()->getProductImg()}}" alt="product" />
                                </figure>
                            </a>
                            <span class="price">
                                ${{$promo->precio}} <del class="text-black">${{$promo->getProduct()->precio}}</del>
                            </span>
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
    @else
    <div class="row w-100 mx-auto">
        @foreach ($promos as $promo)
        <div class="list col-xs-12 col-sm-6 col-md-3 mx-auto d-block">
            <div class="product-card">
                <span class="oferta">
                    <p>${{$promo->precio}}</p>
                </span>
                <span class="tag">
                    <span onclick="agregarCarrito({{$promo->getProduct()->id}})" class="fas fa-shopping-cart" aria-hidden="true"></span>
                </span>
                <a href="{{route('usuario.productos', ['producto' => $promo->getProduct()])}}">
                    <h2 >{{$promo->encabezado}}</h2>
                    <h4 >{{$promo->descripcion}}</h4>
                    <h4>Hasta: {{$promo->fecha_fin}}</h4>
                    <figure>
                        <img src="{{$promo->getProduct()->getProductImg()}}" alt="product" />
                    </figure>
                </a>
                <span class="price">
                    ${{$promo->precio}} <del class="text-black">${{$promo->getProduct()->precio}}</del>
                </span>
            </div>
        </div>
    @endforeach
    </div>
    @endif
</div>
@endif
@endforeach
    @include('modules.footerMenu')
    <!-- Boletín -->
@component('modules.formBoletin')
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
