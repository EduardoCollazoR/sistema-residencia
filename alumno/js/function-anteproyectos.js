$("#tableAnteproyectos").DataTable();

var tableAnteproyectos;
document.addEventListener("DOMContentLoaded", function () {
    tableAnteproyectos = $("#tableAnteproyectos").DataTable({
    aProcessing: true,
    aServerSide: true,
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
    },
    ajax: {
      url: "./models/anteproyectos/table_anteproyectos.php",
      dataSrc: "",
    },
    columns: [
      {data:"acciones"},
      { data: "archivo" },
      { data: "comentarios" },
      {data: "fecha"},
    ],
    responsive: true,
    bDestroy: true,
    iDisplayLength: 5,
    order: [[0, "desc"]],
  });

  var formAnteproyecto = document.querySelector("#formAnteproyecto");
  formAnteproyecto.onsubmit = function (e) {
    e.preventDefault();
    var idanteproyecto=document.querySelector("#idanteproyecto").value;
    var nombre = document.querySelector("#nombre").value;
    var ncontrol = document.querySelector("#ncontrol").value;
    var fecha = document.querySelector("#fecha").value;
    var periodo = document.querySelector("#listPeriodo").value;
    var tipopro = document.querySelector("#listTipo").value;
    var estado = document.querySelector("#listEstado").value;

    if (
      nombre == "" 
    ) {
      swal("Atencion", "Todos los campos son necesarios", "error");
      return false;
    }

    var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
    var url = './models/anteproyectos/ajax-anteproyectos.php';
    var form = new FormData(formAnteproyecto);
    request.open("POST", url, true);
    request.send(form);
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        var data = JSON.parse(request.responseText);
        if (data.status) {
            $("#modalAnteproyecto").modal("hide");
            formAnteproyecto.reset();
            swal('Anteproyecto', data.msg,'success');
            tableAnteproyectos.ajax.reload();
            location.reload();
        }else{
            swal('Atencion', data.msg,'error');
        }
      }
    }
  }
})

window.addEventListener('load',function(){
    showPeriodo();
  
  },false)


function openModalanteproyecto() {
    document.querySelector('#idanteproyecto').value="";
    document.querySelector('#tituloModal').innerHTML='Alta de anteproyecto';
    document.querySelector('#action').innerHTML='Guardar';
    document.querySelector('#formAnteproyecto').reset();
  $("#modalAnteproyecto").modal("show");
  }





  
function showPeriodo(){
  var request = (XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
  var url = './models/options/options-periodos.php';
  request.open('GET', url, true);
  request.send();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var data = JSON.parse(request.responseText);
     data.forEach(function(valor){
       data +='<option value="'+valor.periodo_id+'">'+valor.nombre_periodo+'</option>';

     });
     document.querySelector('#listPeriodo').innerHTML=data;
    }
  }

}


function delete_AnteproyectoDoc(id){

  var idDocumento=id;

  swal({
      title:"Eliminar Documento",
      text:"Esta seguro de eliminar el documento?",
      type:"warning",
      showCancelButton:true,
      confirmButtonText:"Si, eliminar",
      cancelButtonText:"No, cancelar",
      closeOnConfirm:false,
      closeOnCancel:true
  },function(confirm){
      if(confirm){
        var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
        var url = './models/anteproyectos/delete-doc-anteproyectos.php';
        request.open('POST', url, true);
        var strData="idDocumento="+idDocumento;
        request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        request.send(strData);
        request.onreadystatechange = function () {
          if (request.readyState == 4 && request.status == 200) {
            var data = JSON.parse(request.responseText);
            if (data.status) {
                swal('Eliminar', data.msg,'success');
                    tableAnteproyectos.ajax.reload();
            }else{
                swal('Atencion', data.msg,'error');
            }
          }
        }

      }
  })
}