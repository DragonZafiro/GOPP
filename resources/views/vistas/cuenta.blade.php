<!-- Plantilla -->
@extends('general')
<!-- Titulo -->
@section('titulo', 'Mi Cuenta')
<!-- Fondo Negro -->
@section('bg-color','bg-black')
@section('styles')
{{-- Animación Boletín --}}
    <link href="{{asset('dist/css/boletin.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.16.1/TweenMax.min.js"></script>
    <link rel="stylesheet" href="{{asset('dist/css/sweetalert2.min.css')}}">
@endsection
<!-- Contenido -->
@section('contenido')
{{-- Boletines --}}
@if($user->loggedAs == 'empresa')
    @component('modules.formBoletin')
        @slot('titulo',$boletin->titulo)
        @slot('contenido',$boletin->contenido)
        @slot('enlace',$boletin->enlace)
        @slot('imagen',$boletin->getBoletinImg())
    @endcomponent
@endif
@endsection
@section('contenido-padding')
    @include('modules.formRegistro')
    @include('modules.formEmpresa')
    <!-- Columnas de información -->
    @component('modules.info-cuenta')
        <!-- Cuenta de usuario general -->
        @slot('section1')
            <div  class="roundElementContainer squareSizeL"><img src="{{$user->getUserImage()}}" alt=""></div>
            <h1 class="display-4 text-{{$user->loggedAs}}">Usuario</h1>
            <div class=" col-sm-12 lead text-white">Nombre: {{$user->name}}</div>
            <div class=" col-sm-12 lead text-white">Apodo: {{$user->nick}}</div>
            <div class=" col-sm-12 lead text-white">Correo electronico: {{$user->email}}</div>
            <div class=" col-sm-12 lead text-white">Eres:
                @if($user->usuario || $user->admin)
                <span class='text-usuario txtWhiteShadow'>Usuario normal</span>
                @endif
                @if($user->empresa || $user->admin)
                <span class='text-empresa txtWhiteShadow'>Empresa </span>
                @endif
                @if($user->afiliador || $user->admin)
                <span class='text-afiliador txtWhiteShadow'>Afiliador </span>
                @endif
                @if($user->repartidor || $user->admin)
                <span class='text-repartidor txtWhiteShadow'>Repartidor </span>
                @endif
                <div class="col-md-6 offset-md-3">
                    <br>
                    <button class="btn btn-goppBtn btn-lg btn-danger" onclick="editForm({{$user->id}})">Editar Cuenta</button>
                </div>
            </div>
        @endslot
        @slot('section2')
            <!-- Usuario -->
            @if($user->loggedAs == 'usuario')
                <h1 class="display-4 text-usuario">Genera Ingresos</h1>
                <p class="lead txtWhite">Con GOPP puedes ganar dinero fácilmente, ¿Qué esperas?</p>
                <div class="col-md-6 offset-md-3">
                    <button class="btn btn-goppBtn btn-lg btn-usuario" data-toggle="modal" data-target="#convierteteEnMas">Ver más</button>
                </div>
            <!-- Empresa -->
            @elseif($user->loggedAs == 'empresa')
                <div  class="roundElementContainer squareSizeL"><img src="{{$business->getBusinessImg()}}" alt=""></div>
                <h1 class="display-4 text-empresa">Información de tu Empresa</h1>
                <span class="lead text-white">Nombre: {{$business->nombre}}</span><br>
                <span class="lead text-white">Categoría: {{$category->nombre}}</span><br>
                <span class="lead text-white">Dirección: {{$business->direccion}}</span><br>
                <span class="lead text-white">Descripción: {{$business->descripcion}}</span><br>
                <span class="lead text-white">Teléfono: {{$business->telefono}}</span><br>
                <span class="lead text-white">E-mail: {{$business->email}}</span><br>
                <span class="lead text-white">Página web: {{$business->web}}</span><br><br>
                <p class="lead text-white"><button class="btn btn-danger btn-goppBtn" onclick="editEmpresa({{$business->id}})">Editar datos</button></p>
                <div class="row p-3">
                    <p class="text-white lead">Puedes hacer crecer tu equipo generando un código de afiliador:</p>
                </div>
                <a href="#" class="btn btn-goppBtn btn-empresa btn-lg">Generar código</a>
            <!-- Afiliador -->
            @elseif($user->loggedAs == 'afiliador')
                <h1 class="display-4 text-{{$user->loggedAs}}">Tu Equipo</h1>
                <p class="lead text-white">Como afiliador, tú generas ganancia por cada empresa y repartidor que esté dentro de tu equipo.</p>
                <p class="lead text-white">Actualmente estás generando <span class="badge badge-afiliador">$n</span> diarios.</p>
                <div class="accordion" id="accordionAfiliado">
                    <div class="card my-2 noBg">
                        <div class="card-header my-0 py-0" id="headingOne">
                            <button class="btn btn-link btn-lg text-white my-0 py-0" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                6 Empresas <span class='fas fa-chevron-circle-down text-afiliador' ></span>
                            </button>
                        </div>
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionAfiliado">
                            <div class="card-body text-white">
                                <a href="#" class="row my-2">
                                    <div class="col-xs-1">
                                        <div class="squareElementContainer squareSizeXS">
                                            <img src="{{asset('dist/img/user/profile/default.jpg')}}">
                                        </div>
                                    </div>
                                    <div class="col-xs-1 mx-2 text-white">
                                        Walmart
                                    </div>
                                </a>
                                <a href='#' class='btn btn-goppBtn btn-afiliador btn-sm txtWhite'>Mostrar más...</a>
                            </div>
                        </div>
                    </div>
                    <div class="card my-2 noBg">
                        <div class="card-header my-0 py-0" id="headingTwo">
                            <button class="btn btn-link btn-lg text-white my-0 py-0" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseOne">
                                3 Repartidores <span class='fas fa-chevron-circle-down text-afiliador' ></span>
                            </button>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionAfiliado">
                            <div class="card-body text-white">
                                <a href="#" class="row my-2">
                                    <div class="col-xs-1">
                                        <div class="squareElementContainer squareSizeXS">
                                            <img src="{{asset('dist/img/user/profile/default.jpg')}}">
                                        </div>
                                    </div>
                                    <div class="col-xs-1 mx-2 text-white">
                                        Nick xd
                                    </div>
                                </a>
                                <a href='#' class='btn btn-goppBtn btn-afiliador btn-sm txtWhite'>Mostrar más...</a>
                            </div>
                        </div>
                    </div>
                    <div class="row p-3">
                        <p class="text-white lead">Puedes hacer crecer tu equipo generando un código de afiliador</p></div>
                    <div class="row">
                        <div class="col-md-2 offset-md-3">
                            <a href="#" class="btn btn-goppBtn btn-afiliador btn-lg">Generar código</a>
                        </div>
                    </div>
                </div>
            @elseif($user->loggedAs == 'repartidor')
                <h1 class="display-4 txtRepartidor">Datos de Repartidor</h1>
                <h2 class="text-white">Zona</h2>
                <div class="accordion" id="accordionRepartidor">
                    <div class="card my-2 noBg">
                        <div class="card-header my-0 py-0" id="headingRepart1">
                            <a class="btn btn-link btn-lg text-white my-0 py-0" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                Zona: ORIENTE <span class='fas fa-chevron-circle-down text-repartidor' ></span>
                            </a>
                        </div>
                        <div id="collapseOne" class="collapse" aria-labelledby="headingRepart1" data-parent="#accordionRepartidor">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d7083.854992071949!2d-99.0!3d19.0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2smx!4v1534465994562" height="300" width="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                    <a href="#" class="btn btn-goppBtn btn-repartidor btn-sm">Actualiza tu zona</a>
                </div>
                <div class="row p-3">
                    <p class="text-white lead">Puedes hacer crecer tu equipo generando un código de afiliador</p></div>
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <a href="#" class="btn btn-goppBtn btn-repartidor btn-lg">Generar código</a>
                    </div>
                </div>
            @endif
        @endslot
    @endcomponent
