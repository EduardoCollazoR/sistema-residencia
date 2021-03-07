$("#tableProyectos").DataTable();

var tableProyectos;
document.addEventListener("DOMContentLoaded", function () {
  tableProyectos = $("#tableProyectos").DataTable({
    aProcessing: true,
    aServerSide: true,
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
    },
    ajax: {
      url: "./models/proyectos/table_proyectos.php",
      dataSrc: "",
    },
    columns: [
      { data: "nombre" },
      { data: "tipo_proyecto" },
      { data: "descripcion" },
      { data: "estado_proyecto" },
      { data: "nombre_empresa" },
      { data: "informacion" },
    ],
    responsive: true,
    bDestroy: true,
    iDisplayLength: 10,
    order: [[0, "desc"]],
  });
})

function showEmpresa(){
  var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
  var url = './models/options/options-empresas.php';
  request.open('GET', url, true);
  request.send();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var data = JSON.parse(request.responseText);
     data.forEach(function(valor){
       data +='<option value="'+valor.empresa_id+'">'+valor.nombre_empresa+'</option>';

     });
     document.querySelector('#listEmpresa').innerHTML=data;
    }
  }

}


function infoEmpresa(id) {
  var empresa_id=id;
    
    var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
    var url = './models/proyectos/get-empresas.php?empresa_id='+empresa_id;
    request.open("GET", url, true);
    request.send();
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        var data = JSON.parse(request.responseText);
        if (data.status) {
            document.querySelector('#NombreEmpresa').innerHTML=data.data.nombre_empresa;
            document.querySelector('#responsable').innerHTML=data.data.responsable;
            document.querySelector('#correo').innerHTML=data.data.correo;
            document.querySelector('#telefono').innerHTML=data.data.telefono;
            document.querySelector('#rfc').innerHTML=data.data.rfc;
            document.querySelector('#dir').innerHTML=data.data.direccion;

            $("#ModalEmpresa").modal("show");
        }else{
            swal('Atencion', data.msg,'error');
        }
      }

}


}