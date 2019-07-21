var productID = 0;
var bulkSelected = false;
var customSelected = false;

$(document).ready(function () {
    productID = getParams(window.location.href).productID;
    $(".addToCart").attr('id',"cart-"+productID);
    $(".quantity").attr('id',"quantity-"+productID);
    $(".pname").attr('id',"pname-"+productID);
    $(".image").attr('id',"image-"+productID);
    $(".price").attr('id',"price-"+productID);
    getProductInfo();

    $("#bulk").on('change',function () {
        var qty = $(".quantity").val();
        if($("#bulk").prop('checked') == true && qty > 50) 
            bulkSelected = true;
        else {
            bulkSelected = false;
            $("#bulk").prop('checked',false);
        }
            
        
        toggleCartButton();
            
    });

    $("#custom").on('change',function () {
        customSelected = true;
        if($("#custom").prop('checked') == true) 
            customSelected = true;
        else
            customSelected = false;
        
        toggleCartButton();
    });
    
    $("#addToCart").on('click',function () {
        //Add to cart
        console.log("Add to cart");
    });
    
    $("#buyNow").on('click',function () {
        purchaseNow();
    });
    
    $(".quantity").change(function () {
        handleQty();
    });
    
    var quantitiy=0;
   $('.quantity-right-plus').click(function(e){
        
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('.quantity').val());
        
        // If is not undefined
            
            $('.quantity').val(quantity + 1);

          
            // Increment
       handleQty();
        
    });

     $('.quantity-left-minus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('.quantity').val());
        
        // If is not undefined
      
            // Increment
            if(quantity>1){
                $('.quantity').val(quantity - 1);
            }
         handleQty();
    });
    
});
    


var getParams = function (url) {
    var params = {};
    var parser = document.createElement('a');
    parser.href = url;
    var query = parser.search.substring(1);
    var vars = query.split('&');
    for (var i = 0; i < vars.length; i++) {
        var pair = vars[i].split('=');
        params[pair[0]] = decodeURIComponent(pair[1]);
    }
    return params;
};

function getProductInfo() {
    $.ajax({
        type: 'GET',
        url: 'getProductDetails.php',
        data: { productID: productID },
        dataType: 'json',
        success: function (data) {
            console.log(data);
            var object = data.result;
            $(".pname").html(object.pname);
            $(".image").attr('src',object.image);
            $(".price").html("&#8377; " + object.price);
            
        },
        error: function (data) {
            console.log("Error ",data);
        }
    });
}

function toggleCartButton() {
    if (bulkSelected || customSelected) {
        $(".addToCart").addClass('disabled');
    }
    else {
        $(".addToCart").removeClass('disabled');
    }
}

function purchaseNow() {
    var cbFlag = 0;
    if (bulkSelected || customSelected) 
        cbFlag = 1;
    $.ajax({
        type: 'GET',
        url: 'purchaseNow.php',
        data: { productID: productID, cbFlag: cbFlag},
        dataType: 'json',
        success: function (data) {
            window.location.href="checkout.php"
        },
        error: function (data) {
            console.log("Error ",data);
        }
    });
}

function handleQty() {
    var qty = $(".quantity").val();
    if (qty > 50) {
        bulkSelected = true;
        $("#bulk").prop('checked',true);
    }
    else {
        bulkSelected = false;
        $("#bulk").prop('checked',false);
    }

    toggleCartButton();
}