<!------------------------------------------------->
    <!-- EMPRESA -->
    @if($user->loggedAs == 'empresa')
        @component('modules.info-cuenta')
            @slot('section1')
                <h1 class="display-4 text-empresa">Mis Productos y Servicios</h1>
                <p class="lead text-white">En esta sección tendrás un listado de todos los productos y/o servicios con los que cuenta tu empresa.</p>
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <a href="{{url('productos')}}" class="btn btn-goppBtn btn-empresa btn-lg">Continuar</a>
                    </div>
                </div>
            @endslot
            @slot('section2')
                <h1 class="display-4 text-empresa">Mis Registros</h1>
                <p class="lead text-white">En esta sección encontrarás registros de ventas, comentarios, visitas y reputación.</p>
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <a href="#" class="btn btn-goppBtn btn-empresa btn-lg">Continuar</a>
                    </div>
                </div>
            @endslot
        @endcomponent
        @component('modules.info-cuenta')
            @slot('section1')
                <h1 class="display-4 text-empresa">Método de Pago</h1>
                <p class="lead text-white">¿Qué métodos de pago ofrece GOPP?</p>
                <div class="row">
                    <div class="col-md-3 offset-md-1">
                        <a href="#" class="btn btn-goppBtn btn-empresa btn-lg">Métodos de pago</a>
                    </div>
                </div>
            @endslot
            @slot('section2')
                <h1 class="display-4 text-empresa">Publicaciones</h1>
                <p class="lead text-white">Lanza un boletín o cupón de descuento para que los demás lo vean. GOPP tiene plantillas para darle estilo a tus publicaciones. ¡Chécalas!:</p>
                <div class="row">
                    <div class="col-sm">
                        <button class="btn btn-goppBtn btn-empresa btn-lg" data-toggle="modal" data-target="#demoBoletinModal">Ver Plantillas</button>
                    </div>
                    <div class="col-sm">
                        <a href="{{url('boletines')}}" class="btn btn-goppBtn btn-empresa btn-lg">Mis Boletines</a>
                    </div>
                    <div class="col-sm">
                        <a href="{{url('ofertas')}}" class="btn btn-goppBtn btn-empresa btn-lg">Mis Ofertas</a>
                    </div>
                </div>
            @endslot
        @endcomponent
