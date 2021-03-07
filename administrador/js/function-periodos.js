$("#tablePeriodos").DataTable();

var tablePeriodos;
document.addEventListener("DOMContentLoaded", function () {
  tablePeriodos = $("#tablePeriodos").DataTable({
    dom:'Bfrtip',
    buttons: [
      {
        extend:'excel',
        title: 'Lista de periodos',
        text: '<i class="fas fa-file-excel"></i>',
        titleAttr: 'Exportar a Excel',
        className: 'btni btn-success ',
        sheetName: 'Lista de periodos',
        exportOptions: {
          columns: [1,2]
      }

      },
      {
        extend:'pdf',
        title: 'Lista de periodos',
        download: 'open',
        text: '<i class="fas fa-file-pdf"></i>',
        titleAttr: 'Exportar a PDF',
        className: 'btni btn-danger',
        exportOptions: {
          columns: [1,2]
      }

      },
      {
        extend:'print',
        title: 'Lista de periodos',
        text: '<i class="fas fa-print"></i>',
        titleAttr: 'Imprimir Tabla',
        className: 'btni btn-info',

        exportOptions: {
          columns: [1,2]
      },
      customize: function ( win ) {
        $(win.document.body)
            .css( 'font-size', '10pt' );

        $(win.document.body).find( 'table' )
            .addClass( 'compact' )
            .css( 'font-size', 'inherit' );
    }

    },
       
  ],
    aProcessing: true,
    aServerSide: true,
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
    },
    ajax: {
      url: "./models/periodos/table_periodos.php",
      dataSrc: "",
    },
    columns: [
      { data: "acciones" },
      { data: "nombre_periodo" },
      { data: "estado" },
    ],
    responsive: true,
    bDestroy: true,
    iDisplayLength: 10,
    order: [[0, "desc"]],
  });

  var formPeriodo = document.querySelector("#formPeriodo");
  formPeriodo.onsubmit = function (e) {
    e.preventDefault();
    var idperiodo=document.querySelector("#idperiodo").value;
    var nombre = document.querySelector("#nombre").value;
    var estado = document.querySelector("#listEstado").value;

    if (nombre == "") {
      swal("Atencion", "Todos los campos son necesarios", "error");
      return false;
    }

    var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
    var url = './models/periodos/ajax-periodo.php';
    var form = new FormData(formPeriodo);
    request.open("POST", url, true);
    request.send(form);
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        var data = JSON.parse(request.responseText);
        if (data.status) {
            $("#modalPeriodo").modal("hide");
            formPeriodo.reset();
            swal('Periodo', data.msg,'success');
            tablePeriodos.ajax.reload();
        }else{
            swal('Atencion', data.msg,'error');
        }
      }
    }
  }
})

function openModalPeriodo() {
  document.querySelector('#idperiodo').value="";
  document.querySelector('#tituloModal').innerHTML='Nuevo Periodo';
  document.querySelector('#action').innerHTML='Guardar';
  document.querySelector('#formPeriodo').reset();
$("#modalPeriodo").modal("show");
}

function editPeriodo(id){
    document.querySelector('#tituloModal').innerHTML='Editar Periodo';
    document.querySelector('#action').innerHTML='Actualizar';
    var idperiodo=id;
    
    var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
    var url = './models/periodos/edit-periodos.php?idperiodo='+idperiodo;
    request.open("GET", url, true);
    request.send();
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        var data = JSON.parse(request.responseText);
        if (data.status) {
            document.querySelector('#idperiodo').value=data.data.periodo_id;
            document.querySelector('#nombre').value=data.data.nombre_periodo;
            document.querySelector('#listEstado').value=data.data.estado;

            $("#modalPeriodo").modal("show");
        }else{
            swal('Atencion', data.msg,'error');
        }
      }
    }
  }

  function deletePeriodo(id){

      var idperiodo=id;

      swal({
          title:"Eliminar Periodo",
          text:"Esta seguro de eliminar el periodo?",
          type:"warning",
          showCancelButton:true,
          confirmButtonText:"Si, eliminar",
          cancelButtonText:"No, cancelar",
          closeOnConfirm:false,
          closeOnCancel:true
      },function(confirm){
          if(confirm){
            var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
            var url = './models/periodos/delete-periodos.php';
            request.open('POST', url, true);
            var strData="idperiodo="+idperiodo;
            request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function () {
              if (request.readyState == 4 && request.status == 200) {
                var data = JSON.parse(request.responseText);
                if (data.status) {
                    swal('Eliminar', data.msg,'success');
                       tablePeriodos.ajax.reload();
                }else{
                    swal('Atencion', data.msg,'error');
                }
              }
            }

          }
      })
  }