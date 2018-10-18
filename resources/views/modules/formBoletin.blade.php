<style>
    .boletin:before{
        background-image: url({{$imagen}});
    }
    .boletin-demo:before{
        background-image: url(https://www.w3schools.com/bootstrap4/chicago.jpg);
    }
</style>
<div class="modal fade" id="modalBoletin" tabindex="-1" role="dialog" aria-labelledby="modalBoletinLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <a href="{{$enlace}}">
            <div class="boletin">
                <ul>
                    <li id="first-offer">
                        <h1><em>{{$titulo}}</em></h1>
                        <h2>{{$contenido}}<br>-</h2>
                    </li>
                </ul>
            </div>
            </a>
        </div>
    </div>
</div>
{{-- Plantillas DEMO --}}
<div class="modal fade" id="demoBoletinModal" tabindex="1" role="dialog" aria-labelledby="modalBoletinLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div id="demoBoletin" class="carousel slide" data-ride="carousel">
                <!-- The slideshow -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="boletin boletin-demo">
                            <ul>
                                <li id="first-offer">
                                    <h1>
                                        <em>
                                            <textarea class="h1 text-center" placeholder="Escribe el título de tu boletín!" style="background:transparent; border:transparent;width:100%;" name="titulo" id="titulo">Escribe el título de tu boletín aquí</textarea>
                                        </em>
                                    </h1>
                                    <h2><textarea class="text-center" placeholder="Escribe el contenido de tu boletín!" style="background:transparent; border:transparent;width:100%;height:400px;" name="titulo" id="titulo">Escribe el contenido de tu boletín aquí</textarea><br>-</h2>
                                </li>
                            </ul>
                        </div>
                        <div class="btn-group-vertical" style="width:100%;">
                            <button id="demoModal1" class="btn btn-info btn-lg btn-block">Ver Demo</button>
                            <a href="#" class="btn btn-success btn-lg btn-block">Lanzar Boletín</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://www.w3schools.com/bootstrap4/chicago.jpg" alt="Chicago">
                        <a href="#" class="btn btn-success btn-lg btn-block">Lanzar Boletín</a>
                    </div>
                    <div class="carousel-item">
                        <img src="https://www.w3schools.com/bootstrap4/chicago.jpg" alt="New York">
                        <a href="#" class="btn btn-success btn-lg btn-block">Lanzar Boletín</a>
                    </div>
                </div>
                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#demoBoletin" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demoBoletin" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div>
    </div>
</div>