<!------------------------------------------------->
    <!-- REPARTIDOR -->
    @elseif($user->loggedAs == 'repartidor')
        @component('modules.info-cuenta')
            @slot('section1')
                <h1 class="display-4 text-repartidor">Vehículo</h1>
                <span class="lead text-white">Tipo: </span><br>
                <span class="lead text-white">Marca: </span><br>
                <span class="lead text-white">Módelo: </span><br>
                <span class="lead text-white">Color: </span><br><br>
                <p class="lead text-white"><button class="btn btn-repartidor btn-goppBtn" data-toggle="modal" data-target="#">Actualiza tu vehículo</button></p>
            @endslot
            @slot('section2')
                <h1 class="display-4 text-repartidor">Entregas</h1>
                <p class="lead text-white">Guardamos un historial de tus entregas, ¡Echa un vistazo!</p>
                <div class="accordion" id="accordionRepartidorHistorial">
                    <div class="card my-2 noBg">
                        <div class="card-header my-0 py-0" id="headingRepartidorHistorial">
                            <button class="btn btn-link btn-lg text-white my-0 py-0" data-toggle="collapse" data-target="#collapsePendientes" aria-expanded="false" aria-controls="collapsePendientes">
                                Entregas Pendientes <span class='fas fa-chevron-circle-down text-repartidor' ></span>
                            </button>
                            <button class="btn btn-link btn-lg text-white my-0 py-0" data-toggle="collapse" data-target="#collapseConcluidas" aria-expanded="false" aria-controls="collapseConcluidas">
                                Entregas Concluidas <span class='fas fa-chevron-circle-down text-repartidor' ></span>
                            </button>
                        </div>
                        <div id="collapsePendientes" class="collapse" aria-labelledby="headingRepartidorHistorial" data-parent="#accordionRepartidorHistorial">
                            <div class="card-body text-white">
                                <a href="#" class="row my-2">
                                    <p class="text-white">Entregas Pendientes</p>
                                </a>
                                <a href="#" class="row my-2">
                                    <p class="text-white">Entrega Pendiente 2</p>
                                </a>
                                <a href='#' class='btn btn-goppBtn btn-repartidor btn-sm txtWhite'>Mostrar más...</a>
                            </div>
                        </div>
                        <div id="collapseConcluidas" class="collapse" aria-labelledby="headingRepartidorHistorial" data-parent="#accordionRepartidorHistorial">
                            <div class="card-body text-white">
                                <a href="#" class="row my-2">
                                    <p class="text-white">Entregas Concluidas</p>
                                </a>
                                <a href='#' class='btn btn-goppBtn btn-repartidor btn-sm txtWhite'>Mostrar más...</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endslot
        @endcomponent
    @endif
<!------------------------------------------------->
    <!-- Crece con nosotros - Conviertete en más -->
    @component('modules.info-cuenta')
        <!-- Cuenta de usuario general -->
        @slot('section1')
            <h1 class="display-4 text-truncate text-{{$user->loggedAs}}">Conviértete en Más</h1>
            <p class="lead text-white">En GOPP puedes ser más que un usuario, checa esto:</p>
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <a href="#" class="btn btn-goppBtn btn-{{$user->loggedAs}} btn-lg">Continuar</a>
                </div>
            </div>
        @endslot
        @slot('section2')
            <h1 class="display-4 text-{{$user->loggedAs}}">Crece con Nosotros</h1>
            <p class="lead text-white">Mira estos estupendos post (vídeos, fotos, frases, etc) para que puedas crecer como emprendedor con nosotros:</p>
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <a href="#" class="btn btn-goppBtn btn-{{$user->loggedAs}} btn-lg">Continuar</a>
                </div>
            </div>
        @endslot
    @endcomponent
@endsection
@section('scripts')
    <script src="{{asset('dist/js/sweetalert2.min.js')}}"></script>
    <script src="{{asset("dist/js/users.js ")}}"></script>
    <script src="{{asset("dist/js/empresa.js ")}}"></script>
    <script>
    $("#demoModal1").on( "click", function() {
            $('#demoBoletinModal').modal('hide');
            $('#demoBoletinModal').on('hidden.bs.modal', function (e) {
                $("#modalBoletin").modal('show');
            })
    });
    </script>
@endsection
