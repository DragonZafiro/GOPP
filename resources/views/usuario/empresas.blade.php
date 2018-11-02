<!-- Contenido General | EMPRESAS -->
<!-- Plantilla -->
@extends('general')
<?php $categories = App\CategoryModel::all(); ?>
@section('boostrap')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('dist/css/product-carousel.css')}}">
@endsection
<!-- Titulo -->
@section('titulo', 'Empresas')
<!-- Contenido -->
<!-- Barra de búsqueda -->
@section('contenido')
<nav class="navbar navbar-expand-md navbar-light bg-faded">
    <h4 class="navbar-brand" style="color:darkolivegreen;">
        @if($category == "todas" || $category == null)
            Todas las categorías
        @else
            {{$category->nombre}}
        @endif
    </h4>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar5">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="navbar5">
        <form class="mx-2 my-auto d-inline w-100" action="{{route('usuario.empresas')}}" method="get">
            <div class="row">
            <div class="input-group col-10">
                <input type="text" name='s' value="{{ Request::query('s') }}" class="form-control border border-right-0" placeholder="Buscar (Nombre o descripción)...">
                <span class="input-group-append">
                <button class="btn btn-outline-secondary border border-left-0" type="submit">
                    <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
            <div class="input-group col-2">
                <select class="custom-select" id="categoria" name="categoria" value="{{ Request::query('category') }}">
                    <option value="todas">Todas las categorías</option>
                    @foreach ($categories as $categoria)
                        @if($category == $categoria)
                            <option selected="selected" value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                        @else
                            <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            </div>
        </form>
    </div>
</nav>
@endsection

@section('contenido-padding')
{{-- EMPRESAS TODAS--}}
@if($s == null)
    <?php
    if($category == "todas" || $category == null)
        $categories = App\CategoryModel::all();
    else
        $categories = App\CategoryModel::find($category);
    ?>
@foreach ($categories as $categoria)
<?php $businesses = $categoria->getBusiness(); ?>
@if($businesses->first() != null)
    <div class="card-oferta-container container-fluid">
        <div class="row col-lg-12">
            <div class="col-md-6">
                <img class="float-left rounded-circle mr-4" style="height:60px" src="" />
                <h3 class="text-usuario">{{$categoria->nombre}}</h3>
                <h5>{{$businesses->count()}} Negocio(s) disponibles.</h5>
            </div>
        </div>
        @if($businesses->count() > 4)
        <div id="carousel-{{$categoria->id}}" class="carousel slide" data-ride="carousel" data-interval="9000">
            <!-- Wrapper for slides -->
            <div class="carousel-inner principal_{{$categoria->id}} row w-100 mx-auto" role="listbox">
                <?php $i = 0; ?>
                @foreach ($businesses as $buss)
                @if($i != 1)
                    <div class="carousel-item items_{{$categoria->id}} col-xs-12 col-12 col-md-3 active">
                    <?php $i = 1;?>
                    @else
                    <div class="carousel-item items_{{$categoria->id}} col-xs-12 col-12 col-md-3">
                        @endif
                        <span class="favorite top-right">
                            @if(auth()->user()->checkBusinessFaved($buss->id))
                            <button id="favorite" class="fav faved" onclick="addBusinessFavorite({{$buss->id}})">
                            @else
                            <button id="favorite" class="fav" onclick="addBusinessFavorite({{$buss->id}})">
                            @endif
                                <span class="fas fa-star">
                                    <span class="fas fa-star"></span>
                                </span>
                            </button>
                        </span>
                        <div class="img-wrap">
                            <div class="text-center">
                                <img class="img-fluid rounded-circle" src="{{$buss->getBusinessImg()}}" style="height:210px;width:90%">
                            </div>
                        </div>
                        <figcaption class="info-wrap">
                            <div class="col-lg-19 text-center">
                                <h3>
                                    {{$buss->nombre}}
                                </h3>
                                <p>
                                    {{$buss->descripcion}}
                                </p>
                                <p><a class="btn btn-goppBtn btn-primary btn-m" href="{{route('usuario.empresa', ['business' => $buss])}}" role="button">Ir a la página del negocio</a></p>
                            </div>
                        </figcaption>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carousel-{{$categoria->id}}" role="button" data-slide="prev" style="width: 20px!important;">
                <span class="text-usuario txtM fas fa-caret-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel-{{$categoria->id}}" role="button" data-slide="next" style="width: 20px!important;">
                <span class="text-usuario txtM fas fa-caret-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        @else
        <div class="row w-100 mx-auto">
            @foreach ($businesses as $buss)
            <div class="col-sm-6 col-md-3">
                <span class="favorite top-right">
                    @if(auth()->user()->checkBusinessFaved($buss->id))
                    <button id="favorite" class="fav faved" onclick="addBusinessFavorite({{$buss->id}})">
                    @else
                    <button id="favorite" class="fav" onclick="addBusinessFavorite({{$buss->id}})">
                    @endif
                        <span class="fas fa-star">
                            <span class="fas fa-star"></span>
                        </span>
                    </button>
                </span>
                <div class="img-wrap">
                    <div class="text-center">
                        <img class="img-fluid rounded-circle" src="{{$buss->getBusinessImg($buss)}}" style="height:210px;width:90%">
                    </div>
                </div>
                <figcaption class="info-wrap">
                    <div class="col-lg-19 text-center">
                        <h3>
                            {{$buss->nombre}}
                        </h3>
                        <p>
                            {{$buss->descripcion}}
                        </p>
                        <p><a class="btn btn-goppBtn btn-primary btn-m" href="{{route('usuario.empresa', ['business' => $buss])}}" role="button">Ir a la página del negocio</a></p>
                    </div>
                </figcaption>
            </div>
            @endforeach
        </div>
        @endif
    </div>
    @endif
