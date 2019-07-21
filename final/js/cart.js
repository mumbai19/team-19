$(document).ready(function() {
    var cart = localStorage.getItem("cart");
    var pids;
    if (cart == null || cart == undefined || cart == "" || cart.length == 0)
        pids = new Array();
    else
        pids = JSON.parse(cart);
    document.getElementById("cartCount").innerHTML = pids.length;
    
    $(".addToCart").on('click',function() {
        var cartID = this.id;
        var productID = cartID.substr(cartID.indexOf("-") + 1);
        var qty = $("#quantity-"+productID).val();
        var price = $("#price-"+productID).html();
        price = price.substr(1);
        var pname = $("#pname-"+productID).html();
        var image = $("#image-"+productID).attr('src');
        
        if(productID !=0) {
            var cart = localStorage.getItem("cart");
            var pids;
            if (cart == null || cart == undefined || cart == "" || cart.length == 0)
                pids = new Array();
            else
                pids = JSON.parse(cart);
            
            var hasMatch =false;

            for (var index = 0; index < pids.length; ++index) {

             var pid = pids.pid;
                console.log(pid);
             if(pid == productID){
               hasMatch = true;
               break;
             }
            }
            
            if(!hasMatch)
                pids.push({pid: productID,pname: pname,price: price, qty: qty, image: image, total : price*qty});
            localStorage.setItem("cart", JSON.stringify(pids));
            
            var cart =localStorage.getItem("cart");
            console.log(cart);
            document.getElementById("cartCount").innerHTML = pids.length;
        }
    });
    
    
    
});
