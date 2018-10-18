@php $user = auth()->user() @endphp
@if($user->loggedAs == 'usuario')
    <li><a href="{{route('usuario.promos')}}"><span class="fa fa-tags"></span>Promos</a></li>
    <li><a href="{{route('usuario.categorias')}}"><span class="fas fa-thumbtack"></span>Categorías</a></li>
    <li><a href="{{route('usuario.empresas')}}"><span class="fa fa-building"></span>Empresas</a></li>
    <li><a href="#"><span class="fa fa-bicycle"></span>Reparto</a></li>
    <li><a href="{{route('usuario.mapa')}}"><span class="fas fa-map-marker-alt"></span>Mapa</a></li>
    <li><a href="{{route('usuario.puntos')}}"><span class="fas fa-ticket-alt"></i></span>Puntos</a></li>
    <li><a href="{{route('usuario.notificaciones')}}"><span class="fa fa-envelope"></i></span>Notificaciones</a></li>
@elseif($user->loggedAs == 'empresa')
    <li><a href="{{route('empresa.inicio')}}"><span class="fas fa-thumbtack"></span>Mi Categoría</a></li>
    <li><a href="#"><span class="fa fa-tags"></span>Ofertas</a></li>
    <li><a href="#"><span class="fas fa-user-tie"></span>Mi Empresa</a></li>
    <li><a href="#"><span class="fas fa-history"></span>Historial</a></li>
    <li><a href="{{route('empresa.notificaciones')}}"><span class="fas fa-envelope"></span>Notificaciones</a></li>
@elseif($user->loggedAs == 'afiliador')
    <li><a href="{{route('afiliador.inicio')}}"><span class="fas fa-briefcase"></span>Mis Negocios</a></li>
    <li><a href="#"><span class="fas fa-dollar-sign"></span>Saldo</a></li>
    <li><a href="#"><span class="fas fa-history"></span>Historial</a></li>
    <li><a href="{{route('afiliador.notificaciones')}}"><span class="fa fa-envelope"></span>Notificaciones</a></li>
@elseif($user->loggedAs == 'repartidor')
    <li><a href="{{route('repartidor.inicio')}}"><span class="fas fa-map-marker-alt"></span>Repartidores en tu Zona</a></li>
    <li><a href="#"><span class="fas fa-clipboard-check"></span>Entregas Realizadas</a></li>
    <li><a href="#"><span class="fas fa-clipboard-list"></span>Entregas Pendientes</a></li>
    <li><a href="{{route('repartidor.notificaciones')}}"><span class="fas fa-envelope"></span>Notificaciones</a></li>
    <li><a href="#"><span class="fas fa-dollar-sign"></span>Saldo</a></li>
@else
    error
@endif
    <li><a href="{{route('about')}}"><span class="fa fa-question-circle"></i></span>...</a></li>
