<!-- Plantilla -->
@extends('general')
    <!-- Titulo -->
@section('titulo', 'Detalles de '.$business->nombre.'')
    <!-- Contenido -->
@section('boostrap')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
@endsection
@section('styles')
    <link href="{{asset('dist/css/product-carousel.css')}}" rel="stylesheet">
    @if($user->loggedAs == 'usuario')
        <link rel="stylesheet" href="{{asset('dist/DataTables/css/jquery.dataTables.min.css')}}">
        <link rel="stylesheet" href="{{asset('dist/css/sweetalert2.min.css')}}">
        <link href="{{asset('dist/css/carrito.css')}}" rel="stylesheet">
    @endif
@endsection
@section('contenido-padding')
@include('modules.modalCarrito')
<section>
    <div class="jumbotron text-center mt-2">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3 px-0 my-3">
                    <div class="text-center roundElementContainer mh-100">
                        <img class="img-fluid" src="{{$business->getBusinessImg()}}" alt="">
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
@unless($user->loggedAs == 'afiliador')
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
            <div class="list col-xs-12 col-sm-6 col-md-3 mx-auto d-block">
                <div class="product-card">
                    <span class="oferta">
                        <p>${{$promo->precio}}</p>
                    </span>
                    @if($user->loggedAs == 'usuario')
                    <span class="tag">
                        <span onclick="agregarCarrito({{$promo->getProduct()->id}})" class="fas fa-shopping-cart" aria-hidden="true"></span>
                    </span>
                    @endif
                    <a href="{{route($user->loggedAs.'.productos', ['producto' => $promo->getProduct()])}}">
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
    <div class="row px-5 col-12 col-md-12 col-xs-12">
        @foreach($business->getProducts() as $product)
        <div class="list col-xs-12 col-sm-6 col-md-3 mx-auto d-block">
            <div class="product-card">
                @if($user->loggedAs == 'usuario')
                <span class="favorite">
                    @if($user->checkFaved($product->id))
                    <button id="favorite" class="fav faved" onclick="addFavorite({{$product->id}})">
                    @else
                    <button id="favorite" class="fav" onclick="addFavorite({{$product->id}})">
                    @endif
                        <span class="fas fa-star">
                            <span class="fas fa-star"></span>
                        </span>
                    </button>
                </span>
                <span class="tag">
                    <span onclick="agregarCarrito({{$product->id}})" class="fas fa-shopping-cart" aria-hidden="true"></span>
                </span>
                @endif
                <a href="{{route($user->loggedAs.'.productos', ['id' => $product->id])}}">
                    <h2>{{$product->nombre}}</h2>
                    <h4>{{$product->descripcion}}</h4>
                    <figure>
                        <img src="{{$product->getProductImg()}}" alt="product" />
                    </figure>
                </a>
                <span class="price">
                    ${{$product->precio}} o <h5 class="text-white badge badge-usuario">{{$product->puntos}}</h5>
                            <span class="far fa-circle text-dines"></span>
                </span>
            </div>
        </div>
        @endforeach
    </div>
</section>
<hr>
@endunless
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
@if($user->loggedAs == 'usuario')
    @include('modules.footerMenu')
@endif
@endsection
@section('scripts')
    @if($user->loggedAs == 'usuario')
        <script src="{{asset('dist/js/sweetalert2.min.js')}}"></script>
        <script src="{{asset('dist/DataTables/js/jquery.dataTables.min.js')}}"></script>
        @routes
        <script src="{{asset('dist/js/carrito.js')}}"></script>
        <script src="{{asset('dist/js/favoritos.js')}}"></script>
    @endif
@endsection
