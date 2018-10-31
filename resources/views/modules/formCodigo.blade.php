<div class="modal fade" id="modalCodigo" tabindex="-1" role="dialog" aria-labelledby="modalCodigo" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-black">
            <div class="modal-header">
                <p class="h3">Código Generado</p>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img id="img_codigo_afiliador" class="img-fluid" style="width:100%;" src="{{asset('dist/img/business/QRCode/test.png')}}">
                <h4 class="text-center">Tu código de afiliador es: <span id="codigo_afiliador" class="text-green text-center"></span></h4>
            </div>
            <div class="modal-footer">
                <div class="col">
                <button data-toggle="popover" data-content="¡Copiado!" data-placement="top" id="btn-codigo" data-clipboard-target="#codigo_afiliador" class="btn btn-dark btn-goppBtn btn-block">Copiar</button>
                </div>
                <div class="col">
                <button type="button" class="btn btn-dark btn-goppBtn btn-block">Compartir</button>
                </div>
            </div>
        </div>
    </div>
</div>
