<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        
        <!-- Bootstrap Core CSS -->
       
        
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.5.1/css/fileinput-rtl.min.css" />
      
    <link rel="stylesheet" href="../../plugins/bootstrap-fileinput/bootstrap-fileinput.css">
      
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="Admin-Web-Template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link href="Admin-Web-Template/css/sb-admin-2.min.css" rel="stylesheet">
        
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
       
    </head>
    <body>

        <div id="wrapper">
    
            <!-- Navigation -->
   <?php include_once("Admin-Web-Template/admin_sidebar.php"); ?>
           
   
            <!-- Page Content -->
            <div id="page-wrapper" style="width:100%;">
               <?php   include_once("Admin-Web-Template/admin_navbar.php");  ?>
               <div class="container">
			   <div class="table-responsive">  
                     
                     <div id="live_data"></div>                 
                </div>  
				</div>
				</div>
				
				
				
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
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.5.1/js/fileinput.min.js"></script>
	</body>
	</head>
	</html>