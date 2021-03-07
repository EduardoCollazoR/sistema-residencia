$(document).ready(function () {
  $("#action").on("click", function () {
    formato();
  });
});
function formato() {
  var nombre = $("#nombre").val();
  var user_file=$("#user_file").val();
  

  $.ajax({
    url: "formatos_residencia.php",
    method: "POST",
    data: {
      nombre: nombre,
      user_file:user_file

    },
    success: function (data) {
      $("#message").html(data);

      
    }
  });
}









$("#tableFormatos").DataTable();


var tableFormatos;
document.addEventListener("DOMContentLoaded", function () {
  tableFormatos = $("#tableFormatos").DataTable({
    aProcessing: true,
    aServerSide: true,
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
    },
    ajax: {
      url: "./models/formatos/table-formatos.php",
      dataSrc: "",
    },
    columns: [
      { data: "acciones" },
      { data: "nombre_archivo" },
      { data: "archivo" },
    ],
    responsive: true,
    bDestroy: true,
    iDisplayLength: 10,
    order: [[0, "desc"]],
  });
});
function deleteFormato(id){

    var idArchivo=id;

    swal({
        title:"Eliminar Formato",
        text:"Esta seguro de eliminar el Formato?",
        type:"warning",
        showCancelButton:true,
        confirmButtonText:"Si, eliminar",
        cancelButtonText:"No, cancelar",
        closeOnConfirm:false,
        closeOnCancel:true
    },function(confirm){
        if(confirm){
          var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
          var url = './models/formatos/delete-formatos.php';
          request.open('POST', url, true);
          var strData="idArchivo="+idArchivo;
          request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
          request.send(strData);
          request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
              var data = JSON.parse(request.responseText);
              if (data.status) {
                  swal('Eliminar', data.msg,'success');
                     tableFormatos.ajax.reload();
              }else{
                  swal('Atencion', data.msg,'error');
              }
            }
          }

        }
    })
}