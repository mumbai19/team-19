<?php
include 'config.php'
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        
        <!-- Bootstrap Core CSS -->
       
        
      
      
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
        
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>


    <!--Data Table-->
    <script type="text/javascript"  src=" https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript"  src=" https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>

    <!--Export table buttons-->
    <script type="text/javascript"  src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.24/build/pdfmake.min.js" ></script>
    <script type="text/javascript"  src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.24/build/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.1/js/buttons.print.min.js"></script>

<!--Export table button CSS-->

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css">
  
        
        <script>
            $(document).ready(function() {
    $('#tbldata').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
} );
        </script>

	<!--  start hero  -->
	<style>
	#tbldata {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
	}
	#tbldata td, #tbldata th {
    border: 0px solid #ddd;
    padding: 13px;
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

        <div id="wrapper">
    
            <!-- Navigation -->
   <?php include_once("admin_sidebar.php"); ?>
           
   
            <!-- Page Content -->
            <div id="page-wrapper" style="width:100%;">
               <?php   include_once("admin_navbar.php");  ?>
               
                <div class="container">
<table id="tbldata" class="table table-bordered">
    <thead>
        <tr>
                <th><strong>ORDER ID</th>
                <th><strong>ORDER_DATE</th>
                <th><strong>PRODUCT</th>
                <th><strong>FINAL PRICE</th>
                <th><strong>STATUS</th>
            </tr>
    </thead>
    <tbody>
            
	
	<?php
	$flag=$_GET["cb_flag"];
       //getting the order Id
	    $sql="SELECT * FROM `order_master` where order_status=$flag"; 
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result))
    {
        $order_id=$row['order_id'];
		$order_date=$row['order_date'];
        $total=$row['total'];
        $cb_flag=$row['cb_flag'];
        $order_status=$row['order_status'];
	
    ?>
        <tr>
            <td><?=$order_id;?></td>
            <td><?=$order_date?></td>
            <td>
            <table>
            <tr>
                <td>Product Name</td>
                <td>Price</td>
                <td>Quantity</td>
            </tr>   
    <?php
	$sql="SELECT product.pname,product.price,order_product_mapping.qty from order_product_mapping,order_master,product WHERE product.pid=order_product_mapping.product_id and order_master.order_id=order_product_mapping.order_id and order_master.order_id";
          //getting the list of items of the specific order id
        $result2 = mysqli_query($conn,$sql);
        while($row2 = mysqli_fetch_assoc($result2))
        {
            $pname=$row2['pname'];
            $price=$row2['price'];
            $quantity=$row2['qty'];
            //$team_id=$row2['team_id'];

        ?>
            
            
            <tr>
            <td><?=$pname?></td>
            <td><?=$price?></td>
            <td><?=$quantity?></td>
           
            <tr>
            
           
        <?php
        }?>
            </table>
            </td>
            <td><?=$total?></td>
			<?php if($order_status == 0)
			{ 
            echo "<td>Pending</td>";
			} 
			 elseif($order_status == 1)
			 {
				
				echo "<td>Confirmed</td>";
			 }
			 elseif($order_status == -1)
			 {
				echo"<td>Declined</td>";
			 }
			elseif($order_status == 2)
			{
			
				echo"<td>negotiating</td>";
		 }
?>		 
            </tr>
    <?php
    }?>
        
    </tbody>
</table>

<!--  end hero  -->

  </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->


        <!-- Bootstrap Core JavaScript -->
        
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.5.1/js/fileinput.min.js"></script>-->
<!--       <script src="../../plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>-->
       <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.5.1/js/fileinput.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        

    </body>
</html>
