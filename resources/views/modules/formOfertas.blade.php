<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content  ">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="PUT" data-toggle="validator">
                @csrf
                <input type="hidden" name="files" value="true" id="files">
                <input type="hidden" name="_method" value="PUT" id="_method">
                <input type="hidden" name="id" id="id">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="product_id">Producto</label>
                            <select id="product_id" class="form-control" name="product_id">
                                <option selected value="l">Elegir</option>
                                @php
                                    $business = App\Business::find(auth()->user()->loggedAsBusiness);
                                    $products = $business->getProducts();
                                @endphp
                                @foreach ($products as $product)
                                    <option value="{{$product->id}}">{{$product->nombre}}</option>
                                @endforeach
                            </select>
                            <span class="help-block product_id-error text-danger"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="precio">Precio</label>
                            <input type="text" class="form-control" name="precio" id="precio" placeholder="Precio de promoción">
                            <span class="help-block precio-error text-danger"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Descripción">
                        <span class="help-block descripcion-error text-danger"></span>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="compraMinima">Compra Mínima</label>
                            <input type="text" class="form-control" name="compraMinima" id="compraMinima" placeholder="Compra mínima para aplicar promoción">
                            <span class="help-block compraMinima-error text-danger"></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="encabezado">Título</label>
                            <input type="text" class="form-control" name="encabezado" id="encabezado" placeholder="¡ 2 x 1 !">
                            <span class="help-block encabezado-error text-danger"></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="plantilla">Plantilla</label>
                            <select id="plantilla" class="form-control" name="plantilla">
                                <option selected value="1">1</option>
                                <option value="2">2</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="fecha_fin">Fecha de finalización</label>
                            <input type="text" class="form-control" name="fecha_fin" id="fecha_fin" placeholder="Terminación de la oferta">
                            <span class="help-block fecha_fin-error text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button id="submitButton" class="btn btn-primary"></button>
                </div>
            </form>
        </div>
    </div>
</div>
