$("#tableAlumnos").DataTable();

var tableAlumnos;
document.addEventListener("DOMContentLoaded", function () {
  tableAlumnos= $("#tableAlumnos").DataTable({
    dom:'Bfrtip',
    buttons: [
      {
        extend:'excel',
        title: 'Lista de alumnos',
        text: '<i class="fas fa-file-excel"></i>',
        titleAttr: 'Exportar a Excel',
        className: 'btni btn-success ',
        sheetName: 'Lista de alumnos',
        exportOptions: {
          columns: [1,2,3,4,5,6,7,8]
      }

      },
      {
        extend:'pdf',
        title: 'Lista de alumnos',
        download: 'open',
        text: '<i class="fas fa-file-pdf"></i>',
        titleAttr: 'Exportar a PDF',
        className: 'btni btn-danger',
        exportOptions: {
          columns: [1,2,3,4,5,6,7,8]
      }

      },
      {
        extend:'print',
        title: 'Lista de alumnos',
        text: '<i class="fas fa-print"></i>',
        titleAttr: 'Imprimir Tabla',
        className: 'btni btn-info',

        exportOptions: {
          columns: [1,2,3,4,5,6,7,8]
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
      url: "./models/alumnos/table_alumnos.php",
      dataSrc: "",
    },
    columns: [
      { data: "acciones" },
      { data: "nombre" },
      { data: "apellido_p" },
      { data: "apellido_m" },
      { data: "ncontrol" },
      { data: "correo" },
      { data: "semestre" },
      { data: "telefono" },
      { data: "estado" },
    ],
    responsive: true,
    bDestroy: true,
    iDisplayLength: 10,
    order: [[0, "desc"]],
  });

  var formAlumno = document.querySelector("#formAlumno");
  formAlumno.onsubmit = function (e) {
    e.preventDefault();
    var idalumno=document.querySelector("#idalumno").value;
    var nombre = document.querySelector("#nombre").value;
    var apellidop = document.querySelector("#apellidoPaterno").value;
    var apellidom = document.querySelector("#apellidoMaterno").value;
    var ncontrol=document.querySelector("#ncontrol").value;
    var correo = document.querySelector("#correo").value;
    var semestre = document.querySelector("#semestre").value;
    var tel = document.querySelector("#tel").value;
    var clave = document.querySelector("#clave").value;
    var estado = document.querySelector("#listEstado").value;

    if (
      nombre == "" ||
      apellidop == "" ||
      apellidom == "" ||
      ncontrol == "" ||
      correo == "" ||
      tel == "" ||
      semestre==""
    ) {
      swal("Atencion", "Todos los campos son necesarios", "error");
      return false;
    }

    var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
    var url = './models/alumnos/ajax-alumnos.php';
    var form = new FormData(formAlumno);
    request.open("POST", url, true);
    request.send(form);
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        var data = JSON.parse(request.responseText);
        if (data.status) {
            $("#modalAlumno").modal("hide");
            formAlumno.reset();
            swal('Alumno', data.msg,'success');
            tableAlumnos.ajax.reload();
        }else{
            swal('Atencion', data.msg,'error');
        }
      }
    }
  }
})

function openModalalumno() {
    document.querySelector('#idalumno').value="";
    document.querySelector('#tituloModal').innerHTML='Nuevo Alumno';
    document.querySelector('#action').innerHTML='Guardar';
    document.querySelector('#formAlumno').reset();
  $("#modalAlumno").modal("show");
}

function editAlumno(id){
    document.querySelector('#tituloModal').innerHTML='Editar Alumno';
    document.querySelector('#action').innerHTML='Actualizar';
    var idalumno=id;
    
    var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
    var url = './models/alumnos/edit-alumnos.php?idalumno='+idalumno;
    request.open("GET", url, true);
    request.send();
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        var data = JSON.parse(request.responseText);
        if (data.status) {
            document.querySelector('#idalumno').value=data.data.alumno_id;
            document.querySelector('#nombre').value=data.data.nombre;
            document.querySelector('#apellidoPaterno').value=data.data.apellido_p;
            document.querySelector('#apellidoMaterno').value=data.data.apellido_m;
            document.querySelector('#ncontrol').value=data.data.ncontrol;
            document.querySelector('#correo').value=data.data.correo;
            document.querySelector('#semestre').value=data.data.semestre;
            document.querySelector('#tel').value=data.data.telefono;
            document.querySelector('#listEstado').value=data.data.estado;
            $("#modalAlumno").modal("show");
        }else{
            swal('Atencion', data.msg,'error');
        }
      }
    }
  }

  function deleteAlumno(id){

      var idalumno=id;

      swal({
          title:"Eliminar Alumno",
          text:"Esta seguro de eliminar el alumno?",
          type:"warning",
          showCancelButton:true,
          confirmButtonText:"Si, eliminar",
          cancelButtonText:"No, cancelar",
          closeOnConfirm:false,
          closeOnCancel:true
      },function(confirm){
          if(confirm){
            var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
            var url = './models/alumnos/delete-alumnos.php';
            request.open('POST', url, true);
            var strData="idalumno="+idalumno;
            request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function () {
              if (request.readyState == 4 && request.status == 200) {
                var data = JSON.parse(request.responseText);
                if (data.status) {
                    swal('Eliminar', data.msg,'success');
                       tableAlumnos.ajax.reload();
                }else{
                    swal('Atencion', data.msg,'error');
                }
              }
            }

          }
      })
  }