$(document).ready(function () {
  $("#newPass").keyup(function () {
    validPass();
  });
  $("#passConfirm").keyup(function () {
    validPass();
  });

  $("#frmChangePass").submit(function (e) {
    e.preventDefault();
    var passNuevo = $("#newPass").val();
    var passConfirm = $("#passConfirm").val();
    var action = "changePassword";

    if (passNuevo != passConfirm) {
      $(".messagePass").html(
        '<div class="alert alert-dismissible alert-danger">Las contraseñas no son iguales</div>'
      );
      $(".messagePass").slideDown();
      return false;
    }

    if (passNuevo.length < 8) {
      $(".messagePass").html(
        '<div class="alert alert-dismissible alert-danger">La contraseña debe ser mayor a 8 caracteres.</div>'
      );
      $(".messagePass").slideDown();
      return false;
    }
    $.ajax({
      url: "./includes/changePass.php",
      type: "POST",
      async: true,
      data: { action: action, passNuevo: passNuevo },
      success: function(response)
      {
         if(response!='error'){
             var info=JSON.parse(response);

             if(info.cod=='00'){
                $(".messagePass").html('<div class="alert alert-dismissible alert-success">'+info.msg+'</div>');
                 $('#frmChangePass')[0].reset();
             }else{
                $(".messagePass").html('<div class="alert alert-dismissible alert-danger">'+info.msg+'</div>');

             }
             $(".messagePass").slideDown();


         }
      },
      error:function(error){

      }
    });
  });
});

function validPass() {
  var passNuevo = $("#newPass").val();
  var passConfirm = $("#passConfirm").val();

  if (passNuevo != passConfirm) {
    $(".messagePass").html(
      '<div class="alert alert-dismissible alert-danger">Las contraseñas no son iguales</div>'
    );
    $(".messagePass").slideDown();
    return false;
  }

  if (passNuevo.length < 8) {
    $(".messagePass").html(
      '<div class="alert alert-dismissible alert-danger">La contraseña debe ser mayor a 8 caracteres.</div>'
    );
    $(".messagePass").slideDown();
    return false;
  }

  $(".messagePass").html("");
  $(".messagePass").slideUp();
}
