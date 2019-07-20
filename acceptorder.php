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
    </head>
    <body>
        <div class="container">
          <h1>Pending Orders</h1>
          <?php  
            $query="select * from product,order_master,order_product_mapping,customer where order_master.order_id=order_product_mapping.order_id and order_product_mapping.product_id=product.pid and order_master.cb_flag=1 and customer.customer_id=order_master.customer_id and order_master.order_status=0";
            $result=mysqli_query($connection,$query);
            
            while($row=mysqli_fetch_assoc($result))
            {
             echo "<div class='row' style='background-color:#efefef;'>
            <div class='col-sm-2' style='background-color:#eee;'>
              <p class='float-left'>".$row['pname']."/".$row['customer_name']."</p>
            </div>
            <div class='col-sm-2' style='background-color:#eee;'>
              <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#myModal'>Change Quantity/Price
              </button>
            </div>
            <div class='col-sm-2' style='background-color:#eee;'>
              <p class='float-right' style='line-height:100%;'>".$row['price']."</p>
            </div>
            <div class='col-sm-2' style='background-color:#eee;'>
              <p class='float-right' style='line-height:100%;'>".$row['quantity']."</p>
            </div>
            <div class='col-sm-2' style='background-color:#eee;'>
              <p class='float-right' style='line-height:100%;'><a href='approveorder.php?id=".$row['order_id']."'><i class='fa fa-check' style='color:green'></i>Approve</a></p>
            </div>
            <div class='col-sm-2' style='background-color:#eee;'>
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

    <script src="hide.js"></script>
   
    </body>
</html>

