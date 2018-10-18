<!doctype html>
@php
$user = auth()->user();
$user_profile = glob("dist/img/user/profile/".$user->id."_".$user->nick.".*[jpg,png,jpeg,gif]");
$user_cover = glob("dist/img/user/cover/".$user->id."_".$user->nick.".*[jpg,png,jpeg,gif]");
if($user_profile == null) $user_profile[0] = "dist/img/user/profile/default.jpg";
if($user_cover == null) $user_cover[0] = "dist/img/user/cover/default.jpg";
@endphp
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta charset="utf-8">
		<title>Modo de logueo</title>
		<link rel="stylesheet" href="{{asset("dist/css/logMode.css")}}">
		<link rel="shortcut icon" href="{{asset("dist/img/logo/GoppSimbolo.png")}}"/>
        <link rel="stylesheet" href="{{asset('dist/css/bootstrap.min.css')}}">
		<link rel="stylesheet" href="{{asset("dist/css/goppStyles.css")}}">
	</head>
	<body>
        <div class="bgImg text-white">
            <div class="container-fluid blackLayer">
                    <div class="row mt-4">
                        <div class="col-md-4 col-lg-4 col-xs-4">
                            <div class="userCard">
                                <div class="userPhotoAligner">
                                    <div class="roundElementContainer squareSizeL mx-auto d-block">
                                        <img src="{{$user_profile[0]}}" class="img-fluid">
                                    </div>
                                </div>
                                <img class="coverPicture" src="{{$user_cover[0]}}">
                                <div class="userNameForUserCard">
                                    <h4>@yield('nickname')</h4>
                                    <p>@yield('name')</p>
                                </div>
                            </div>
                            <div class="col-auto">
                                <p class="text-center lead text-white">Ingresar como...</p>
                            </div>
                            <div class=" col-auto">

                                @if($user->loggedAs == 'empresa')
                                        @include("mode.menuEmpresa")
                                @else
                                        @include("mode.menu")

                                @endif
                            <div class="row"><a href="{{route('logout')}}" class="btn btn-block btn-lg btn-goppBtn btn-light">Salir</a></div>
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-8">
                            <div class="jumbotron noBg jumbotron-fluid">
                                <h2 class="display-2">Modo de acceso</h2>
                                <img src="{{asset('dist/img/logo/GoppLogo2.png')}}"  class="img-fluid">
                                <p class="lead">Con GOPP tienes acceso a toda variedad de productos.</p>
                                <p>¿Qué estás esperando?</p>
                                <a class="btn btn-primary btn-lg btn-goppBtn" href="#" role="button">Ver mas...</a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
	</body>
<script src="{{asset('dist/js/jquery.min.js')}}"></script>
<script src="{{asset('dist/js/popper.min.js')}}"></script>
<script src="{{asset('dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset("dist/js/myJsFunctions.js")}}"></script>
<script src="{{asset("dist/js/myJsDocReady.js")}}"></script>
</html>
