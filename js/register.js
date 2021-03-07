$(document).ready(function () {
    $("#registerAlumno").on("click", function () {
      registerAlumno();
    });
});
function registerAlumno() {
    var nombre = $("#nombre").val();
    var apellidoPaterno = $("#apellidoPaterno").val();
    var apellidoMaterno = $("#apellidoMaterno").val();
    var correo = $("#correo").val();
    var ncontrol = $("#ncontrol").val();
    var semestre = $("#semestre").val();
    var telefono = $("#telefono").val();
    var clave = $("#clave").val();
    var estado = $("#estado").val();
    
  
    $.ajax({
      url: "./includes/registerAlumno.php",
      method: "POST",
      data: {
        nombre: nombre,
        apellidoPaterno: apellidoPaterno,
        apellidoMaterno:apellidoMaterno,
        correo:correo,
        ncontrol:ncontrol,
        semestre:semestre,
        telefono:telefono,
        clave:clave,
        estado:estado

      },
      success: function (data) {
        $("#messageAlumno").html(data);
  
        if (data.indexOf("Registro con exito, ahora espera la autorizacion del administrador para poder ingresar al sistema") >= 0) {
          $('#nombre').val("");
            $('#apellidoPaterno').val("");
            $('#apellidoMaterno').val("");
            $('#correo').val("");
            $('#ncontrol').val("");
            $('#semestre').val("");
            $('#telefono').val("");
            $('#clave').val("");
            $('#estado').val("");
        }
        
      }
    });
  }