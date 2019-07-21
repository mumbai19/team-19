var bulkSelected = false;
var GST = 0.05;
var DELIVERY = 20;

$(document).ready(function() {
    
    $(".qty").change(function () {
        var qtyID =  this.id;
        var productID = qtyID.substr(qtyID.indexOf("-") + 1);
        handleQty(productID);
    });
    
    $(".buyNow").on('click',function () {
        var buyID =    this.id;
        var productID = buyID.substr(buyID.indexOf("-") + 1);
        purchaseNow(productID);
    });
    
    var quantitiy=0;
   $('.quantity-right-plus').click(function(e){
       
       var qtyID =    this.id;
        var productID = qtyID.substr(qtyID.indexOf("-") + 1);
        
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity-'+productID).val());
        
        // If is not undefined
            
            $('#quantity-'+productID).val(quantity + 1);

        handleQty(productID);
        
    });

     $('.quantity-left-minus').click(function(e){
         var qtyID =  this.id;
        var productID = qtyID.substr(qtyID.indexOf("-") + 1);
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity-'+productID).val());
        
        // If is not undefined
      
            // Increment
            if(quantity>1){
                $('#quantity-'+productID).val(quantity - 1);
            }
        handleQty(productID);
    });
});

function toggleCartButton(productID) {
    var id = "#cart-"+productID;
    if (bulkSelected) {
        $(id).addClass('disabled');
    }
    else {
        $(id).removeClass('disabled');
    }
}

function purchaseNow(productID) {
    var cbFlag = 0;
    var qty = $("#quantity-"+productID).val();
    var price = $("#price-"+productID).html();
    price = price.substr(1);
    var total = price * qty;
    total += total*GST + DELIVERY;
    if (bulkSelected) 
        cbFlag = 1;
    $.ajax({
        type: 'GET',
        url: 'purchaseNow.php',
        data: { productID: productID, cbFlag: cbFlag, qty: qty, total: total},
        dataType: 'json',
        success: function (data) {
            $("cart-"+productID).trigger('click');
            window.location.href="checkout.php"
        },
        error: function (data) {
            console.log("Error ",data);
        }
    });
}

function handleQty(productID) {
    var id = "#quantity-"+productID;
    var qty = $(id).val();
    if (qty > 50) {
        bulkSelected = true;
    }
    else {
        bulkSelected = false;
    }

    toggleCartButton(productID);
}

