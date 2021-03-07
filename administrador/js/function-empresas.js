$("#tableEmpresas").DataTable();

var tableEmpresas;
document.addEventListener("DOMContentLoaded", function () {
  tableEmpresas = $("#tableEmpresas").DataTable({
    dom:'Bfrtip',
    buttons: [
      {
        extend:'excel',
        title: 'Lista de empresas',
        text: '<i class="fas fa-file-excel"></i>',
        titleAttr: 'Exportar a Excel',
        className: 'btni btn-success ',
        sheetName: 'Lista de empresas',
        exportOptions: {
          columns: [1,2,3,4,5,6,7]
      }

      },
      {
        extend:'pdf',
        title: 'Lista de empresas',
        download: 'open',
        text: '<i class="fas fa-file-pdf"></i>',
        titleAttr: 'Exportar a PDF',
        className: 'btni btn-danger',
        exportOptions: {
          columns: [1,2,3,4,5,6,7]
      }

      },
      {
        extend:'print',
        title: 'Lista de empresas',
        text: '<i class="fas fa-print"></i>',
        titleAttr: 'Imprimir Tabla',
        className: 'btni btn-info',

        exportOptions: {
          columns: [1,2,3,4,5,6,7]
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
      url: "./models/empresas/table_empresas.php",
      dataSrc: "",
    },
    columns: [
      { data: "acciones" },
      { data: "nombre_empresa" },
      { data: "correo" },
      { data: "rfc" },
      { data: "direccion" },
      { data: "telefono" },
      { data: "responsable" },
      { data: "estado" },
    ],
    responsive: true,
    bDestroy: true,
    iDisplayLength: 10,
    order: [[0, "desc"]],
  });

  var formEmpresa = document.querySelector("#formEmpresa");
  formEmpresa.onsubmit = function (e) {
    e.preventDefault();
    var idempresa=document.querySelector("#idempresa").value;
    var nombre = document.querySelector("#nombre").value;
    var correo = document.querySelector("#correo").value;
    var rfc = document.querySelector("#rfc").value;
    var direccion=document.querySelector("#direccion").value;
    var tel = document.querySelector("#tel").value;
    var responsable = document.querySelector("#responsable").value;
    var estado = document.querySelector("#listEstado").value;

    if (
      nombre == "" ||
      correo == "" ||
      rfc == "" ||
      direccion == "" ||
      responsable == "" ||
      tel == ""
    ) {
      swal("Atencion", "Todos los campos son necesarios", "error");
      return false;
    }

    var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
    var url = './models/empresas/ajax-empresas.php';
    var form = new FormData(formEmpresa);
    request.open("POST", url, true);
    request.send(form);
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        var data = JSON.parse(request.responseText);
        if (data.status) {
            $("#modalEmpresa").modal("hide");
            formEmpresa.reset();
            swal('Empresa', data.msg,'success');
            tableEmpresas.ajax.reload();
        }else{
            swal('Atencion', data.msg,'error');
        }
      }
    }
  }
})

function openModalempresa() {
    document.querySelector('#idempresa').value="";
    document.querySelector('#tituloModal').innerHTML='Nueva Empresa';
    document.querySelector('#action').innerHTML='Guardar';
    document.querySelector('#formEmpresa').reset();
  $("#modalEmpresa").modal("show");
}

function editEmpresa(id){
    document.querySelector('#tituloModal').innerHTML='Editar Empresa';
    document.querySelector('#action').innerHTML='Actualizar';
    var idempresa=id;
    
    var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
    var url = './models/empresas/edit-empresas.php?idempresa='+idempresa;
    request.open("GET", url, true);
    request.send();
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        var data = JSON.parse(request.responseText);
        if (data.status) {
            document.querySelector('#idempresa').value=data.data.empresa_id;
            document.querySelector('#nombre').value=data.data.nombre_empresa;
            document.querySelector('#correo').value=data.data.correo;
            document.querySelector('#rfc').value=data.data.rfc;
            document.querySelector('#direccion').value=data.data.direccion;
            document.querySelector('#tel').value=data.data.telefono;
            document.querySelector('#responsable').value=data.data.responsable;
            document.querySelector('#listEstado').value=data.data.estado;

            $("#modalEmpresa").modal("show");
        }else{
            swal('Atencion', data.msg,'error');
        }
      }
    }
  }

  function deleteEmpresa(id){

      var idempresa=id;

      swal({
          title:"Eliminar Empresa",
          text:"Esta seguro de eliminar la empresa?",
          type:"warning",
          showCancelButton:true,
          confirmButtonText:"Si, eliminar",
          cancelButtonText:"No, cancelar",
          closeOnConfirm:false,
          closeOnCancel:true
      },function(confirm){
          if(confirm){
            var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
            var url = './models/empresas/delete-empresas.php';
            request.open('POST', url, true);
            var strData="idempresa="+idempresa;
            request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function () {
              if (request.readyState == 4 && request.status == 200) {
                var data = JSON.parse(request.responseText);
                if (data.status) {
                    swal('Eliminar', data.msg,'success');
                       tableEmpresas.ajax.reload();
                }else{
                    swal('Atencion', data.msg,'error');
                }
              }
            }

          }
      })
  }