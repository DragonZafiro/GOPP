@php
if(!auth()->guest()){
    $user = auth()->user();
    $user_profile = $user->getUserImage();
    $user_cover = $user->getCoverImage();
    $business = $user->getBusinessSelected();
}
@endphp
<!DOCTYPE html>
<html lang="en">
	<head>
        <meta charset="utf-8">
        <meta name="_token" content="{{csrf_token()}}">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
        <link rel="shortcut icon" href="{{asset('dist/img/logo/GoppSimbolo.png')}}" type="image/x-icon">
        <link rel="icon" href="{{asset('dist/img/logo/GoppSimbolo.png')}}" type="image/x-icon">
        <title>GOPP - @yield('titulo')</title>
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
         <!-- Bootstrap 4.7 -->
         @section('boostrap')
        <link rel="stylesheet" href="{{asset('dist/css/bootstrap.min.css')}}">
        @show
        <!-- GOPP -->
        <link rel="stylesheet" href="{{asset('dist/css/goppStyles.css')}}">
        @yield('styles')
	</head>
    <body class="@yield('bg-color')">
		<div id="wrapper">
			<div id="sidebar-wrapper" class="scrollable">
                <div class="container-fluid my-0 mx-0 py-0 px-0 border-0">
                    @if(!auth()->guest())
                        <div class="navbar-header headerBar px-5 py-2 mx-0 row bg-{{$user->loggedAs}}">
                    @else
                        <div class="navbar-header headerBar px-5 py-2 mx-0 row bg-usuario">
                    @endif
                    </div>
                    <div class="container-fluid my-0 mx-0 py-0 px-0 border-0">
                        <div class="userCard">
                        @if(!auth()->guest())
                            @if($user->loggedAs != 'empresa')
                            <div class="userPhotoAligner">
                                <center>
                                    <div class="roundElementContainer squareSizeL">
                                        <img src="{{$user_profile}}">
                                    </div>
                                </center>
                            </div>
                            <img class="coverPicture" src="{{$user_cover}}">
                            @else
                            <img class="coverPicture" src="{{$user_profile  }}">
                            @endif
                            <div class="userNameForUserCard">
                                <h4>
                                    @if($user->loggedAsBusiness == 'vacio')
                                        {{$user->name}}
                                    @else
                                        {{$business->nombre}}
                                    @endif
                                </h4>
                                <p>{{$user->nick}}</p>
                            </div>
                        @else
                        <div class="userPhotoAligner">
                            <center>
                                <div class="roundElementContainer squareSizeL">
                                    <img src="{{asset('dist/img/user/profile/default.jpg')}}">
                                </div>
                            </center>
                        </div>
                        <img class="coverPicture" src="{{asset('dist/img/user/cover/default.jpg')}}">
                        @endif
                        </div>
                    </div>
                </div>
				<div class="container-fluid my-5 mx-0 px-0 py-0 mx-0">
					<div class="sideMenu">
						<ul>
                            @include('modules.sidemenu')
						</ul>
					</div>
				</div>
			</div>
			<div id="page-content-wrapper" class="my-0 mx-0 py-0 px-0">
				<div class="container-fluid my-0 mx-0 py-0 px-0">
					<header id="header" class="headerBar navbar-header bg-black-header px-1 py-1 mx-0">
						<div class="d-flex align-items-center">
							<div class="mr-auto px-1">
								<div class="row">
									<div class="col-3">
										<div class="align-self-start" data-target="#sBar">
											<a href="#menu-toggle" id="menu-toggle" class="fas fa-bars txtWhite txtM"></a>
										</div>
									</div>
									<div class="col-9">
                                        <a href="{{route('home')}}"><img src="{{asset('dist/img/logo/GoppLogo1.png')}}" alt="GOPP" style="height: 2rem;"></a>
									</div>
								</div>
                            </div>
                            <div class="session_user row align-items-center d-flex">
                            @if(!auth()->guest())
                                <div class="px-1">
                                    <div class='roundElementContainer squareSizeXXS'>
                                        <img src="{{$user_profile}}">
                                    </div>
                                </div>
                                <div class="px-1">
                                    <a class="txtXS" href="{{route(''.$user->loggedAs.'.cuenta')}}">
                                        @if($user->loggedAsBusiness == 'vacio')
                                            {{$user->nick}}
                                        @else
                                            {{$business->nombre}}
                                        @endif
                                    </a>
                                </div>
                                <div class="px-1">
                                    <a href="{{route(''.$user->loggedAs.'.switch')}}" class="text-white txtXS">
                                        <span class="fas fa-power-off txtWhite"/>
                                    </a>
                                </div>
                            @else
                                <div class="px-1">
                                    <span class="text-white p mr-3 pt-3">Bienvenido <a id="a-login" class="text-green" href="login">Iniciar Sesión</a>
                                </div>
                            @endif
                            </div>
                        </div>
					</header>
					<nav id="menu" class="mainMenu bg-colorBg1">
						<ul>
                            @include('modules.mainmenu')
						</ul>
					</nav>
					<div class="container-fluid p-0 m-0">
                        @yield('contenido')
                        <div class="container-fluid main-section">
                            @yield('contenido-padding')
                        </div>
					</div>
				</div>
			</div>
        </div>
    </body>
    <script src="{{asset('dist/js/jquery.min.js')}}"></script>
	<script src="{{asset('dist/js/popper.min.js')}}"></script>
    <script src="{{asset('dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('dist/js/myJsDocReady.js')}}"></script>
    <script src="{{asset('dist/js/myJsFunctions.js')}}"></script>
    <script>
        $(function () {
        $(document).scroll(function () {
            var $nav = $(".bg-black-header");
            $nav.toggleClass('scrolled', $(this).scrollTop() > 60);
        });
        });
    </script>
    @yield('scripts')
</html>
