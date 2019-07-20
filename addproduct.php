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
        
        
       
    </head>
    <body>

        <div id="wrapper">
    
            <!-- Navigation -->
   <?php include_once("Admin-Web-Template/sidebar.php"); ?>
           
   
            <!-- Page Content -->
            <div id="page-wrapper" style="width:100%;">
               <?php   include_once("Admin-Web-Template/navbar.php");  ?>
               
                <div class="container">
                   
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Add a Product:</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
<!--                    form begins-->
               <form action="http://localhost/movie_booking/startmin-master/pages/addmovie.php" method="post" enctype="multipart/form-data">
                   <div class="form-body">
                       <div class="row" style="margin-bottom:20px;">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label col-md-4">Product Name
                <span class="required"> * </span>
                </label>
                                    <div class="col-md-8">
                                        <input type="text" name="product_name" class="form-control" placeholder="Product Name" /> </div>
                                </div>
                            </div>
                           
                        </div>
                        
                        <div class="row" style="margin-bottom:20px;">
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Price</label>
                                    <div class="col-md-8">
                                        <input type="text" name="price" class="form-control" placeholder="price" />
                                    </div>
                                </div>
                            </div>
                       </div>
                       
                       <div class="row" style="margin-bottom:20px;">
                             <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Quantity</label>
                                    <div class="col-md-8">
                                        <input type="text" name="quantity" class="form-control" placeholder="quantity" />
                                    </div>
                                </div>
                            </div>
                       </div>
                   </div>
                    
                        
                        
                        
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group last">
                                    <label class="control-label col-md-2">Product Image</label>
                                    <input type="file">
                                </div>

                            </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn btn-warning" name="add_movie" style="margin-bottom:40px;margin-left:150px;">Save</button>
                            </div>
                        </div>
                    </div>
                        
                  
                   </div>
               </form>
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
