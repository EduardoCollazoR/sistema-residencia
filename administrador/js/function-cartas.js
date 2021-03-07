$("#tableCartas").DataTable();


var tableCartas;
document.addEventListener("DOMContentLoaded", function () {
  tableCartas = $("#tableCartas").DataTable({
    dom:'Bfrtip',
    buttons: [
      {
        extend:'excel',
        title: 'Lista de cartas',
        text: '<i class="fas fa-file-excel"></i>',
        titleAttr: 'Exportar a Excel',
        className: 'btni btn-success ',
        sheetName: 'Lista de cartas',
        exportOptions: {
          columns: [1,2,3]
      }

      },
      {
        extend:'pdf',
        title: 'Lista de cartas',
        download: 'open',
        text: '<i class="fas fa-file-pdf"></i>',
        titleAttr: 'Exportar a PDF',
        className: 'btni btn-danger',
        exportOptions: {
          columns: [1,2,3]
      }

      },
      {
        extend:'print',
        title: 'Lista de cartas',
        text: '<i class="fas fa-print"></i>',
        titleAttr: 'Imprimir Tabla',
        className: 'btni btn-info',

        exportOptions: {
          columns: [1,2,3]
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
      url: "./models/carta/table-cartas.php",
      dataSrc: "",
    },
    columns: [
      { data: "acciones" },
      { data: "nombre_anteproyecto" },
      { data: "nombre_periodo" },
      { data: "asesor" },
      { data: "documento" },
      {data:"fecha"},
    ],
    responsive: true,
    bDestroy: true,
    iDisplayLength: 5,
    order: [[0, "desc"]],
  });


})


  function showResidencias(){
    var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
    var url = './models/options/options-residencias.php';
    request.open('GET', url, true);
    request.send();
    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        var data = JSON.parse(request.responseText);
       data.forEach(function(valor){
         data +='<option value="'+valor.idResidencia+'">'+valor.nombre_anteproyecto+"&nbsp &nbsp"+"Asesor: "+"&nbsp" +valor.asesor+"&nbsp"+ valor.asesor_apellido+'</option>';
  
       });
       document.querySelector('#idResidencia').innerHTML=data;
      }
    }
  
  }
  window.addEventListener('load',function(){
    showResidencias();
    
  
  },false)
  function openModalnuevacarta() {
    showResidencias();
    document.querySelector('#id').value="";
    document.querySelector('#tituloModal').innerHTML='Asignar carta de terminacion';
    document.querySelector('#action').innerHTML='Guardar';
    document.querySelector('#formCarta').reset();
  $("#modalFormato").modal("show");
  }
  
  function deleteCarta(id){

    var id=id;

    swal({
        title:"Eliminar Carta de terminacion",
        text:"Esta seguro de eliminar la carta de terminacion?",
        type:"warning",
        showCancelButton:true,
        confirmButtonText:"Si, eliminar",
        cancelButtonText:"No, cancelar",
        closeOnConfirm:false,
        closeOnCancel:true
    },function(confirm){
        if(confirm){
          var request = (window.XMLHttpRequest) ?   new XMLHttpRequest: new ActiveXObject("Microsoft.XMLHTTP");
          var url = './models/carta/delete-carta.php';
          request.open('POST', url, true);
          var strData="id="+id;
          request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
          request.send(strData);
          request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
              var data = JSON.parse(request.responseText);
              if (data.status) {
                  swal('Eliminar', data.msg,'success');
                     tableCartas.ajax.reload();
              }else{
                  swal('Atencion', data.msg,'error');
              }
            }
          }

        }
    })
}