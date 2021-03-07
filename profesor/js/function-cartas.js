$("#tableCartas").DataTable();


var tableCartas;
document.addEventListener("DOMContentLoaded", function () {
  tableCartas = $("#tableCartas").DataTable({
    dom:'Bfrtip',
      buttons: [
        {
          extend:'excel',
          title: 'Lista de cartas de asignacion',
          text: '<i class="fas fa-file-excel"></i>',
          titleAttr: 'Exportar a Excel',
          className: 'btni btn-success ',
          sheetName: 'Lista de cartas de asignacion',
          exportOptions: {
            columns: [1,2,3]
        }
        
        },
        {
          extend:'pdf',
          title: 'Lista de cartas de asignacion',
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
          title: 'Lista de cartas de asignacion',
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
      url: "./models/cartas/table-cartas.php",
      dataSrc: "",
    },
    columns: [
      { data: "acciones" },
      { data: "nombre_anteproyecto" },
      { data: "nombre_periodo" },
      { data: "nombre_alumno" },
      { data: "documento" },
      { data: "fecha" },
    ],
    responsive: true,
    bDestroy: true,
    iDisplayLength: 10,
    order: [[0, "desc"]],
  });


})

