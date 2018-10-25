<!-- Modal -->
<div class="modal fade" id="modalCarrito" role="dialog" aria-labelledby="modalCarrito" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content text-center">
            <div class="modal-header">
                <p class="h3">Carrito de Compras</p>
            </div>
            <button type="button" class="close top-right" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body">
                <div class="table-responsive">

                    <table id="tabla_carrito" class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col" hidden> </th>
                                <th scope="col"> </th>
                                <th scope="col">Producto</th>
                                <th scope="col">Precio</th>
                                <th scope="col" class="text-center">Cantidad</th>
                                <th scope="col">Sub-total</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot id="total_carrito">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <td class="text-right"></td>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-sm-6 col-md-6 text-right">
                    <button class="btn btn-lg btn-block btn-success text-uppercase">Completar Compra</button>
                </div>
            </div>
        </div>
    </div>
</div>
