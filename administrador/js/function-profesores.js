$("#tableProfesores").DataTable();

var tableProfesores;
document.addEventListener("DOMContentLoaded", function () {
  tableProfesores = $("#tableProfesores").DataTable({
    dom:'Bfrtip',
    buttons: [
      {
        extend:'excel',
        title: 'Lista de profesores',
        text: '<i class="fas fa-file-excel"></i>',
        titleAttr: 'Exportar a Excel',
        className: 'btni btn-success ',
        sheetName: 'Lista de profesores',
        exportOptions: {
          columns: [1,2,3,4,5,6,7]
      }

      },
      {
        extend:'pdf',
        title: 'Lista de profesores',
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
        title: 'Lista de usuarios',
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
      url: "./models/profesores/table_profesores.php",
      dataSrc: "",
    },
    columns: [
      { data: "acciones" },
      { data: "nombre" },
      { data: "apellido_p" },
      { data: "apellido_m" },
      { data: "ncontrol" },
      { data: "correo" },
      { data: "telefono" },
      { data: "estado" },
    ],
    responsive: true,
    bDestroy: true,
    iDisplayLength: 10,
    order: [[0, "desc"]],
  });

  var formProfesor = document.querySelector("#formProfesor");
  formProfesor.onsubmit = function (e) {
    e.preventDefault();
    var idprofesor=document.querySelector("#idprofesor").value;
    var nombre = document.querySelector("#nombre").value;
    var apellidop = document.querySelector("#apellidoPaterno").value;
    var apellidom = document.querySelector("#apellidoMaterno").value;
    var ncontrol=document.querySelector("#ncontrol").value;
    var correo = document.querySelector("#correo").value;
    var tel = document.querySelector("#tel").value;
    var clave = document.querySelector("#clave").value;
    var estado = document.querySelector("#listEstado").value;

    if (
      nombre == "" ||
      apellidop == "" ||
      apellidom == "" ||
      ncontrol == "" ||
      correo == "" ||
      tel == ""
    ) {
      swal("Atencion", "Todos los campos son necesarios", "error");
      return false;
    }

    var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
    var url = './models/profesores/ajax-profesores.php';
    var form = new FormData(formProfesor);
    request.open("POST", url, true);
    request.send(form);
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        var data = JSON.parse(request.responseText);
        if (data.status) {
            $("#modalProfesor").modal("hide");
            formProfesor.reset();
            swal('Profesor', data.msg,'success');
            tableProfesores.ajax.reload();
        }else{
            swal('Atencion', data.msg,'error');
        }
      }
    }
  }
})

function openModalprofesor() {
    document.querySelector('#idprofesor').value="";
    document.querySelector('#tituloModal').innerHTML='Nuevo Profesor';
    document.querySelector('#action').innerHTML='Guardar';
    document.querySelector('#formProfesor').reset();
  $("#modalProfesor").modal("show");
}

function editProfesor(id){
    document.querySelector('#tituloModal').innerHTML='Editar Profesor';
    document.querySelector('#action').innerHTML='Actualizar';
    var idprofesor=id;
    
    var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
    var url = './models/profesores/edit-profesores.php?idprofesor='+idprofesor;
    request.open("GET", url, true);
    request.send();
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        var data = JSON.parse(request.responseText);
        if (data.status) {
            document.querySelector('#idprofesor').value=data.data.profesor_id;
            document.querySelector('#nombre').value=data.data.nombre;
            document.querySelector('#apellidoPaterno').value=data.data.apellido_p;
            document.querySelector('#apellidoMaterno').value=data.data.apellido_m;
            document.querySelector('#ncontrol').value=data.data.ncontrol;
            document.querySelector('#correo').value=data.data.correo;
            document.querySelector('#tel').value=data.data.telefono;
            document.querySelector('#listEstado').value=data.data.estado;
            $("#modalProfesor").modal("show");
        }else{
            swal('Atencion', data.msg,'error');
        }
      }
    }
  }

  function deleteProfesor(id){

      var idprofesor=id;

      swal({
          title:"Eliminar Profesor",
          text:"Esta seguro de eliminar el profesor?",
          type:"warning",
          showCancelButton:true,
          confirmButtonText:"Si, eliminar",
          cancelButtonText:"No, cancelar",
          closeOnConfirm:false,
          closeOnCancel:true
      },function(confirm){
          if(confirm){
            var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
            var url = './models/profesores/delete-profesores.php';
            request.open('POST', url, true);
            var strData="idprofesor="+idprofesor;
            request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function () {
              if (request.readyState == 4 && request.status == 200) {
                var data = JSON.parse(request.responseText);
                if (data.status) {
                    swal('Eliminar', data.msg,'success');
                       tableProfesores.ajax.reload();
                }else{
                    swal('Atencion', data.msg,'error');
                }
              }
            }

          }
      })
  }