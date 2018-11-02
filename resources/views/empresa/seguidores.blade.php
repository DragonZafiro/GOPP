@extends('general')
@section('titulo', 'Mis Seguidores')
@section('contenido')
	<div class="container text-center">
		<h5 class="txtXXL text-usuario">Seguidores</h5>
        @if($users->count() > 0)
            <h4>¡Estos usuarios te están siguiendo!</h4>
        @else
            <h4>No tienes ningún seguidor</h4>
        @endif
    </div>
@endsection
@section('contenido-padding')
    <div class="row p-0">
        @foreach($users as $user)
        <div class="col-lg-12 col-xs-10 col-md-10 col-sm-10 p-1">
            <div class="media p-1">
                <a class="float-left pb-3" href="#">
                    <img class="media-object dp rounded-circle" src="{{$user->getUser()->getUserImage()}}" style="width: 100px;height:100px;">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{$user->getUser()->name}} {{$user->getUser()->last_name}}
                        <br><small> {{$user->getUser()->pais}}</small>
                    </h4>
                    <hr>
                    <p class="bottom-left">{{$user->getUser()->email}}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
