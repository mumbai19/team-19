
	<!--  start hero  -->
	<section class="hero">
<html>  
      <head>  
      <script type="applijegleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />

<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />	
<script src="js/jquery-1.11.1.min.js"></script>

<!-- start menu -->
<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<script src="js/menu_jquery.js"></script>
<script src="js/simpleCart.min.js"> </script>

<!--web-fonts-->
 <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,300italic,600,700' rel='stylesheet' type='text/css'>
 <link href='//fonts.googleapis.com/css?family=Roboto+Slab:300,400,700' rel='stylesheet' type='text/css'>

<!--//web-fonts-->
<script src="js/scripts.js" type="text/javascript"></script>
<script src="js/modernizr.custom.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
      </head>  
	  <style>
#tbldata {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#tbldata td, #tbldata th {
    border: 0px solid #ddd;
    padding: 10px;
	text-align: CENTER;
}

#tbldata tr:nth-child(even){background-color: #f2f2f2;}

#tbldata tr:hover {background-color: #ddd;}

#tbldata th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: CENTER;
    background-color: #2469F4;
    color: white;
}
</style>
      <body>  
           <div class="container">  
                <br />  
                <br />  
                <br />  
                <div class="table-responsive">  
                     
                     <div id="live_data"></div>                 
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      function fetch_data()  
      {  
           $.ajax({  
                url:"select.php",  
                method:"POST",  
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      }  
      fetch_data();  
      $(document).on('click', '#btn_add', function(){  
          // var pid = $('#pid').text();  
           var pname = $('#pname').text();  
		    var price = $('#price').text();  
			 var quantity = $('#quantity').text();  
			 var image = $('#image').text();  
			 var team_id = $('#team_id').text();
	 
          
           if(pname == '')  
           {  
                alert("Enter pname");  
                return false;  
           }  
		     if(price == '')  
           {  
                alert("Enter price ");  
                return false;  
           }  
		     if(quantity == '')  
           {  
                alert("Enter quantity");  
                return false;  
           }  
		      if(image == '')  
           {  
                alert("Enter image");  
                return false;  
           }  
		    if(team_id == '')  
           {  
                alert("Enter team_id");  
                return false;  
           }  
           $.ajax({  
                url:"insert.php",  
                method:"POST",  
                data:{ pname:pname, price:price,quantity:quantity, image:image, team_id:team_id},  
                dataType:"text",  
                success:function(data)  
                {  
                     alert(data);  
                     fetch_data();  
                }  
           })  
      });  
      function edit_data(pid, text, column_name)  
      {  
           $.ajax({  
                url:"edit.php",  
                method:"POST",  
                data:{pid:pid, text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data){  
                     /*alert(data);*/  
                }  
           });  
      }  
      $(document).on('blur', '.pname', function(){  
	  
           var pid = $(this).data("id1");  
           var pname = $(this).text();  
           edit_data(pid, pname, "pname");  
		    if(pname == '')  
           {  
                alert("Enter product name");  
                return false;
		   }
		   
      });  
      $(document).on('blur', '.price', function(){  
           var pid = $(this).data("id2");  
           var price = $(this).text();  
           edit_data(price,price, "item_price"); 
 if(price == '')  
           {  
                alert("Enter product price");  
                return false;  
           }  		   
      });  
	   $(document).on('blur', '.quantity', function(){  
           var pid = $(this).data("id3");  
           var quantity = $(this).text();  
           edit_data(item_id, quantity, "quantity");
 if(qauntity == '')  
           {  
                alert("Enter item quantity");  
                return false;  
           }  		   
      });  
	   $(document).on('blur', '.image', function(){  
           var pid = $(this).data("id4");  
           var image = $(this).text();  
           edit_data(pid, image, "image");  
		   if(image == '')  
           {  
                alert("Enter item avail");  
                return false;  
           }  
      });  
	 
      $(document).on('click', '.btn_delete', function(){  
           var pid=$(this).data("id5");  
           if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                     url:"delete.php",  
                     method:"POST",  
                     data:{pid:pid},  
                     dataType:"text",  
                     success:function(data){  
                          alert(data);  
                          fetch_data();  
                     }  
                });  
           }  
      });  
    
 });  
 </script>
	</section><!--  end hero  -->



	</body>
</html>