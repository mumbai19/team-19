$(document).ready(function() {
	//fetchTableData();
	$("#checkoutTable").dataTable( {
		dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'pdf'
        ]
    } );

});

// function fetchTableData() {
// 	$.ajax({
//             url:"checkout.php", //the page containing php script
//             type: "post", //request type,
			
//             dataType: 'json',
//            data: {registration: "success", name: "xyz", email: "abc@gmail.com"}
//             success:function(result){

//              console.log(result.abc);
//            }
//          });
// }
