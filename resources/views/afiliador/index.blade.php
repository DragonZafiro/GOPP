{{-- Mis Negocios --}}
@extends('general')
@section('titulo', 'Mis Negocios')
@section('styles')
<link href="{{asset('dist/css/product-carousel.css')}}" rel="stylesheet">
@endsection
@section('boostrap')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
@endsection
@section('contenido-padding')
<div class="card-oferta-container container-fluid">
    <div class="row col-lg-12">
        <div class="col-md-6">
            <h3>Actualmente tienes <span class="text-afiliador">{{$business->count()}}</span> Negocio(s) afiliados</h3>
        </div>
    </div>
    <div id="carousel-business" class="carousel slide" data-ride="carousel" data-interval="9000">
        <!-- Wrapper for slides -->
        <div class="carousel-inner principal_business row w-100 mx-auto" role="listbox">
            <?php $i = 0; ?>
            @foreach ($business as $negocio)
                @if($i != 1)
                <div class="carousel-item items_business col-xs-12 col-12 col-md-3 active">
                <?php $i = 1;?>
                @else
                <div class="carousel-item items_business col-xs-12 col-12 col-md-3">
                @endif
                    <div class="img-wrap">
                        <div class="roundElementContainer  text-center">
                            <img src="{{$negocio->getBusiness()->getBusinessImg($negocio)}}" style="height:210px;width:90%">
                        </div>
                    </div>
                    <figcaption class="info-wrap">
                        <div class="col-lg-19 text-center">
                            <h3>
                                {{$negocio->getBusiness()->nombre}}
                            </h3>
                            <p>
                                {{$negocio->getBusiness()->descripcion}}
                            </p>
                            <p><a class="btn btn-goppBtn btn-primary btn-m" href="{{route('afiliador.empresa', ['id' => $negocio->getBusiness()])}}"
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
@endsection
@section('scripts')
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
@endsection
