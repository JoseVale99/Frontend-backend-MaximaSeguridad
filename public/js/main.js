$(document).ready(function() {
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "fa-eye-slash" );
            $('#show_hide_password i').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_password i').addClass( "fa-eye" );
        }
    });
});

const btn_delete =  document.querySelectorAll('.btn-delete');
if (btn_delete){
     const btnArray = Array.from(btn_delete);
     btnArray.forEach((btn) => {

         btn.addEventListener('click',(e)=>{
            if(!confirm('¿Esta seguro de borrar este registrro?')){
             e.preventDefault();   
            }
        });
      })
}
// show password

$(document).ready(function () {
    $('#mostrar_contrasena').click(function () {
      if ($('#mostrar_contrasena').is(':checked')) {
        $('#password').attr('type', 'text');
      } else {
        $('#password').attr('type', 'password');
      }
    });
  });

  $(document).ready(function () {
    $('#mostrar_contrasena').click(function () {
      if ($('#mostrar_contrasena').is(':checked')) {
        $('#password-confirm').attr('type', 'text');
      } else {
        $('#password-confirm').attr('type', 'password');
      }
    });
  });