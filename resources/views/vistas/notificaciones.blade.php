<!-- Plantilla -->
@extends('general')

@php $user = auth()->user(); $user_profile = $user->getUserImage();
if($user->loggedAs == 'empresa'){
    $business = $user->getBusinessSelected();
    $category = $business->category()->first();
}
@endphp
<!-- Titulo -->
@section('titulo', 'Notificaciones')
<!-- Contenido -->
@section('styles')
<link rel="stylesheet" href="{{asset('dist/css/chat.css')}}">
@endsection
@section('contenido-padding')
<div class="container darker">
    <img src="{{asset('dist/img/user/profile/1_root.png')}}" alt="Avatar">
    <h4>En GOPP nunca nos olvidamos de ti! =)</h4>
    <span class="time-right">12:42</span>
</div>
<div class="container darker">
    <img src="{{asset('dist/img/user/profile/1_root.png')}}" alt="Avatar">
    <h4>¡Hay 50% de descuento en Best Buy! ¿Vamos? =)</h4>
    <span class="time-right">11:05</span>
</div>
<div class="container darker">
    <img src="{{asset('dist/img/user/profile/1_root.png')}}" alt="Avatar">
    <h4>¡Te recordamos que aún no has completado tu compra en Mc Donald's!</h4>
    <span class="time-right">15:34</span>
</div>
@endsection
