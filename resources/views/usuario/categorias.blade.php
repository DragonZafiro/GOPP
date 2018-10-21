<!-- Contenido General | CATEGORIAS -->
<!-- Plantilla -->
@extends('general')
<!-- Titulo -->
@section('titulo', 'Categorías de empresas')
{{-- Definición de Íconos --}}
<?php
    $icons = [
//  Category ID |    Font Awesome Icons
        '1' => 'utensils',
        '2' => 'cube',
        '3' => 'film',
        '4' => 'beer',
        '5' => 'coffee',
        '6' => 'umbrella-beach',
        '7' => 'heart',
        '8' => 'hotel',
        '9' => 'swimmer',
        '10' => 'tv',
        '11' => 'gamepad',
        '12' => 'android',
        '13' => 'desktop',
        '14' => 'home',
        '15' => 'save',
        '16' => 'clock',
        '17' => 'briefcase-medical',
        '18' => 'futbol',
        '19' => 'dog',
        '20' => 'graduation-cap',
        '21' => 'chart-line',
        '22' => 'user-tie',
        '23' => 'feather-alt'
    ]
?>
<!-- Contenido -->
@section('contenido')
<div style="margin: 20px;">
    <div class="card-deck">
        <?php
            $i = 0; // 4 Categorías en una columna
            $j = 1; // Contador para íconos
        ?>
        @foreach ($categories as $category)
        @if($i == 4)
            </div>
            </div>
            <div style="margin: 20px;">
            <div class="card-deck">
            <?php $i = 0; ?>
        @endif
        <div class="card">
            <a href="{{route('usuario.empresas', ['s' => '', 'categoria' => $category->id])}}">
                <img src="{{asset('dist/img/categorias/'.$category->id.'.jpg')}}" class="card-img-top">
                <div class="iconoCategoria text-black">
                    <span class="fas fa-{{$icons[$j]}}"></span> {{$category->nombre}}
                </div>
            </a>
        </div>
        <?php $i++; $j++;?>
        @endforeach
    </div>
</div>
@endsection
