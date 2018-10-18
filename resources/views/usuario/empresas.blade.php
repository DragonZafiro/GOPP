<!-- Contenido General | EMPRESAS -->
<!-- Plantilla -->
@extends('general')
@php
$categories = App\CategoryModel::all();
@endphp
@section('boostrap')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
@endsection
<!-- Titulo -->
@section('titulo', 'Empresas')
@section('styles')
    <link href="{{asset('dist/css/product-carousel.css')}}" rel="stylesheet">
@endsection
<!-- Contenido -->
<!-- Barra de búsqueda -->
@section('contenido')
<nav class="navbar navbar-expand-md navbar-light bg-faded">
    <h4 class="navbar-brand" style="color:darkolivegreen;">Todos los negocios</h4>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar5">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="navbar5">
        <form class="mx-2 my-auto d-inline w-100" action="{{route('usuario.empresas')}}" method="get">
            <div class="input-group">
                <input type="text" name='s' value="{{ Request::query('s') }}" class="form-control border border-right-0" placeholder="Buscar (Nombre o descripción o categoria)">
                <span class="input-group-append">
                <button class="btn btn-outline-secondary border border-left-0" type="submit">
                    <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
    </div>
</nav>
@endsection
@section('contenido-padding')
{{-- EMPRESAS TODAS--}}
@if($s == null)
    @foreach ($categories as $category)
    @php
        $businesses = $category->getBusiness();
    @endphp
    @if ($businesses->first() != null)
    <br>
    <div class="card-oferta-container container-fluid">
        <div class="row col-lg-12">
            <div class="col-md-6">
                <img class="float-left rounded-circle mr-4" style="height:60px" src="" />
                <h3 class="text-usuario">{{$category->nombre}}</h3>
                <h5>{{$businesses->count()}} Negocio(s) disponibles</h5>
            </div>
        </div>
        <div id="carousel-{{$category->id}}" class="carousel slide" data-ride="carousel" data-interval="9000">
            <!-- Wrapper for slides -->
            <div class="carousel-inner principal_{{$category->id}} row w-100 mx-auto" role="listbox">
                <?php $i = 0; ?>
                @foreach ($businesses as $buss)
                @if($i != 1)
                    <div class="carousel-item items_{{$category->id}} col-md-3 active">
                    <?php $i = 1;?>
                    @else
                    <div class="carousel-item items_{{$category->id}} col-md-3">
                        @endif
                        <div class="img-wrap">
                            <div class="roundElementContainer  text-center">
                                <img src="{{$buss->getBusinessImg($buss)}}" style="height:210px;width:90%">
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
            <a class="carousel-control-prev" href="#carousel-{{$category->id}}" role="button" data-slide="prev" style="width: 20px!important;">
                <span class="text-usuario txtM fas fa-caret-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel-{{$category->id}}" role="button" data-slide="next" style="width: 20px!important;">
                <span class="text-usuario txtM fas fa-caret-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    @endif
    @endforeach
@elseif($s != null && $business->count() > 0)
{{-- BUSQUEDA EMPRESAS --}}
<br>
<div class="card-oferta-container container-fluid">
    <div class="row col-lg-12">
        <div class="col-md-6">
            <h5>{{$business->count()}} Negocio(s) encontrados</h5>
        </div>
    </div>
    <div id="carousel-business" class="carousel slide" data-ride="carousel" data-interval="9000">
        <!-- Wrapper for slides -->
        <div class="carousel-inner principal_business row w-100 mx-auto" role="listbox">
            <?php $i = 0; ?>
            @foreach ($business->get() as $negocio)
                @if($i != 1)
                <div class="carousel-item items_business col-md-3 active">
                <?php $i = 1;?>
                @else
                <div class="carousel-item items_business col-md-3">
                @endif
                    <div class="img-wrap">
                        <div class="roundElementContainer  text-center">
                            <img src="{{$negocio->getBusinessImg($negocio)}}" style="height:210px;width:90%">
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
</div>
@else
    <h5 class="text-center text-usuario"> No se han encontrado negocios </h5>
@endif
@endsection
{{-- SCRIPTS --}}
@section('scripts')
{{-- TODOS LOS NEGOCIOS--}}
@foreach($categories as $category)
    @php
        $businesses = $category->getBusiness();
    @endphp
    @if ($businesses->first() != null)
        <script>
                $('#carousel-{{$category->id}}').on('slide.bs.carousel', function (e) {
                    var $e = $(e.relatedTarget);
                    var idx = $e.index();
                    var itemsPerSlide = 4;
                    var totalItems = $('.items_{{$category->id}}').length;

                    if (idx >= totalItems-(itemsPerSlide-1)) {
                        var it = itemsPerSlide - (totalItems - idx);
                        for (var i=0; i<it; i++) {
                            // append slides to end
                            if (e.direction=="left") {
                                $('.items_{{$category->id}}').eq(i).appendTo('.principal_{{$category->id}}');
                            }
                            else {
                                $('.items_{{$category->id}}').eq(0).appendTo('.principal_{{$category->id}}');
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
