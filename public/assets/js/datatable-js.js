$(document).ready(function() {
    
	//Only needed for the filename of export files.
	//Normally set in the title tag of your page.
	// document.title='Simple DataTable';
	// DataTable initialisation
// 	$('#example').DataTable(
// 		{
            
// 			"dom": '<"dt-buttons"Bf><"clear">lirtp',
// 			"paging": true,
// 			"autoWidth": true,
// 			"buttons": [
// 				'colvis',
// 				'copyHtml5',
//         'csvHtml5',
// 				'excelHtml5',
//         'pdfHtml5',
// 				'print'
// 			]
// 		}
// 	);
// });

   // let table = new DataTable('#example');
    
    // table.on('click', 'tbody tr', function () {
    //     let data = table.row(this).data();
    // });

});
$(document).ready(function() { 
    new DataTable('#general_profiles_TABLE', {
        //dom: 'lBfrtip',
        ordering: true,
        layout: {
            topStart: {
                buttons: ['csv', 'excel', 'pdf','print']
            }
        }
    });
} );