@endforeach
@elseif($s != null && $business->count() > 0)
{{-- BUSQUEDA EMPRESAS --}}
<br>
<div class="card-oferta-container container-fluid">
    <div class="row col-lg-12">
        <div class="col-md-6">
            <h5>{{$business->count()}} Negocio(s) encontrados. Resultados de {{$s}}:</h5>
        </div>
    </div>
    @if($business->count() > 4)
    <div id="carousel-business" class="carousel slide" data-ride="carousel" data-interval="9000">
        <!-- Wrapper for slides -->
        <div class="carousel-inner principal_business row w-100 mx-auto" role="listbox">
            <?php $i = 0; ?>
            @foreach ($business->get() as $negocio)
                @if($i != 1)
                <div class="carousel-item items_business col-xs-12 col-12 col-md-3 active">
                <?php $i = 1;?>
                @else
                <div class="carousel-item items_business col-xs-12 col-12 col-md-3">
                @endif
                <span class="favorite top-right">
                    @if(auth()->user()->checkBusinessFaved($negocio->id))
                    <button id="favorite" class="fav faved" onclick="addBusinessFavorite({{$negocio->id}})">
                    @else
                    <button id="favorite" class="fav" onclick="addBusinessFavorite({{$negocio->id}})">
                    @endif
                        <span class="fas fa-star">
                            <span class="fas fa-star"></span>
                        </span>
                    </button>
                </span>
                    <div class="img-wrap">
                        <div class="roundElementContainer  text-center">
                            <img src="{{$negocio->getBusinessImg()}}" style="height:210px;width:90%">
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
                            <p><a class="btn btn-goppBtn btn-primary btn-m" href="{{route('usuario.empresa', ['business' => $negocio])}}"
                                    role="button">Ir a la página del negocio</a></p>
                        </div>
                    </figcaption>
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carousel-business" role="button" data-slide="prev" style="width: 20px!important;">
            <span class="text-usuario txtM fas fa-caret-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-business" role="button" data-slide="next" style="width: 20px!important;">
            <span class="text-usuario txtM fas fa-caret-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    @else
    <div class="row w-100 mx-auto" >
        @foreach ($business->get() as $negocio)
        <div class="col-xs-12 col-12 col-md-3">
            <span class="favorite top-right">
                <button id="favorite" class="fav" onclick="addBusinessFavorite({{$negocio->id}})">
                    <span class="fas fa-star">
                        <span class="fas fa-star"></span>
                    </span>
                </button>
            </span>
            <div class="img-wrap">
                <div class="text-center">
                    <img class="img-fluid rounded-circle" src="{{$negocio->getBusinessImg()}}" style="height:210px;width:90%">
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
    @endif
</div>
@else
    <h5 class="text-center text-usuario"> No se han encontrado resultados de {{$s}}</h5>
@endif
@endsection
{{-- SCRIPTS --}}
@section('scripts')
@routes
<script src="{{asset('dist/js/favoritos.js')}}"></script>
{{-- TODOS LOS NEGOCIOS--}}
@foreach($categories as $categoria)
    <?php $businesses = $categoria->getBusiness(); ?>
    @if ($businesses->first() != null)
        <script>
                $('#carousel-{{$categoria->id}}').on('slide.bs.carousel', function (e) {
                    var $e = $(e.relatedTarget);
                    var idx = $e.index();
                    var itemsPerSlide = 4;
                    var totalItems = $('.items_{{$categoria->id}}').length;

                    if (idx >= totalItems-(itemsPerSlide-1)) {
                        var it = itemsPerSlide - (totalItems - idx);
                        for (var i=0; i<it; i++) {
                            // append slides to end
                            if (e.direction=="left") {
                                $('.items_{{$categoria->id}}').eq(i).appendTo('.principal_{{$categoria->id}}');
                            }
                            else {
                                $('.items_{{$categoria->id}}').eq(0).appendTo('.principal_{{$categoria->id}}');
                            }
                        }
                    }
                });
        </script>
    @endif
@endforeach
{{-- BUSQUEDA DE NEGOCIOS --}}
@unless($business->count() == 0)
<script>
    $('#carousel-business').on('slide.bs.carousel', function (e) {
        var $e = $(e.relatedTarget);
        var idx = $e.index();
        var itemsPerSlide = 4;
        var totalItems = $('.items_business').length;

        if (idx >= totalItems-(itemsPerSlide-1)) {
            var it = itemsPerSlide - (totalItems - idx);
            for (var i=0; i<it; i++) {
                // append slides to end
                if (e.direction=="left") {
                    $('.items_business').eq(i).appendTo('.principal_business');
                }
                else {
                    $('.items_business').eq(0).appendTo('.principal_business');
                }
            }
        }
    });
</script>
@endunless
@endsection
