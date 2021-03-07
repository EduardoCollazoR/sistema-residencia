$(document).ready(function () {
  $("#loginAdmin").on("click", function () {
    loginAdmin();
  });
  $("#loginProfesor").on("click", function () {
    loginProfesor();
  });
  $("#loginAlumno").on("click", function () {
    loginAlumno();
  });
});

function loginAdmin() {
  var login = $("#correo").val();
  var contra = $("#contra").val();

  $.ajax({
    url: "./includes/loginAdmin.php",
    method: "POST",
    data: {
      login: login,
      contra: contra,
    },
    success: function (data) {
      $("#messageAdmin").html(data);

      if (data.indexOf("Accediendo") >= 0) {
        window.location = "administrador/";
      }
    },
  });
}

function loginProfesor() {
  var loginProfesor = $("#correoProfesor").val();
  var contraProfesor = $("#contraProfesor").val();

  $.ajax({
    url: "./includes/loginProfesor.php",
    method: "POST",
    data: {
        loginProfesor: loginProfesor,
        contraProfesor: contraProfesor,
    },
    success: function (data) {
      $("#messageProfesor").html(data);

      if (data.indexOf("Accediendo") >= 0) {
        window.location = "profesor/";
      }
    },
  });
}

function loginAlumno() {
  var loginAlumno = $("#correoAlumno").val();
  var contraAlumno = $("#contraAlumno").val();

  $.ajax({
    url: "./includes/loginAlumno.php",
    method: "POST",
    data: {
      loginAlumno: loginAlumno,
      contraAlumno: contraAlumno,
    },
    success: function (data) {
      $("#messageAlumno").html(data);

      if (data.indexOf("Accediendo") >= 0) {
        window.location = "alumno/";
      }
    },
  });
}
