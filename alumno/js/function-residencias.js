$("#tableResidencia").DataTable();


var tableResidencia;
document.addEventListener("DOMContentLoaded", function () {
  tableResidencia = $("#tableResidencia").DataTable({
    aProcessing: true,
    aServerSide: true,
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
    },
    ajax: {
      url: "./models/residencia/table-residencias.php",
      dataSrc: "",
    },
    columns: [
      { data: "acciones" },
      { data: "descripcion" },
      { data: "archivo" },
      { data: "comentarios" },
      { data: "fecha" },
    ],
    responsive: true,
    bDestroy: true,
    iDisplayLength: 10,
    order: [[0, "desc"]],
  })

})

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
          var url = './models/residencia/delete-doc-residencia.php';
          request.open('POST', url, true);
          var strData="idDocumento="+idDocumento;
          request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
          request.send(strData);
          request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
              var data = JSON.parse(request.responseText);
              if (data.status) {
                  swal('Eliminar', data.msg,'success');
                      tableResidencia.ajax.reload();
              
              }else{
                  swal('Atencion', data.msg,'error');
              }
            }
          }
  
        }
    })
  }