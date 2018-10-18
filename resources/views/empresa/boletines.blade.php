@extends('general')
@php
    $user = App\User::find(auth()->user()->id);
@endphp
@section('titulo', 'Mis Boletines')
<!-- Estilos -->

@section('styles')
<link rel="stylesheet" href="{{asset('dist/DataTables/css/jquery.dataTables.min.css')}}">
<link rel="stylesheet" href="{{asset('dist/css/sweetalert2.min.css')}}">
@endsection

<!-- Contenido -->

@section('contenido-padding')
<h1 class="display-4 text-empresa">Mis Boletines</h1>
<h2>Estos son tus <span class="badge badge-primary">Boletines</span>:</h2>
<table class="table table-striped table-bordered dt-responsive table-responsive-lg" id="products-table" style="width:100%">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Título</th>
            <th scope="col">Contenido</th>
            <th scope="col">Enlace</th>
            <th scope="col">Plantilla</th>
            <th scope="col">Caducación</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
<a onclick="addForm()" class="btn btn-m btn-info btn-lg text-white pull-right">Agregar nuevo boletín</a>
@endsection

@section('scripts')
<script src="{{asset('dist/js/sweetalert2.min.js')}}"></script>
<script src="{{asset('dist/DataTables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('dist/js/boletines.js')}}" type="text/javascript"></script>
@endsection
