<!-- Contenido General | PROMOS -->
<!-- Plantilla -->
@extends('general')
<!-- Titulo -->
@section('titulo', 'Guardados')
@section('styles')
    <link href="{{asset('dist/css/product-carousel.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('dist/DataTables/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/sweetalert2.min.css')}}">
    <link href="{{asset('dist/css/carrito.css')}}" rel="stylesheet">
@endsection
<!-- Contenido -->
@section('contenido')
	<div class="container text-center">
		<h5 class="txtXXL text-usuario">Guardados</h5>
    	<h4> Esto es lo que has marcado como favorito, te facilitamos la vida, ¡no lo busques tanto! </h4>
    </div>
@endsection
@section('contenido-padding')
@include('modules.modalCarrito')
<div class="row px-5 col-12 col-md-12 col-xs-12">
    @foreach($products as $product)
    <?php $product = $product->getProduct() ?>
    <div class="list col-xs-12 col-sm-6 col-md-3 mx-auto d-block">
        <div class="product-card">
            <span class="favorite">
                <button id="favorite" class="fav faved" onclick="addFavorite({{$product->id}})">
                    <span class="fas fa-star">
                        <span class="fas fa-star"></span>
                    </span>
                </button>
            </span>
            <span class="tag">
                <span onclick="agregarCarrito({{$product->id}})" class="fas fa-shopping-cart" aria-hidden="true"></span>
            </span>
            <a href="{{route('usuario.productos', ['id' => $product->id])}}">
                <h2>{{$product->nombre}}</h2>
                <h4>{{$product->descripcion}}</h4>
                <figure>
                    <img src="{{$product->getProductImg()}}" alt="product" />
                </figure>
            </a>
            <span class="price">
                ${{$product->precio}} o <span class="text-usuario">{{$product->puntos}} dines</span>
            </span>
        </div>
    </div>
    @endforeach
</div>
<div class="row px-5 col-12 col-md-12 col-xs-12">
    @foreach($businesses as $negocio)
    <?php $negocio = $negocio->getBusiness() ?>
    <div class="list col-xs-12 col-sm-6 col-md-3 mx-auto d-block">
        <span class="favorite top-right">
            <button id="favorite" class="fav faved" onclick="addBusinessFavorite({{$negocio->id}})">
                <span class="fas fa-star">
                    <span class="fas fa-star"></span>
                </span>
            </button>
        </span>
        <div class="img-wrap">
            <div class="text-center">
                <img class="img-fluid rounded-circle" src="{{$negocio->getBusinessImg()}}">
            </div>
        </div>
        <figcaption class="info-wrap">
            <div class="col-lg-19 text-center">
                <h3>
                    {{$negocio->nombre}}
                </h3>
                <p>
                    {{$negocio->descripcion}}
                </p>
                <p><a class="btn btn-goppBtn btn-primary btn-m" href="{{route('usuario.empresa', ['business' => $negocio])}}" role="button">Ir a la página del negocio</a></p>
            </div>
        </figcaption>
    </div>
    @endforeach
</div>
@include('modules.footerMenu')
@endsection
@section('scripts')
    <script src="{{asset('dist/js/sweetalert2.min.js')}}"></script>
    <script src="{{asset('dist/DataTables/js/jquery.dataTables.min.js')}}"></script>
    @routes
    <script src="{{asset('dist/js/carrito.js')}}"></script>
    <script src="{{asset('dist/js/favoritos.js')}}"></script>
@endsection
