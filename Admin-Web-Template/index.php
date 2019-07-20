<?php include('../config.php'); ?>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title></title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
<!--  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">-->
   <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    
<script>
    $(document).ready(function() {
       var quantitiy=0;
        
        $(".quantity").change(function () {
            handleQty();
        });
    
       $('.quantity-right-plus').click(function(e){

            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());

            // If is not undefined

                $('#quantity').val(quantity + 1);


                // Increment
           handleQty();

        });

         $('.quantity-left-minus').click(function(e){
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());

            // If is not undefined

                // Increment
                if(quantity>0){
                    $('#quantity').val(quantity - 1);
                }
             handleQty();
        }); 
    });
    
    function handleQty() {
        var qty = $("#quantity").val();
        var bulkSelected = false;
        if (qty > 50) {
            bulkSelected = true;
        }
        else {
            bulkSelected = false;
        }

        toggleCartButton(bulkSelected);
    }
    
    function toggleCartButton(bulkSelected) {
        if (bulkSelected) {
            $(".addToCart").addClass('disabled');
        }
        else {
            $(".addToCart").removeClass('disabled');
        }
    }
    
    
    </script>


</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include_once("sidebar.php"); ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php   include_once("navbar.php");  ?>
        <!-- End of Topbar -->
        
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
           <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
           --></div>

          <div class="row mt-3">
           <?php 
              $sqlgetall = "SELECT * FROM product";
                if ($res = mysqli_query($conn, $sqlgetall)) { 
                  if (mysqli_num_rows($res) > 0) { 
                    while ($row = mysqli_fetch_array($res)) { ?>  
           <div class="card-block mr-4 border" style="width: 18rem;">
                <img src="<?php echo $row['image']; ?>" class="card-img-top" alt="...">
                <div class="card-body" style="diplay:inline-block">
                <h5 class="card-title"><a href="ProductDetails.php?productID=<?php echo $row['pid']; ?>"><?php echo $row['pname']; ?></a></h5>
                <p class="card-text">₹<?php echo $row['price'] ?></p>
                <div class="row" style="justify-content: center">
                <a href="#" class="btn btn-primary mr-2">Buy Now</a>
                <a id="cart-<?php echo $row['pid']; ?>" class="addToCart btn btn-primary"><i class="fas fa-shopping-cart fa-fw"></i></a> 
                <div style="margin: 10px">
                                        <div class="input-group" style="width: 15rem;">
                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-left-minus btn btn-lg btn-danger btn-number"  data-type="minus" data-field="">
                                          <i class="fa fa-minus"></i>
                                        </button>
                                    </span>
                                    <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-right-plus btn btn-lg btn-success btn-number" data-type="plus" data-field="">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </span>
                                </div>
                        </div> 
              </div>
            </div>
            </div>
     <?php       }
              }
          } ?>
          </div>
          
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>

    </div>

  </div>
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
<!--  <script src="vendor/jquery/jquery.min.js"></script>-->
  
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
  <script src="cart.js"></script>

</body>

</html>
