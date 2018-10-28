<!-- Plantilla -->
@extends('general')
<!-- Titulo -->
@section('titulo', 'Detalles de '.$producto->nombre.'')
<!-- Contenido -->
@section('contenido-padding')

<div class="container">
        <div class="row">
            <aside class="col-sm-5">
                    <div class="img-big-wrap">
                        <img class="p-10 rounded-circle" style="position:relative;width:100%;height:100%;top:50px;" src="{{$producto->getProductImg()}}">
                    </div>
                <!-- gallery-wrap .end// -->
            </aside>
            <aside class="col-sm-7">
                <article class="card-body p-5">
                    <h2 class="title mb-3 text-usuario">{{$producto->nombre}}</h2>
                    <p class="price-detail-wrap">
                        @if($producto->getPromoPrice()!=null)
                            <span class="price h4 text-green">
                                <span class="currency">MXN $</span><span class="num">{{$producto->getPromoPrice()}}</span>
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
                    <!-- price-detail-wrap .// -->
                    <dl class="item-property">
                        <dt>Descripción</dt>
                        <dd>
                            <p>{{$producto->descripcion}}</p>
                        </dd>
                    </dl>
                    <dl class="param param-feature">
                        <dt>Dines</dt>
                        <dd>{{$producto->puntos}}</dd>
                    </dl>
                    <!-- item-property-hor .// -->
                    @unless($producto->comentario == null)
                    <dl class="param param-feature">
                        <dt>Comentarios</dt>
                        <dd>{{$producto->comentario}}</dd>
                    </dl>
                    @endunless
                    <!-- item-property-hor .// -->

                    <hr>
                    <div class="row">
                        <div class="col-sm-5">
                            <dl class="param param-inline">
                                <dt>Cantidad: </dt>
                                <dd>
                                    <select class="form-control form-control-sm" style="width:70px;">
                                        <option> 1 </option>
                                        <option> 2 </option>
                                        <option> 3 </option>
                                    </select>
                                </dd>
                            </dl>
                            <!-- item-property .// -->
                        </div>
                    </div>
                    <!-- row.// -->
                    <hr>
                    <a href="#" class="btn btn-lg btn-primary text-uppercase">Comprar</a>
                    <a href="#" class="btn btn-lg btn-outline-primary text-uppercase"> <i class="fas fa-shopping-cart"></i> Agregar al carrito </a>
                </article>
                <!-- card-body.// -->
            </aside>
            <!-- col.// -->
        </div>
        <!-- row.// -->
</div>
<!--container.//-->
@endsection
