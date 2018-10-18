@php $user = auth()->user() @endphp
@if($user->loggedAs == 'usuario')
    <a href="{{route('usuario.promos')}}"><li><span class="fa fa-home"></span>Inicio</li></a>
    <a href="{{route('usuario.cuenta')}}"><li><span class="fa fa-user"></span>Mi Cuenta</li></a>
    <a href="{{route('usuario.puntos')}}"><li><span class="fas fa-ticket-alt"></span>Mis Puntos</li></a>
    <a href="{{route('usuario.pedidos')}}"><li><span class="fa fa-truck"></span>Mis Pedidos</li></a>
    <a href="{{route('usuario.guardados')}}"><li><span class="fa fa-envelope"></span>Guardados</li></a>
    <a href="{{route('usuario.factura')}}"><li><span class="fa fa-industry"></span>Factura</li></a>
    <a href="{{route('usuario.loquequieras')}}"><li><span class="fas fa-magic"></span>Lo que quieras</li></a>
    <a href="{{route('usuario.favor')}}"><li><span class="fas fa-box-open"></span>Favor</li></a>
    <a href="{{route('usuario.share')}}"><li><span class="fas fa-share-alt-square"></span>Comparte y Gana!</li></a>
    <a href="{{route('praemie')}}"><li class="text-praemie"><span class="fa fa-rocket"></span>Praemie</li></a>
    <a href="{{route('about')}}"><li><span class="fa fa-eye"></span>Acerca de...</li></a>
    <a href="{{route('usuario.switch')}}"><li><span class="fas fa-power-off"></span>Cambiar Sesión</li></a>
@elseif($user->loggedAs == 'empresa')
    <a href="{{route('empresa.inicio')}}"><li><span class="fa fa-home"></span>Inicio</li></a>
    <a href="{{route('empresa.cuenta')}}"><li><span class="fa fa-user"></span>Mi Cuenta</li></a>
    <a href="#"><li><span class="fas fa-user-friends"></span>Mis Seguidores</li></a>
    <a href="{{route('empresa.LanzarBoletin')}}"><li><span class="fas fa-exclamation-circle"></span>Lanzar Boletín</li></a>
    <a href="{{route('praemie')}}"><li class="text-praemie"><span class="fa fa-rocket"></span>Praemie</li></a>
    <a href="{{route('about')}}"><li><span class="fa fa-eye"></span>Contácto...</li></a>
    <a href="{{route('empresa.switch')}}"><li><span class="fas fa-power-off"></span>Cambiar Sesión</li></a>
@elseif($user->loggedAs == 'afiliador')
    <a href="{{route('afiliador.inicio')}}"><li><span class="fa fa-home"></span>Inicio</li></a>
    <a href="{{route('afiliador.cuenta')}}"><li><span class="fa fa-user"></span>Mi Cuenta</li></a>
    <a href="#"><li><span class="fas fa-bullhorn"></span>Promocionate</li></a>
    <a href="#"><li><span class="fas fa-map-marked-alt"></span>Exclusividad</li></a>
    <a href="{{route('praemie')}}"><li class="text-praemie"><span class="fa fa-rocket"></span>Praemie</li></a>
    <a href="{{route('about')}}"><li><span class="fa fa-eye"></span>Contácto</li></a>
    <a href="{{route('afiliador.switch')}}"><li><span class="fas fa-power-off"></span>Cambiar Sesión</li></a>
@elseif($user->loggedAs == 'repartidor')
    <a href="{{route('repartidor.inicio')}}"><li><span class="fa fa-home"></span>Inicio</li></a>
    <a href="{{route('repartidor.cuenta')}}"><li><span class="fa fa-user"></span>Mi Cuenta</li></a>
    <a href="#"><li><span class="fa fa-envelope"></span>Buzón</li></a>
    <a href="{{route('praemie')}}"><li class="text-praemie"><span class="fa fa-rocket"></span>Praemie</li></a>
    <a href="{{route('about')}}"><li><span class="fa fa-envelope"></span>Contácto</li></a>
    <a href="{{route('repartidor.switch')}}"><li><span class="fas fa-power-off"></span>Cambiar Sesión</li></a>
@else
    error
@endif
