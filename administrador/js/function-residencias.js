$("#tableResidencia").DataTable();


var tableResidencia;
document.addEventListener("DOMContentLoaded", function () {
  tableResidencia = $("#tableResidencia").DataTable({
    dom:'Bfrtip',
    buttons: [
      {
        extend:'excel',
        title: 'Lista de residencias',
        text: '<i class="fas fa-file-excel"></i>',
        titleAttr: 'Exportar a Excel',
        className: 'btni btn-success ',
        sheetName: 'Lista de residencias',
        exportOptions: {
          columns: [1,2,3,4,5,6,7,8,9,10,11,12,13]
      }

      },
      {
        extend:'pdf',
        title: 'Lista de residencias',
        download: 'open',
        text: '<i class="fas fa-file-pdf"></i>',
        titleAttr: 'Exportar a PDF',
        className: 'btni btn-danger',
        orientation: 'landscape',
        exportOptions: {
          columns: [1,2,3,4,5,6,7,8,9,10,11,12,13]
      }

      },
      {
        extend:'print',
        title: 'Lista de residencias',
        text: '<i class="fas fa-print"></i>',
        titleAttr: 'Imprimir Tabla',
        className: 'btni btn-info',

        exportOptions: {
          columns: [1,2,3,4,5,6,7,8,9,10,11,12,13]
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
      url: "./models/residencias/table-residencias.php",
      dataSrc: "",
    },
    columns: [
      { data: "acciones" },
      { data: "nombre_anteproyecto" },
      { data: "tipo" },
      { data: "nombre_periodo" },
      { data: "fecha_inicio"},
      { data: "fecha_fin"},
      { data: "ncontrol_alumno" },
      { data: "nombre_alumno" },
      { data: "apellido_alumno" },
      { data: "apellidom_alumno" },
      { data: "asesor" },
      { data: "asesor_apellido"},
      { data: "asesor_apellidom"},
      { data: "estatus" },
    ],
    responsive: true,
    bDestroy: true,
    iDisplayLength: 10,
    order: [[0, "desc"]],
  });

  var formResidencia = document.querySelector("#formResidencia");
  formResidencia.onsubmit = function (e) {
    e.preventDefault();
    var idResidencia=document.querySelector("#idResidencia").value;
    var idAnteproyecto=document.querySelector("#idAnteproyecto").value;
    var idAsesor=document.querySelector("#idAsesor").value;
    var fecha_inicio = document.querySelector("#fecha_inicio").value;
    var fecha_fin = document.querySelector("#fecha_fin").value;
    var estado = document.querySelector("#estado").value;

    var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
    var url = './models/residencias/ajax-residencia.php';
    var form = new FormData(formResidencia);
    request.open("POST", url, true);
    request.send(form);
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        var data = JSON.parse(request.responseText);
        if (data.status) {
            $("#modalResidencia").modal("hide");
            formResidencia.reset();
            swal('Residencia', data.msg,'success');
            tableResidencia.ajax.reload();
        }else{
            swal('Atencion', data.msg,'error');
        }
      }
    }
  }

  var formResidencia2 = document.querySelector("#formResidencia2");
  formResidencia2.onsubmit = function (e) {
    e.preventDefault();
    var idResidencia=document.querySelector("#Residencia").value;
    var idAnteproyecto=document.querySelector("#Anteproyecto").value;
    var idAsesor=document.querySelector("#Asesor").value;
    var fecha_inicio = document.querySelector("#fechainicio").value;
    var fecha_fin = document.querySelector("#fechafin").value;
    var estado = document.querySelector("#estatus").value;

    var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
    var url = './models/residencias/update-residencia.php';
    var form = new FormData(formResidencia2);
    request.open("POST", url, true);
    request.send(form);
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        var data = JSON.parse(request.responseText);
        if (data.status) {
            $("#modaleditResidencia").modal("hide");
            formResidencia2.reset();
            swal('Residencia', data.msg,'success');
            tableResidencia.ajax.reload();
        }else{
            swal('Atencion', data.msg,'error');
        }
      }
    }
  }



  

});

window.addEventListener('load',function(){
    showAnteproyectos();
    showAsesores();
  
  },false)
  
  function showAnteproyectos(){
    var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
    var url = './models/options/options-anteproyectos.php';
    request.open('GET', url, true);
    request.send();
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        var data = JSON.parse(request.responseText);
       data.forEach(function(valor){
         data +='<option value="'+valor.idAnteproyecto+ '">' +valor.nombre+'</option>';
  
       });
       document.querySelector('#idAnteproyecto').innerHTML=data;
      }
    }
  
  }

  function showAsesores(){
    var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
    var url = './models/options/options-asesores.php';
    request.open('GET', url, true);
    request.send();
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        var data = JSON.parse(request.responseText);
       data.forEach(function(valor){
         data +='<option value="'+valor.profesor_id+ ' ">'+valor.nombre + "&nbsp; &nbsp;"+ valor.apellido_p+"&nbsp; &nbsp;"+ valor.apellido_m+'</option>';
  
       });
       document.querySelector('#idAsesor').innerHTML=data;
      }
    }
  
  }
  function showAsesores2(){
    var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
    var url = './models/options/options-asesores.php';
    request.open('GET', url, true);
    request.send();
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        var data = JSON.parse(request.responseText);
       data.forEach(function(valor){
         data +='<option value="'+valor.profesor_id+ ' ">'+valor.nombre + "&nbsp;"+ valor.apellido_p+"&nbsp;"+ valor.apellido_m+'</option>';
  
       });
       document.querySelector('#Asesor').innerHTML=data;
      }
    }
  
  }
  

