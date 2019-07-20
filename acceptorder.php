<?php

include_once("config.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="Admin-Web-Template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link href="Admin-Web-Template/css/sb-admin-2.min.css" rel="stylesheet">
    </head>
    <body>
       
       <div id="wrapper">
    
            <!-- Navigation -->
   <?php include_once("sidebar.php"); ?>
           
   
            <!-- Page Content -->
            <div id="page-wrapper" style="width:100%;">
               <?php   include_once("navbar.php");  ?>
               <div class="container">
          <h1>Pending Orders</h1>
          <?php  
            $query="select * from product,order_master,order_product_mapping,customer where order_master.order_id=order_product_mapping.order_id and order_product_mapping.product_id=product.pid and order_master.cb_flag=1 and customer.customer_id=order_master.customer_id and order_master.order_status=0";
            $result=mysqli_query($conn,$query);
            
            while($row=mysqli_fetch_assoc($result))
            {
             echo "<div class='row' style='background-color:#efefef;margin-bottom:10px;'>
            <div class='col-sm-2' style='background-color:#fff;'>
              <p class='float-left'>".$row['pname']."/".$row['customer_name']."</p>
            </div>
            <div class='col-sm-2' style='background-color:#fff;'>
              <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#myModal'>Change Quantity/Price
              </button>
            </div>
            <div class='col-sm-2' style='background-color:#fff;'>
              <p class='float-right' style='line-height:100%;'>Price:".$row['total']."</p>
            </div>
            <div class='col-sm-2' style='background-color:#fff;'>
              <p class='float-right' style='line-height:100%;'>Quantity:".$row['quantity']."</p>
            </div>
            <div class='col-sm-2' style='background-color:#fff;'>
              <p class='float-right' style='line-height:100%;'><a href='approveorder.php?id=".$row['order_id']."'><i class='fa fa-check' style='color:green'></i>Approve</a></p>
            </div>
            <div class='col-sm-2' style='background-color:#fff;'>
                <p class='float-right' style='line-height:100%;'><a href='declineorder.php?id=".$row['order_id']."'><i class='fa fa-trash' style='color:red'></i>Decline</a></p>
            </div>
            
          </div>
          
          <div class='modal' id='myModal'>
                <div class='modal-dialog'>
                  <div class='modal-content'>

                    <!-- Modal Header -->
                    <div class='modal-header'>
                      <h4 class='modal-title'>Changes to Price and Quantity</h4>
                      <button type='button' class='close' data-dismiss='modal'>&times;</button>
                    </div>

                    <!-- Modal body -->
                    <form action='changeorder.php?id=".$row['order_id']."' method=post>
                        <div class='modal-body'>
                              <input class='form-control' name='quantity' type='text' placeholder='Quantity'>
                              <br>
                              <input class='form-control' name='price' type='text' placeholder='Price'>
                        </div>

                    <!-- Modal footer -->
                    <div class='modal-footer'>
                      <button type='submit' name='submit' class='btn btn-danger'>Save</button>
                    </div>
                    </form>

                  </div>
                </div>
              </div>
          ";
            }
                ?>
                
                
                
               
               
            
               
                
        
        </div>


                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>
       
       
            <script src="hide.js"></script>
   
    </body>
</html>

