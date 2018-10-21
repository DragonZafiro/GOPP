// Token
$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
// Acción para abrir modal (formulario) [NUEVO]
function addForm() {
    save_method = 'add';
    $('#_method').val('POST');
    $('#myModal').modal('show');
    $('#myModal form')[0].reset();
    $('.help-block').html('');
    $('#submitButton').html('<span class="fas fa-sign-in-alt"></span> Registrarse');
}
// Acción para abrir modal (formulario) [EDITAR]
function editForm(id) {
    save_method = 'edit';
    $('#_method').val('PUT');
    $('#myModal form')[0].reset();
    $.ajax({
        url: "../user/" + id + "/edit",
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            $('#myModal').modal('show');
            $('.help-block').html('');
            $('#inputPassword').html('<span class="fas fa-key"></span> Contraseña Anterior');
            $('#confirmPassword').html('<span class="fas fa-key"></span> Contraseña Nueva');
            $('#submitButton').html('<span class="fas fa-edit"></span> Actualizar');
            $('#id').val(data.id);
            $('#nombre').val(data.name);
            $('#last_name').val(data.last_name);
            $('#nick').val(data.nick);
            $('#email').val(data.email);
            $('#fecha_nac').val(data.fecha_nac);
            $('#direccion_calle').val(data.direccion_calle);
            $('#direccion_num').val(data.direccion_num);
            $('#direccion_estado').val(data.direccion_estado);
            $('#direccion_cp').val(data.direccion_cp);
        },
        error: function () {
            alert("error!");
        }
    });
}
// Enviar datos JSON
$('#submitButton').click(function () {
    var id = $('#id').val();
    if (save_method == 'add') url = "registro";
    else url = "../user/" + id + "/edit";
    $.ajax({
        url: url,
        type: "POST",
        data: new FormData($('#myModal form')[0]),
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function (data) {
            if(save_method == 'add')
            swal(
                '¡Hecho!',
                'Te has registrado correctamente, por favor ingresa para continuar.',
                'success'
            );
            else
            {
                swal(
                    '¡Hecho!',
                    'Actualizaste tus datos correctamente.',
                    'success'
                );
                setTimeout(function () {
                    location.reload();
                }, 2000);
            }
            $('#myModal').modal('hide');
        },
        error: function (data) {
            var errors = data.responseJSON;
            $('.help-block').html('');
            $.each(errors.errors, function (key, value) {
                $('.' + key + '-error').html(value[0]);
            });
        }
    });
    return false;
});
