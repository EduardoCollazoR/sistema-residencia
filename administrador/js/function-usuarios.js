$("#tableUsuarios").DataTable();

var tableUsuarios;
document.addEventListener("DOMContentLoaded", function () {
  tableUsuarios = $("#tableUsuarios").DataTable({
    dom:'Bfrtip',
    buttons: [
      {
        extend:'excel',
        title: 'Lista de usuarios',
        text: '<i class="fas fa-file-excel"></i>',
        titleAttr: 'Exportar a Excel',
        className: 'btni btn-success ',
        sheetName: 'Lista de usuarios',
        exportOptions: {
          columns: [1,2,3,4,5,6,7,8]
      }

      },
      {
        extend:'pdf',
        title: 'Lista de usuarios',
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
        title: 'Lista de usuarios',
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
      url: "./models/usuarios/table_usuarios.php",
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
      { data: "nombre_rol" },
      { data: "estado" },
    ],
    responsive: true,
    bDestroy: true,
    iDisplayLength: 10,
    order: [[0, "desc"]],
  });

  var formUsuario = document.querySelector("#formUsuario");
  formUsuario.onsubmit = function (e) {
    e.preventDefault();
    var idusuario=document.querySelector("#idusuario").value;
    var nombre = document.querySelector("#nombre").value;
    var apellidop = document.querySelector("#apellidoPaterno").value;
    var apellidom = document.querySelector("#apellidoMaterno").value;
    var ncontrol=document.querySelector("#ncontrol").value;
    var correo = document.querySelector("#correo").value;
    var tel = document.querySelector("#tel").value;
    var clave = document.querySelector("#clave").value;
    var rol = document.querySelector("#listRol").value;
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
    var url = './models/usuarios/ajax-usuarios.php';
    var form = new FormData(formUsuario);
    request.open("POST", url, true);
    request.send(form);
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        var data = JSON.parse(request.responseText);
        if (data.status) {
            $("#modalUsuario").modal("hide");
            formUsuario.reset();
            swal('Usuario', data.msg,'success');
            tableUsuarios.ajax.reload();
        }else{
            swal('Atencion', data.msg,'error');
        }
      }
    }
  }
})

function openModalusuario() {
  document.querySelector('#idusuario').value="";
  document.querySelector('#tituloModal').innerHTML='Nuevo Usuario';
  document.querySelector('#action').innerHTML='Guardar';
  document.querySelector('#formUsuario').reset();
$("#modalUsuario").modal("show");
}

function editUsuario(id){
    document.querySelector('#tituloModal').innerHTML='Editar Usuario';
    document.querySelector('#action').innerHTML='Actualizar';
    var idusuario=id;
    
    var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
    var url = './models/usuarios/edit-usuarios.php?idusuario='+idusuario;
    request.open("GET", url, true);
    request.send();
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        var data = JSON.parse(request.responseText);
        if (data.status) {
            document.querySelector('#idusuario').value=data.data.usuario_id;
            document.querySelector('#nombre').value=data.data.nombre;
            document.querySelector('#apellidoPaterno').value=data.data.apellido_p;
            document.querySelector('#apellidoMaterno').value=data.data.apellido_m;
            document.querySelector('#ncontrol').value=data.data.ncontrol;
            document.querySelector('#correo').value=data.data.correo;
            document.querySelector('#tel').value=data.data.telefono;
            document.querySelector('#listRol').value=data.data.rol;
            document.querySelector('#listEstado').value=data.data.estado;

            $("#modalUsuario").modal("show");
        }else{
            swal('Atencion', data.msg,'error');
        }
      }
    }
  }

  function deleteUsuario(id){

      var idusuario=id;

      swal({
          title:"Eliminar Usuario",
          text:"Esta seguro de eliminar el usuario?",
          type:"warning",
          showCancelButton:true,
          confirmButtonText:"Si, eliminar",
          cancelButtonText:"No, cancelar",
          closeOnConfirm:false,
          closeOnCancel:true
      },function(confirm){
          if(confirm){
            var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
            var url = './models/usuarios/delete-usuarios.php';
            request.open('POST', url, true);
            var strData="idusuario="+idusuario;
            request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function () {
              if (request.readyState == 4 && request.status == 200) {
                var data = JSON.parse(request.responseText);
                if (data.status) {
                    swal('Eliminar', data.msg,'success');
                       tableUsuarios.ajax.reload();
                }else{
                    swal('Atencion', data.msg,'error');
                }
              }
            }

          }
      })
  }