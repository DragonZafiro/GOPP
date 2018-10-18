<!-- Contenido General | CATEGORIAS -->
<!-- Plantilla -->
@extends('general')
<!-- Titulo -->
@section('titulo', 'Categorías de empresas')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!-- Contenido -->
@section('contenido')
<div style="margin: 20px;">
        <div class="card-deck">

            <div class="card">
                <a href="empresas.php?search=Comida">
                    <img src="{{asset('dist/img/categorias/1.jpg')}}" class="card-img-top">
                      <div class="iconoCategoria">
                          <center>
                              <i class="material-icons md-48">fastfood</i>
                              Comida
                          </center>
                      </div>
                  </a>

            </div>

            <div class="card">
                <a href="empresas.php?search=Ocio">
                    <img src="{{asset('dist/img/categorias/2.jpg')}}" class="card-img-top">
                      <div class="iconoCategoria">
                          <center>
                              <i class="material-icons md-48">accessibility_new</i>
                              Ocio
                          </center>
                      </div>
                  </a>
            </div>

            <div class="card">
                <a href="empresas.php?search=Entretenimiento">
                    <img src="{{asset('dist/img/categorias/3.jpg')}}" class="card-img-top">
                      <div class="iconoCategoria">
                          <center>
                              <i class="material-icons md-48">movie</i>
                              Entretenimiento
                          </center>
                      </div>
                  </a>
            </div>

            <div class="card">
                <a href="empresas.php?search=Bares">
                    <img src="{{asset('dist/img/categorias/4.jpg')}}" class="card-img-top">
                      <div class="iconoCategoria">
                          <center>
                              <i class="material-icons md-48">local_drink</i>
                              Bares
                          </center>
                      </div>
                  </a>
            </div>
        </div>
    </div>

    <div style="margin: 20px;">
        <div class="card-deck">
            <div class="card">
                <a href="empresas.php?search=Bebidas">
                    <img src="{{asset('dist/img/categorias/5.jpg')}}" class="card-img-top">
                      <div class="iconoCategoria">
                          <center>
                              <i class="material-icons md-48">local_drink</i>
                              Bebidas
                          </center>
                      </div>
                  </a>
            </div>

            <div class="card">
                <a href="empresas.php?search=Belleza">
                    <img src="{{asset('dist/img/categorias/6.jpg')}}" class="card-img-top">
                      <div class="iconoCategoria">
                          <center>
                              <i class="material-icons md-48">face</i>
                              Belleza
                          </center>
                      </div>
                  </a>
            </div>

            <div class="card">
                <a href="empresas.php?search=Moda">
                    <img src="{{asset('dist/img/categorias/7.jpg')}}" class="card-img-top">
                      <div class="iconoCategoria">
                          <center>
                              <i class="material-icons md-48">favorite</i>
                              Moda
                          </center>
                      </div>
                  </a>
            </div>

            <div class="card">
                <a href="empresas.php?search=Hoteles y Viajes">
                    <img src="{{asset('dist/img/categorias/8.jpg')}}" class="card-img-top">
                      <div class="iconoCategoria">
                          <center>
                              <i class="material-icons md-48">work</i>
                              Hoteles y viajes
                          </center>
                      </div>
                  </a>
            </div>
        </div>
    </div>

    <div style="margin: 20px;">
        <div class="card-deck">
            <div class="card">
                <a href="empresas.php?search=Deportes">
                    <img src="{{asset('dist/img/categorias/9.jpg')}}" class="card-img-top">
                      <div class="iconoCategoria">
                          <center>
                              <i class="material-icons md-48">fitness_center</i>
                              Deportes
                          </center>
                      </div>
                  </a>
            </div>

            <div class="card">
                <a href="empresas.php?search=TV y Audio">
                    <img src="{{asset('dist/img/categorias/10.jpg')}}" class="card-img-top">
                      <div class="iconoCategoria">
                          <center>
                              <i class="material-icons md-48">tv</i>
                              Tv y audio
                          </center>
                      </div>
                  </a>
            </div>

            <div class="card">
                <a href="empresas.php?search=Videojuegos">
                    <img src="{{asset('dist/img/categorias/11.jpg')}}" class="card-img-top">
                      <div class="iconoCategoria">
                          <center>
                              <i class="material-icons md-48">games</i>
                              Videojuegos
                          </center>
                      </div>
                  </a>
            </div>

            <div class="card">
                <a href="empresas.php?search=Moviles">
                    <img src="{{asset('dist/img/categorias/12.jpg')}}" class="card-img-top">
                      <div class="iconoCategoria">
                          <center>
                              <i class="material-icons md-48">smartphone</i>
                              Móviles
                          </center>
                      </div>
                  </a>
            </div>
        </div>
    </div>

    <div style="margin: 20px;">
        <div class="card-deck">
            <div class="card">
                <a href="empresas.php?search=Computacion">
                    <img src="{{asset('dist/img/categorias/13.jpg')}}" class="card-img-top">
                      <div class="iconoCategoria">
                          <center>
                              <i class="material-icons md-48">computer</i>
                              Computación
                          </center>
                      </div>
                  </a>
            </div>

            <div class="card">
                <a href="empresas.php?search=Hogar">
                    <img src="{{asset('dist/img/categorias/14.jpg')}}" class="card-img-top">
                      <div class="iconoCategoria">
                          <center>
                              <i class="material-icons md-48">home</i>
                              Hogar
                          </center>
                      </div>
                  </a>
            </div>

            <div class="card">
                <a href="empresas.php?search=Eletrodomesticos">
                    <img src="{{asset('dist/img/categorias/15.jpg')}}" class="card-img-top">
                      <div class="iconoCategoria">
                          <center>
                              <i class="material-icons md-48">save</i>
                              Electrodomésticos
                          </center>
                      </div>
                  </a>
            </div>

            <div class="card">
                <a href="empresas.php?search=Reloj y Accesorios">
                    <img src="{{asset('dist/img/categorias/16.jpg')}}" class="card-img-top">
                      <div class="iconoCategoria">
                          <center>
                              <i class="material-icons md-48">alarm</i>
                              Reloj y accesorios
                          </center>
                      </div>
                  </a>
            </div>
        </div>
    </div>

    <div style="margin: 20px;">
        <div class="card-deck">
            <div class="card">
                <a href="empresas.php?search=salud">
                    <img src="{{asset('dist/img/categorias/17.jpg')}}" class="card-img-top">
                      <div class="iconoCategoria">
                          <center>
                              <i class="material-icons md-48">healing</i>
                              Salud
                          </center>
                      </div>
                  </a>
            </div>

            <div class="card">
                <a href="empresas.php?search=Niños y juguetes">
                    <img src="{{asset('dist/img/categorias/18.jpg')}}" class="card-img-top">
                      <div class="iconoCategoria">
                          <center>
                              <i class="material-icons md-48">toys</i>
                              Niños y juguetes
                          </center>
                      </div>
                  </a>
            </div>

            <div class="card">
                <a href="empresas.php?search=Mascotas">
                    <img src="{{asset('dist/img/categorias/19.jpg')}}" class="card-img-top">
                      <div class="iconoCategoria">
                          <center>
                              <i class="material-icons md-48">pets</i>
                              Mascotas
                          </center>
                      </div>
                  </a>
            </div>

            <div class="card">
                <a href="empresas.php?search=Educacion">
                    <img src="{{asset('dist/img/categorias/20.jpg')}}" class="card-img-top">
                      <div class="iconoCategoria">
                          <center>
                              <i class="material-icons md-48">school</i>
                              Educación
                          </center>
                      </div>
                  </a>
            </div>
        </div>
    </div>

    <div style="margin: 20px;">
        <div class="card-deck">
            <div class="card">
                <a href="empresas.php?search=servicios profesionales">
                    <img src="{{asset('dist/img/categorias/21.jpg')}}" class="card-img-top">
                      <div class="iconoCategoria">
                          <center>
                              <i class="material-icons md-48">trending_up</i>
                              Servicios profesionales
                          </center>
                      </div>
                  </a>
            </div>

            <div class="card">
                <a href="empresas.php?search=Industria">
                    <img src="{{asset('dist/img/categorias/22.jpg')}}" class="card-img-top">
                      <div class="iconoCategoria">
                          <center>
                              <i class="material-icons md-48">business</i>
                              Industria
                          </center>
                      </div>
                  </a>
            </div>

            <div class="card">
                <a href="empresas.php?search=otros">
                    <img src="{{asset('dist/img/categorias/23.jpg')}}" class="card-img-top">
                      <div class="iconoCategoria">
                          <center>
                              <i class="material-icons md-48">tag_faces</i>
                              Otros
                          </center>
                      </div>
                  </a>
            </div>
        </div>
    </div>
@endsection
