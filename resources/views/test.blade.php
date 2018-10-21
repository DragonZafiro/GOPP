<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/goppStyles.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
        crossorigin="anonymous">
</head>
<body>
    <header id="header" class="headerBar navbar-header bg-black-header px-1 py-1 mx-0">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <div class="row">
                    <div class="col-3 txtM text-white">
                        <span class="iniciar-sesion fas fa-bars sidebar-toggle top-left"></span>
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
                        <img src="{{$user->getUserImage()}}">
                    </div>
                </div>
                <div class="px-1">
                    <a class="txtXS" href="{{route(''.$user->loggedAs.'.cuenta')}}">
                                            @if($user->loggedAsBusiness == 'vacio')
                                                {{$user->nick}}
                                            @else
                                                {{$user->getBusinessSelected()->nombre}}
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
                    <span class="text-white p mr-3 pt-3">Bienvenido <a id="a-login" class="text-green iniciar-sesion" href="login">Iniciar Sesión</a>
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
    <!-- Overlay for fixed sidebar -->
    <div class="sidebar-overlay"></div>
    <!-- Material sidebar -->
    <aside id="sidebar" class="sidebar sidebar-stacked sidebar-inverse" role="navigation">
        <!-- Sidebar header -->
        <div  class="sidebar-header bg-usuario">
            <!-- Sidebar toggle button -->
            <span class="iniciar-sesion sidebar-toggle top-right m-0">
                <li class="fas fa-bars text-white txtM ml-3"></li>
            </span>
            <div class="userCard">
                @if(!auth()->guest()) @if($user->loggedAs != 'empresa')
                <div class="userPhotoAligner">
                    <center>
                        <div class="roundElementContainer squareSizeL">
                            <img src="{{$user->getUserImage()}}">
                        </div>
                    </center>
                </div>
                <img class="coverPicture" src="{{$user->getCoverImage()}}"> @else
                <img class="coverPicture" src="{{$user->getUserImage()  }}"> @endif
                <div class="userNameForUserCard">
                    <h4>
                        @if($user->loggedAsBusiness == 'vacio') {{$user->name}} @else {{$user->getBusinessSelected()->nombre}} @endif
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
                <div class="userNameForUserCard">
                    <h4>
                        Invitado
                    </h4>
                </div>
                @endif
            </div>
        </div>
        <div class="sideMenu">
            <!-- Sidebar navigation -->
            <ul class="">
                @include('modules.sidemenu')
            </ul>
        </div>
        <!-- Sidebar divider -->
        <!-- <div class="sidebar-divider"></div> -->

        <!-- Sidebar text -->
        <!--  <div class="sidebar-text">Text</div> -->
    </aside>
    <div class="container">
        <span class="iniciar-sesion fas fa-bars txtM sidebar-toggle top-left"></span>
    </div>
    <script src="{{asset('dist/js/jquery.min.js')}}"></script>
    <script src="{{asset('dist/js/popper.min.js')}}"></script>
    <script src="{{asset('dist/js/bootstrap.min.js')}}"></script>
    <script src="js/sidebar.js"></script>
</body>
</html>
