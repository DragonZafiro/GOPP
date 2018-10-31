@extends('general')
@section('titulo', 'Detalles de '.$producto->nombre.'')
@section('styles')
    @if(auth()->user()->loggedAs == 'usuario')
        <link rel="stylesheet" href="{{asset('dist/DataTables/css/jquery.dataTables.min.css')}}">
        <link rel="stylesheet" href="{{asset('dist/css/sweetalert2.min.css')}}">
        <link href="{{asset('dist/css/carrito.css')}}" rel="stylesheet">
    @endif
@endsection
@section('contenido-padding')
<div class="container">
    <div class="row">
        <aside class="col-sm-5">
                <div class="img-big-wrap">
                    <img class="p-10" style="position:relative;width:100%;height:100%;top:50px;" src="{{$producto->getProductImg()}}">
                </div>
        </aside>
        <aside class="col-sm-7">
            <article class="card-body p-5">
                <h2 class="title mb-3 text-usuario">{{$producto->nombre}}</h2>
                @if($producto->getPromo() != null)
                    <h5 class="text-red">Promoción: <span class="text-black">{{$producto->getPromo()->encabezado}}</span></h5>
                @endif
                <p class="price-detail-wrap">
                    @if($producto->getPromo() != null)
                        <span class="price h4 text-green">
                            <span class="currency">MXN $</span><span class="num">{{$producto->getPromo()->precio}}</span>
                        </span>
                        <del class="currency h5 text-red">$</span><span class="num">{{$producto->precio}}</del>
                    @else
                        <span class="price h4 text-green">
                            <span class="currency">MXN $</span><span class="num">{{$producto->precio}}</span>
                        </span>
                    @endif
                </p>
                <dl class="param param-feature">
                    <dt>Marca</dt>
                    <dd>{{$producto->marca}}</dd>
                </dl>
                <dl class="item-property">
                    <dt>Descripción</dt>
                    <dd>
                        <p>{{$producto->descripcion}}</p>
                        @if($producto->getPromo() != null)
                            <p class="text-red">{{$producto->getPromo()->descripcion}}</p>
                            Hasta {{$producto->getPromo()->fecha_fin}}
                        @endif
                    </dd>
                </dl>
                <dl class="param param-feature">
                    <dt>Dines</dt>
                    <p class="text-white badge badge-usuario">{{$producto->puntos}}</p>
                    <span class="far fa-circle text-dines"></span>
                </dl>
                @unless($producto->comentario == null)
                <dl class="param param-feature">
                    <dt>Comentarios</dt>
                    <dd>{{$producto->comentario}}</dd>
                </dl>
                @endunless
                <hr>
                @if(auth()->user()->loggedAs == 'usuario')
                    <a href="#" class="btn btn-lg btn-primary text-uppercase">Comprar</a>
                    <a href="#" onclick="agregarCarrito({{$producto->id}})" class="btn btn-lg btn-outline-primary text-uppercase"> <i class="fas fa-shopping-cart"></i> Agregar al carrito </a>
                @endif
            </article>
        </aside>
    </div>
</div>
@if(auth()->user()->loggedAs == 'usuario')
    @include('modules.footerMenu')
    @include('modules.modalCarrito')
@endif
@endsection
@section('scripts')
    @if(auth()->user()->loggedAs == 'usuario')
        <script src="{{asset('dist/js/sweetalert2.min.js')}}"></script>
        <script src="{{asset('dist/DataTables/js/jquery.dataTables.min.js')}}"></script>
        @routes
        <script src="{{asset('dist/js/carrito.js')}}"></script>
        <script src="{{asset('dist/js/favoritos.js')}}"></script>
    @endif
@endsection
