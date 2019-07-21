var TABLE_FILTER_MAP = {
            "pname": "Product",
            "price": "Price (₹)",
            "qty": "Quantity",
            "image": "Image",
            "total": "Total"
        };

var totalAmount = 0;
var GST = 0.05;
var DELIVERY = 20;


$(document).ready(function() {
	//fetchTableData();
    
    $("#payment-btn").on('click', function() {
       window.location.href = "cart_confirm.php"; 
    });
    
    var jsonData = JSON.parse(localStorage.getItem("cart"));


    if (jsonData == null || jsonData.length == 0)
        return;

    var keys = Object.keys(jsonData[0]);
    var i; var j;
    
    totalAmount = 0;
    $.each(jsonData, function(key,value) {
        totalAmount += value.total; 
    }); 
    var initTotal = totalAmount;
    totalAmount += GST*totalAmount + DELIVERY;
    $("#totalAmount").html("Total: &#8377;"+totalAmount +" (&#8377;"+initTotal+" 5% GST + &#8377;20 DELIVERY)")
    console.log(totalAmount);
    
    Data = [];
    for (i = 0; i < jsonData.length; i++) {
        var jsonObj = {};
        for (j = 1; j < keys.length; j++)
            jsonObj[j-1] = jsonData[i][keys[j]];
            Data.push(jsonObj);

    }

    Columns = [];
    for (i = 1; i < keys.length; i++) {
        
        var jsonObj = { "targets": i-1, "searchable": true, "title": TABLE_FILTER_MAP[keys[i]], "sortable": true, "className": "col-xs-2 text-left", "defaultContent": "", "visible": true };
        Columns.push(jsonObj);
    }
    
    
//    var jsonObj = { "targets": null, "searchable": true, "title":"Total", "sortable": true, "className": "col-xs-2 text-left", "defaultContent": "", "visible": true };
//    Columns.push(jsonObj);
    
    DisplayTable = null;
    DisplayTable = $('#checkoutTable').DataTable({
        "data": Data,
        "bSort": false,
        "bSmart": false,
        "autoWidth": false,
        "paging": true,
        "deferRender": false,
        "language": {
            "zeroRecords": "No data found",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtered from _MAX_ total records)"
        },
        "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
          var imgLink = aData[3];
          var imgTag = '<img width="50px" src="' + imgLink + '"/>';
          $('td:eq(3)', nRow).html(imgTag);
            
            console.log(aData[2]);
            var editQty = "<input type='number' name='qty' step='1' min='1' max='50' value='"+aData[2]+"'</input>";

          $('td:eq(2)', nRow).html(editQty);

          return nRow;

        },
        drawCallback:function(){
            var api = this.api();  
            $( api.table().footer() ).html(totalAmount);
        },
        "columnDefs": Columns
        });
    
});


paypal.Button.render({

    env: 'sandbox', // Or 'sandbox',
    client: {
    sandbox: 'Acl6oizAR2rQ56x-TGOgeF4mzBoIFrkgrYpvp5-YXfYT71jI9_Yl-BX-lS47Ex9PXVbbgp4R7lZ03cyK'
     },
    commit: true, // Show a 'Pay Now' button

    style: {
        color: 'gold',
        size: 'small'
    },

    payment: function(data, actions) {
        return actions.payment.create({
            payment: {
                transactions: [
                    {
                        amount: { total: totalAmount, currency: 'INR' }
                    }
                ]
            }
        });
    },

    onAuthorize: function(data, actions) {
        return actions.payment.execute().then(function(payment) {
            window.location = "payment_page.php";

                            // The payment is complete!
                            // You can now show a confirmation message to the customer
                        });
    },

    onCancel: function(data, actions) {
        /* 
         * Buyer cancelled the payment 
         */
    },

    onError: function(err) {
        /* 
         * An error occurred during the transaction 
         */
    }

}, '#paypal-button');



