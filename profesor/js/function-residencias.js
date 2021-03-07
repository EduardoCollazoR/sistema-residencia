$("#tableResidencia2").DataTable();
var tableResidencia;
document.addEventListener("DOMContentLoaded", function () {
  tableResidencia = $("#tableResidencia2").DataTable({
      dom:'Bfrtip',
      buttons: [
        {
          extend:'excel',
          title: 'Lista de asesorados',
          text: '<i class="fas fa-file-excel"></i>',
          titleAttr: 'Exportar a Excel',
          className: 'btni btn-success ',
          sheetName: 'Lista de asesorados',
          exportOptions: {
            columns: [1,2,3,4,5,6,7,8,9]
        }
  
        },
        {
          extend:'pdf',
          title: 'Lista de asesorados',
          download: 'open',
          text: '<i class="fas fa-file-pdf"></i>',
          titleAttr: 'Exportar a PDF',
          className: 'btni btn-danger',
          exportOptions: {
            columns: [1,2,3,4,5,6,7,8,9]
        }
  
        },
        {
          extend:'print',
          title: 'Lista de asesorados',
          text: '<i class="fas fa-print"></i>',
          titleAttr: 'Imprimir Tabla',
          className: 'btni btn-info',
  
          exportOptions: {
            columns: [1,2,3,4,5,6,7,8,9]
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
      { data: "estatus" },
    ],
    responsive: true,
    bDestroy: true,
    iDisplayLength: 10,
    order: [[0, "desc"]],
  });



});


 


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
                { data: "descripcion" },
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