// Modal Comentarios a documentos de anteproyectos
var formComentarioResi = document.querySelector("#formComentarioResi");
  formComentarioResi.onsubmit = function (e) {
    e.preventDefault();
    var idDocumento=document.querySelector("#idDocumento").value;
    var archivo = document.querySelector("#archivo").value;
    var comentarios = document.querySelector("#comentarios").value;

    var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
    var url = './models/residencias/update-comentarios.php';
    var form = new FormData(formComentarioResi);
    request.open("POST", url, true);
    request.send(form);
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        var data = JSON.parse(request.responseText);
        if (data.status) {
            $("#modalComentarioResi").modal("hide");
            formComentarioResi.reset();
            swal('Comentario', data.msg,'success');
            
        }else{
            swal('Atencion', data.msg,'error');
        }
      }
    }
  }


function openModalResidencia() {
    document.querySelector('#idResidencia').value="";
    document.querySelector('#tituloModal').innerHTML='Nueva Residencia';
    document.querySelector('#action').innerHTML='Guardar';
    document.querySelector('#formResidencia').reset();
  $("#modalResidencia").modal("show");
}



function open_residenciaDocs(id){
  var idResidencia=id;
  var tableDocResidencias;
  
              tableDocResidencias = $("#tableDocResidencias").DataTable({
              aProcessing: true,
              aServerSide: true,
              language: {
                url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
              },ajax: {
                url: "./models/residencias/table-residenciasDocs.php?idResidencia="+idResidencia,
                method:"GET",
                dataSrc: "",
              },
              columns: [
                { data: "acciones" },
                { data: "archivo" },
                { data: "mime" },
                { data: "comentarios" },
                { data: "fecha" },
              ],
              responsive: true,
              bDestroy: true,
              iDisplayLength: 10,
              order: [[0, "desc"]],
            });
          
          $("#modalTableResidencias").modal("show");
              
     
}

function agregar_residenciaComentarios(id){
  $("#modalTableResidencias").modal("hide");
  var idDocumento=id;
  
  var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
  var url = './models/residencias/edit-comentariodoc.php?idDocumento='+idDocumento;
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
         

          $("#modalComentarioResi").modal("show");
         
       
        
      }else{
          swal('Atencion', data.msg,'error');
      }
    }
  }
}




function editResidencia(id){

  var idResidencia=id;
  showAsesores2();
  var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
  var url = './models/residencias/edit-residencias.php?idResidencia='+idResidencia;
  request.open("GET", url, true);
  request.send();
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var data = JSON.parse(request.responseText);
      if (data.status) {
          document.querySelector('#Residencia').value=data.data.idResidencia;
          document.querySelector('#Anteproyecto').value=data.data.idAnteproyecto;
          document.querySelector('#proyecto').value=data.data.nombre_anteproyecto;
          document.querySelector('#alumno').value=''+data.data.ncontrol_alumno+'   '+data.data.nombre_alumno+' '+data.data.apellido_alumno+' '+data.data.apellidom_alumno+'';
          document.querySelector('#fechainicio').value=data.data.fecha_inicio;
          document.querySelector('#fechafin').value=data.data.fecha_fin;
          document.querySelector('#estatus').value=data.data.estatus;

          $("#modaleditResidencia").modal("show");
          
      }else{
          swal('Atencion', data.msg,'error');
      }
    }
  }

}

function deleteResidencia(id){

    var idResidencia=id;
  
    swal({
        title:"Eliminar Residencia",
        text:"Esta seguro de eliminar la residencia?",
        type:"warning",
        showCancelButton:true,
        confirmButtonText:"Si, eliminar",
        cancelButtonText:"No, cancelar",
        closeOnConfirm:false,
        closeOnCancel:true
    },function(confirm){
        if(confirm){
          var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
          var url = './models/residencias/delete-residencia.php';
          request.open('POST', url, true);
          var strData="idResidencia="+idResidencia;
          request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
          request.send(strData);
          request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
              var data = JSON.parse(request.responseText);
              if (data.status) {
                  swal('Eliminar', data.msg,'success');
                      
            $("#modaltableResidencia").modal("hide");
            tableResidencia.ajax.reload();
              }else{
                  swal('Atencion', data.msg,'error');
              }
            }
          }
  
        }
    })
  }

function deleteResidenciaDoc(id){

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
        var url = './models/residencias/delete-doc-residencia.php';
        request.open('POST', url, true);
        var strData="idDocumento="+idDocumento;
        request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        request.send(strData);
        request.onreadystatechange = function () {
          if (request.readyState == 4 && request.status == 200) {
            var data = JSON.parse(request.responseText);
            if (data.status) {
                swal('Eliminar', data.msg,'success');
                    
            $("#modalTableResidencias").modal("hide");
            }else{
                swal('Atencion', data.msg,'error');
            }
          }
        }

      }
  })
}

