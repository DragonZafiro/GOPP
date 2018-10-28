<!-- Contenido General | PROMOS -->
<!-- Plantilla -->
@extends('general')
<!-- Titulo -->
@section('titulo', 'Guardados')
<!-- Contenido -->
@section('contenido')
	<div class="container text-center">
		<h5 class="txtXXL text-usuario">Guardados</h5>
    	<h4> Esto es lo que has marcado como favorito, te facilitamos la vida, no lo busques tanto! </h4>
	</div>
@endsection
@section('contenido-padding')
	<div class="container">
        <div class="row">
            <div class="row col-lg-12">
                <div class="col-md-3">
                    <div class="img-wrap">
                        <div class="roundElementContainer  text-center">
                            <img class="img-fluid" src="{{asset('dist/img/user/profile/default.jpg')}}" >
                        </div>
                    </div>
                    <figcaption class="info-wrap" >
                        <div class="col-lg-19 text-center">
                            <h3>
                                WALMART
                            </h3>
                            <p>
                                Supercenter
                            </p>
                            <p><a class="btn btn-goppBtn btn-primary btn-m" href="#" role="button">ir a pagina oficial</a></p>
                        </div>
                    </figcaption>
                    <!-- card // -->
                </div>
                <div class="col-md-3">

                        <div class="img-wrap">
                            <img src="http://placehold.it/350x260" class="img-fluid rounded-circle">
                            <a class="btn-overlay hidden-xs" href="#"><i class="fa fa-search-plus"></i></a>
                        </div>
                        <figcaption class="info-wrap">
                            <h6 class="title text-dots"><a href="#">HAMBURGUESA</a></h6>
                            <div class="action-wrap">
                                <a href="#" class="btn btn-primary btn-sm float-right"> Agregar </a>
                                <div class="price-wrap h5">
                                    <span class="price-new">$10</span>
                                    <del class="price-old">$13</del>
                                </div>
                                <!-- price-wrap.// -->
                            </div>
                            <!-- action-wrap -->
                        </figcaption>

                    <!-- card // -->
                </div>
                <div class="col-md-3">
                    <div class="img-wrap">
                        <div class="roundElementContainer  text-center">
                            <img class="img-fluid" src="{{asset('dist/img/user/profile/default.jpg')}}" style="height:210px;width:90%">
                        </div>
                    </div>
                    <figcaption class="info-wrap" >
                        <div class="col-lg-19 text-center">
                            <h3>
                                WALMART
                            </h3>
                            <p>
                                Supercenter
                            </p>
                            <p><a class="btn btn-goppBtn btn-primary btn-m" href="#" role="button">ir a pagina oficial</a></p>
                        </div>
                    </figcaption>
                    <!-- card // -->
                </div>
                <div class="col-md-3">
                    <div class="img-wrap">
                        <div class="roundElementContainer  text-center">
                            <img  class="img-fluid" src="{{asset('dist/img/user/profile/default.jpg')}}" style="height:210px;width:90%">
                        </div>
                    </div>
                    <figcaption class="info-wrap" >
                        <div class="col-lg-19 text-center">
                            <h3>
                                WALMART
                            </h3>
                            <p>
                                Supercenter
                            </p>
                            <p><a class="btn btn-goppBtn btn-primary btn-m" href="#" role="button">ir a pagina oficial</a></p>
                        </div>
                    </figcaption>
                    <!-- card // -->
                </div>
            </div>
        </div>
    </div>
@endsection
