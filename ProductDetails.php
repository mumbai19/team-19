<!DOCTYPE html>
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
    
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.1/js/bootstrap.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <!-- Custom styles for this template-->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="Admin-Web-Template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link href="Admin-Web-Template/css/sb-admin-2.min.css" rel="stylesheet">
    
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
 <?php include_once("Admin-Web-Template/sidebar.php"); ?>
        
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content" width ="width: 100%;">
                <div class="container-fluid" style="font-size: 18px !important;padding-left:0px">
                    <?php   include_once("Admin-Web-Template/navbar.php");  ?>
    <div class="content-wrapper">	
		<div class="item-container">	
			<div class="container">	
				<div class="col-md-12">
					<div class="product col-md-3 service-image-left">
                    
						<center>
							<img id="item-display" src="data:image/jpeg;base64,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"" alt=""></img>
						</center>
					</div>
					
					<div class="container service1-items col-sm-2 col-md-2 pull-left">
						<center>
							<a id="item-1" class="service1-item">
								<img src="http://www.corsair.com/Media/catalog/product/g/s/gs600_psu_sideview_blue_2.png" alt=""></img>
							</a>
							<a id="item-2" class="service1-item">
								<img src="http://www.corsair.com/Media/catalog/product/g/s/gs600_psu_sideview_blue_2.png" alt=""></img>
							</a>
							<a id="item-3" class="service1-item">
								<img src="http://www.corsair.com/Media/catalog/product/g/s/gs600_psu_sideview_blue_2.png" alt=""></img>
							</a>
						</center>
					</div>
				</div>
					
				<div class="col-md-7">
					<div class="product-title">Beaded Bag</div>
					<div class="product-desc"></div>
					<div class="product-rating"><i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star-o"></i> </div>
					<hr>
					<div class="product-price">Rs. 1230.00</div>
					<div class="product-stock">In Stock</div>
					<hr>
					<div class="btn-group cart">
						<button id="cart-0" type="button" class="btn btn-success addToCart" style="margin: 10px">
							Add to cart 
						</button>
                        <button id="buyNow" type="button" class="btn btn-success" style="margin: 10px">
							Buy now 
						</button>
                        <div style="margin: 10px">
                                        <div class="input-group" style="width: 15rem;">
                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="">
                                          <span class="glyphicon glyphicon-minus"></span>
                                        </button>
                                    </span>
                                    <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
                                            <span class="glyphicon glyphicon-plus"></span>
                                        </button>
                                    </span>
                                </div>
                        </div>
                        
					</div>
					<div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="bulk">
                        <label class="custom-control-label" for="bulk">Bulk</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="custom">
                        <label class="custom-control-label" for="custom">Customize</label>
                    </div>
				</div>
			</div> 
		</div>
		<div class="container-fluid" style="font-size: 18px !important;">		
			<div class="col-md-12 product-info" style="margin-top: 2rem;">
					<ul id="myTab" class="nav nav-tabs nav_tabs">
						
						<li class="active"><a href="#service-one" data-toggle="tab">DESCRIPTION</a></li>
						<li><a href="#service-two" data-toggle="tab">PRODUCT INFO</a></li>
						<li><a href="#service-three" data-toggle="tab">REVIEWS</a></li>
						
					</ul>
				<div id="myTabContent" class="tab-content">
						<div class="tab-pane fade in active" id="service-one">
						 
							<section class="container product-info" id="prodDescription">
								
							</section>
										  
						</div>
					<div class="tab-pane fade" id="service-two">
						
						<section class="container">
								
						</section>
						
					</div>
					<div class="tab-pane fade" id="service-three">
												
					</div>
				</div>
				<hr>
			</div>
		</div>
	</div>
</div>
            </div>
        
                            
            <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2019</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
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
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Custom scripts for current pages-->
    <script src="js/product_details.js"></script>
    <script src="js/cart.js"></script>

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

    <!-- Page level plugins -->
    <!--<script src="vendor/chart.js/Chart.min.js"></script>-->
    <!-- Page level custom scripts -->
    <!--<script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>-->



</body>

</html>
