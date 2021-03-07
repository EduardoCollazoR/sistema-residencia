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
      { data: "acciones" },
      { data: "nombre" },
      { data: "tipo_proyecto" },
      { data: "nombre_empresa" },
      { data: "descripcion" },
      { data: "estado_proyecto" },
    ],
    responsive: true,
    bDestroy: true,
    iDisplayLength: 10,
    order: [[0, "desc"]],
  });

  var formProyecto = document.querySelector("#formProyecto");
  formProyecto.onsubmit = function (e) {
    e.preventDefault();
    var idproyecto=document.querySelector("#idproyecto").value;
    var nombre = document.querySelector("#nombre").value;
    var tipo = document.querySelector("#listTipo").value;
    var empresa = document.querySelector("#listEmpresa").value;
    var descripcion=document.querySelector("#descripcion").value;
    var estado = document.querySelector("#listEstado").value;

    if (
      nombre == "" ||
      tipo == "" ||
      empresa == "" ||
      descripcion == "" ||
      estado == "" 
    ) {
      swal("Atencion", "Todos los campos son necesarios", "error");
      return false;
    }

    var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
    var url = './models/proyectos/ajax-proyectos.php';
    var form = new FormData(formProyecto);
    request.open("POST", url, true);
    request.send(form);
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        var data = JSON.parse(request.responseText);
        if (data.status) {
            $("#modalProyecto").modal("hide");
            formProyecto.reset();
            swal('Proyecto', data.msg,'success');
            tableProyectos.ajax.reload();
        }else{
            swal('Atencion', data.msg,'error');
        }
      }
    }
  }
})

function openModalproyecto() {
    document.querySelector('#idproyecto').value="";
    document.querySelector('#tituloModal').innerHTML='Nuevo Proyecto';
    document.querySelector('#action').innerHTML='Guardar';
    document.querySelector('#formProyecto').reset();
  $("#modalProyecto").modal("show");
}

window.addEventListener('load',function(){
  showEmpresa();

},false)

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



function editProyecto(id){
    document.querySelector('#tituloModal').innerHTML='Editar Proyecto';
    document.querySelector('#action').innerHTML='Actualizar';
    var idproyecto=id;
    
    var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
    var url = './models/proyectos/edit-proyectos.php?idproyecto='+idproyecto;
    request.open("GET", url, true);
    request.send();
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        var data = JSON.parse(request.responseText);
        if (data.status) {
            document.querySelector('#idproyecto').value=data.data.proyecto_id;
            document.querySelector('#nombre').value=data.data.nombre;
            document.querySelector('#listTipo').value=data.data.tipo_proyecto;
            document.querySelector('#listEmpresa').value=data.data.empresa_id;
            document.querySelector('#descripcion').value=data.data.descripcion;
            document.querySelector('#listEstado').value=data.data.estado_proyecto;

            $("#modalProyecto").modal("show");
        }else{
            swal('Atencion', data.msg,'error');
        }
      }
    }
  }

  function deleteProyecto(id){

      var idproyecto=id;

      swal({
          title:"Eliminar Proyecto",
          text:"Esta seguro de eliminar el proyecto?",
          type:"warning",
          showCancelButton:true,
          confirmButtonText:"Si, eliminar",
          cancelButtonText:"No, cancelar",
          closeOnConfirm:false,
          closeOnCancel:true
      },function(confirm){
          if(confirm){
            var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
            var url = './models/proyectos/delete-proyectos.php';
            request.open('POST', url, true);
            var strData="idproyecto="+idproyecto;
            request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function () {
              if (request.readyState == 4 && request.status == 200) {
                var data = JSON.parse(request.responseText);
                if (data.status) {
                    swal('Eliminar', data.msg,'success');
                       tableProyectos.ajax.reload();
                }else{
                    swal('Atencion', data.msg,'error');
                }
              }
            }

          }
      })
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