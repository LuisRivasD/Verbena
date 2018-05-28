$(document).ready(function() {
  $('#txt-content').Editor();

  $('#btn-enviar').click(function(e){
    e.preventDefault();
    $('#txt-content').text($('#txt-content').Editor('getText'));
    $('#frm-test').submit();
  });
});
