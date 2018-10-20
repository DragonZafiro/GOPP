$(document).ready(function(){
  $('#search').on('keyup', function(){
    var search = $('#search').val()
    $.ajax({
      type: 'POST',
      url: 'phpClasses/search.php',
      data: {'search': search}
    })
    .done(function(resultado){
      $('#resultado').html(resultado)
    })
    .fail(function(){
      alert('Hubo un error :(')
    })
  })
})