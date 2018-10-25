// Token
$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
// Obtiene datos de todos los productos
var tableProduct = $('#tabla_carrito').DataTable({
    searching:false,
    processing: true,
    serverSide: true,
    paginate: false,
    orderable:false,
    info: false,
    "language": {
        "zeroRecords": "<h5>Tu carrito está vacío</h5>",
        "infoEmpty": "",
        "processing": "Espere...",
        "infoFiltered": "(Filtrado de _MAX_ regitros)"
    },
    ajax: route('carrito.todos').url(),
    columns: [
        {data:'foto',name:'foto',
            "render": function (data, type, full, meta) {
                return "<img class ='squareSizeS squareElementContainer'src=\"" + data + "\" height=\"50\"/>";
        }},
        { data: 'name', name: 'name'},
        { data: 'price', name: 'price', render: $.fn.dataTable.render.number( ',', '.', 2, '$' )
        },
        { data: 'quantity', name: 'quantity'},
        { data: 'subtotal', name: 'subtotal', render: $.fn.dataTable.render.number( ',', '.', 2, '$' )
        },
        { data: 'action', name: 'action', orderable: false, searchable: false }
    ],
    "footerCallback": function (row, data, start, end, display) {
        var api = this.api(),
            data;

        // Remove the formatting to get integer data for summation
        var intVal = function (i) {
            return typeof i === 'string' ?
                i.replace(/[\$,]/g, '') * 1 :
                typeof i === 'number' ?
                i : 0;
        };

        // Total over all pages
        total = api
            .column(4)
            .data()
            .reduce(function (a, b) {
                return intVal(a) + intVal(b);
            }, 0);

        // Total over this page
        pageTotal = api
            .column(4, {
                page: 'current'
            })
            .data()
            .reduce(function (a, b) {
                return intVal(a) + intVal(b);
            }, 0);

        // Update footer
        $(api.column(4).footer()).html(
            '<strong>$' + total+'</strong>'
        );
    }
});
$('#tabla_carrito').on('click', 'tbody td:not(:first-child)', function (e) {
    tableProduct.inline(this, {
        buttons: {
            label: '&gt;',
            fn: function () {
                this.submit();
            }
        }
    });
});
// Acción para abrir modal (formulario) [NUEVO]
function agregarCarrito(id) {
    $.ajax({
        url: route('carrito.agregar', id).url(),
        type: "GET",
        contentType: false,
        processData: false,
        success: function (data) {
            swal(
                '¡Hecho!',
                'Se ha agregado el producto',
                'success'
            );
            tableProduct.ajax.reload();
        },
        error: function () {
           alert('lel');
        }
    });
    return false;
}

function borrarItem(id){
   $.ajax({
       url: route('carrito.borrar', id).url(),
       type: "GET",
       contentType: false,
       processData: false,
       success: function () {
           tableProduct.ajax.reload();
       },
       error: function () {
           alert('lel');
       }
   });
   return false;
}

function incrementarItem(id) {
    $.ajax({
        url: route('carrito.incrementar', id).url(),
        type: "GET",
        contentType: false,
        processData: false,
        success: function () {
            tableProduct.ajax.reload();
        },
        error: function () {
            alert('Error...');
        }
    });
    return false;
}
function decrementarItem(id) {
    $.ajax({
        url: route('carrito.decrementar', id).url(),
        type: "GET",
        contentType: false,
        processData: false,
        success: function () {
            tableProduct.ajax.reload();
        },
        error: function () {
            alert('Error...');
        }
    });
    return false;
}
