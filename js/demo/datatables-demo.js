// Call the dataTables jQuery plugin
// $(document).ready(function() {
//   $('#example').DataTable();
  
// });



$(document).ready(function() {
  var table = $('#example').DataTable( {
      lengthChange: false,
      // buttons: ['pdf', 'colvis' ]
      buttons: [{
        extend: 'pdfHtml5',
        title: 'Lista',
        exportOptions: {
            columns: [0, 1,2,3,4]
        }
    },
    'colvis'
]
  } );

  table.buttons().container()
      .appendTo( '#example_wrapper .col-md-6:eq(0)' );
} );