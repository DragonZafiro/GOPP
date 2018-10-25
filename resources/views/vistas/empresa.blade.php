<!-- Plantilla -->
@extends('general')
    <!-- Titulo -->
@section('titulo', 'Detalles de '.$business->nombre.'')
    <!-- Contenido -->
@section('boostrap')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
@endsection
@section('styles')
    <link rel="stylesheet" href="{{asset('dist/DataTables/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/sweetalert2.min.css')}}">
    <link href="{{asset('dist/css/product-carousel.css')}}" rel="stylesheet">
    @routes
    <link href="{{asset('dist/css/carrito.css')}}" rel="stylesheet">
@endsection
@section('contenido-padding')
@include('modules.modalCarrito')
<section>
    <div class="jumbotron text-center mt-2">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3 px-0 my-3">
                    <div class="text-center roundElementContainer mh-100">
                        <img class="img-fluid" src="{{$business->getBusinessImg($business)}}" alt="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h1 >{{$business->nombre}}</h1>
                    <p class="h4">{{$business->descripcion}}</p>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- OFERTAS --}}
<section>
    <?php $promos = $business->getBusinessPromos(); ?>
    @unless($promos->first() == null)
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1>Ofertas y Promociones</h1>
                    <h2>{{$business->nombre}} tiene {{$promos->count()}} ofertas para ti</h2>
                </div>
            </div>
        </div>
        <div class="row px-5">
            @foreach($promos as $promo)
            <div class="card card-product mx-auto d-block" style="height:300px; width:250px;">
                <div class="img-wrap">
                    <a href="#" class="top-left btn btn-primary btnAgregarOferta btn-goppBtn btn-m">Agregar</a>
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
            @endforeach
        </div>
    @endunless
</section>
{{-- PRODUCTOS --}}
<section>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1>Productos y servicios</h1>
                <p>Checa los productos y servicios que {{$business->nombre}} trae para ti</p>
            </div>
        </div>
    </div>
    <div class="row px-5">
        @foreach($business->getProducts() as $product)
        <div class="col-6 col-md-2 mx-md-3">
            <div class="card" style="width: 14rem;">
                <img class="card-img-top" src="{{$product->getProductImg()}}" height="150rem" width="auto">
                <div class="card-body">
                    <a href="{{route('usuario.productos', ['producto' => $product])}}" class="text-black">
                        <h5 class="card-title">{{$product->nombre}}</h5>
                        <p class="card-text">{{$product->precio}} ó {{$product->puntos}} dines</p>
                    </a>
                    <button onclick="agregarCarrito({{$product->id}})" class="btn btn-primary btn-goppBtn">Agregar</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
<hr>
<hr>
{{-- CONTÁCTO --}}
<div class="section" style="margin-bottom: 40px;">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1 col-12">
                <h3 class="text-center">Contacto</h3>
                <address class="text-center">
                    <strong>{{$business->email}}</strong><br>
                    {{$business->direccion}},<br>
                    {{$business->telefono}}<br>
                </address>
            </div>
        </div>
    </div>
</div>
@include('modules.footerMenu')
@endsection
@section('scripts')
    <script src="{{asset('dist/js/sweetalert2.min.js')}}"></script>
    <script src="{{asset('dist/DataTables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('dist/js/carrito.js')}}"></script>
@endsection
