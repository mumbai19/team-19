$(document).ready(function() {
    
    $(".addToCart").on('click',function() {
        var cartID = $(".addToCart").attr('id');
        var productID = cartID.substr(cartID.indexOf("-") + 1);
        
        if(productID !=0) {
            var cart = localStorage.getItem("cart");
            var pids;
            if (cart == null || cart == undefined || cart == "" || cart.length == 0)
                pids = new Array();
            else
                pids = JSON.parse(cart);
            
            pids.push(productID);
            localStorage.setItem("cart", JSON.stringify(pids));
            
            var cart =localStorage.getItem("cart");
            document.getElementById("cartCount").innerHTML = cart.length;
        }
    });
    
    
    
});
