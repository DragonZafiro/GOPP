<!-- Contenido General | MI CATEGORÍA -->
<!-- Plantilla -->
@extends('general')
<!-- Titulo -->
@section('titulo', 'Mi Categoría')
@section('boostrap')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
@endsection
<!-- Contenido -->
@section('styles')
    <link href="{{asset('dist/css/product-carousel.css')}}" rel="stylesheet">
@endsection
@section('contenido-padding')

<?php
$user = App\User::find(auth()->user()->id);
$neg = App\Business::find($user->loggedAsBusiness);
$category = App\CategoryModel::find($neg->category_id);
?>
    @php
        $businesses = $category->getBusiness();
    @endphp
    @if ($businesses->first() != null)
    <br>
    <div class="card-oferta-container container-fluid">
        <div class="row col-lg-12">
            <div class="col-md-6">
                <img class="float-left rounded-circle mr-4" style="height:60px" src="" />
                <h3>Estos son todos los negocios dentro de la categoría <span class="text-empresa">{{$category->nombre}}</span></h3>
            </div>
        </div>
        <div id="carousel-business" class="carousel slide" data-ride="carousel" data-interval="9000">
            <!-- Wrapper for slides -->
            <div class="carousel-inner principal_business row w-100 mx-auto" role="listbox">
                <?php $i = 0; ?>
                @foreach ($businesses as $buss)
                @if($i != 1)
                    <div class="carousel-item items_business col-md-3 active">
                    <?php $i = 1;?>
                    @else
                    <div class="carousel-item items_business col-md-3">
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
    @endif
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
