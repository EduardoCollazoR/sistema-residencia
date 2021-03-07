$("#tableAnteproyectos").DataTable();



var tableAnteproyectos;
document.addEventListener("DOMContentLoaded", function () {
  tableAnteproyectos = $("#tableAnteproyectos").DataTable({
    dom:'Bfrtip',
    buttons: [
      {
        extend:'excel',
        title: 'Lista de anteproyectos',
        text: '<i class="fas fa-file-excel"></i>',
        titleAttr: 'Exportar a Excel',
        className: 'btni btn-success ',
        sheetName: 'Lista de anteproyectos',
        exportOptions: {
          columns: [1,2,3,4,5,6,7]
      }

      },
      {
        extend:'pdf',
        title: 'Lista de anteproyectos',
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
        title: 'Lista de anteproyectos',
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
      url: "./models/anteproyectos/table-anteproyectos.php",
      dataSrc: "",
    },
    columns: [
      { data: "acciones" },
      { data: "nombre_anteproyecto" },
      { data: "nombre_periodo" },
      { data: "tipo" },
      { data: "nombre_alumno" },
      { data: "apellido_p" },
      { data: "apellido_m" },
      { data: "ncontrol" },
      { data: "estatus" },
      {data:"fecha"},
    ],
    responsive: true,
    bDestroy: true,
    iDisplayLength: 10,
    order: [[0, "desc"]],
    

  });

  var formAnteproyecto = document.querySelector("#formAnteproyecto");
  formAnteproyecto.onsubmit = function (e) {
    e.preventDefault();
    var idAnteproyecto=document.querySelector("#idAnteproyecto").value;
    var nombre = document.querySelector("#nombre").value;
    var tipo = document.querySelector("#tipo").value;
    var estatus = document.querySelector("#listEstado").value;

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
        }else{
            swal('Atencion', data.msg,'error');
        }
      }
    }
  }
});

// Modal Comentarios a documentos de anteproyectos
var formComentario = document.querySelector("#formComentario");
  formComentario.onsubmit = function (e) {
    e.preventDefault();
    var idDocumento=document.querySelector("#idDocumento").value;
    var archivo = document.querySelector("#archivo").value;
    var comentarios = document.querySelector("#comentarios").value;

    var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
    var url = './models/anteproyectos/ajax-comentarios.php';
    var form = new FormData(formComentario);
    request.open("POST", url, true);
    request.send(form);
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        var data = JSON.parse(request.responseText);
        if (data.status) {
            $("#modalComentarios").modal("hide");
            formComentario.reset();
            swal('Anteproyecto', data.msg,'success');
            
        }else{
            swal('Atencion', data.msg,'error');
        }
      }
    }
  }




function openDocs(id){
  var idAnteproyecto=id;
  var tableDocAnteproyectos;
  
              tableDocAnteproyectos = $("#tableDocAnteproyectos").DataTable({
              aProcessing: true,
              aServerSide: true,
              language: {
                url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
              },ajax: {
                url: "./models/anteproyectos/table-anteproyectosDocs.php?idAnteproyecto="+idAnteproyecto,
                method:"GET",
                dataSrc: "",
              },
              columns: [
                { data: "acciones" },
                { data: "archivo" },
                { data: "mime" },
                { data: "comentarios" },
                {data:"fecha"},
              ],
              responsive: true,
              bDestroy: true,
              iDisplayLength: 10,
              order: [[0, "desc"]],
            });
          
          $("#modalTableAnteproyectos").modal("show");
              
     
}

function agregarComentarios(id){
  $("#modalTableAnteproyectos").modal("hide");
  var idDocumento=id;
  
  var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
  var url = './models/anteproyectos/edit-comentario.php?idDocumento='+idDocumento;
  request.open("GET", url, true);
  request.send();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var data = JSON.parse(request.responseText);
      if (data.status) {
          document.querySelector('#idDocumento').value=data.data.idDocumento;
          document.querySelector('#mime').value=data.data.mime;
          document.querySelector('#archivo').value=data.data.archivo;
          document.querySelector('#comentarios').value=data.data.comentarios;
         

          $("#modalComentarios").modal("show");
         
       
        
      }else{
          swal('Atencion', data.msg,'error');
      }
    }
  }
}




function editAnteproyecto(id){

  var idAnteproyecto=id;
  
  var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
  var url = './models/anteproyectos/edit-anteproyectos.php?idAnteproyecto='+idAnteproyecto;
  request.open("GET", url, true);
  request.send();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var data = JSON.parse(request.responseText);
      if (data.status) {
          document.querySelector('#idAnteproyecto').value=data.data.idAnteproyecto;
          document.querySelector('#nombre').value=data.data.nombre;
          document.querySelector('#ncontrol').value=data.data.ncontrol;
          document.querySelector('#periodo_id').value=data.data.periodo_id;
          document.querySelector('#fecha').value=data.data.fecha;
          document.querySelector('#tipo').value=data.data.tipo;
          document.querySelector('#listEstado').value=data.data.estatus;

          $("#modalAnteproyecto").modal("show");
          
      }else{
          swal('Atencion', data.msg,'error');
      }
    }
  }
}
function delete_anteproyecto(id){

  var idAnteproyecto=id;

  swal({
      title:"Eliminar Anteproyecto",
      text:"Esta seguro de eliminar el anteproyecto?",
      type:"warning",
      showCancelButton:true,
      confirmButtonText:"Si, eliminar",
      cancelButtonText:"No, cancelar",
      closeOnConfirm:false,
      closeOnCancel:true
  },function(confirm){
      if(confirm){
        var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
        var url = './models/anteproyectos/delete_anteproyectos.php';
        request.open('POST', url, true);
        var strData="idAnteproyecto="+idAnteproyecto;
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

function deleteAnteproyectoDoc(id){

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
                    
          $("#modalTableAnteproyectos").modal("hide");
            }else{
                swal('Atencion', data.msg,'error');
            }
          }
        }

      }
  })
}