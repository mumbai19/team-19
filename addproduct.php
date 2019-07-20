<?php
include 'config.php';
 
 
	if(isset($_POST["submit"]))
	{
		$pname=$_POST["product_name"];
	$price=$_POST["price"];
		$qty=$_POST["quantity"];
		$teamid=1;
		$filename="";
		
	if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["photo"]["name"];
        $filetype = $_FILES["photo"]["type"];
        $filesize = $_FILES["photo"]["size"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
    
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists("upload/" . $filename)){
                echo $filename . " is already exists.";
            } else{
                move_uploaded_file($_FILES["photo"]["tmp_name"], "upload/" . $filename);
                echo "Your file was uploaded successfully.";
            } 
        } else{
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } else{
        echo "Error: " . $_FILES["photo"]["error"];
    }
	$image="upload/".$filename;
	
	$sql = "insert into product(pname,price,quantity,image,team_id) values('$pname',$price,$qty,'$image',$teamid)";  
 //$result = mysqli_query($conn, $sql);  
 if(mysqli_query($conn, $sql)) 
 {  
      echo 'Data inserted';  
 }  
 else{
     echo"<script type='text/javascript'>alert('issue');</script>";
 }
}
	

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
<<<<<<< HEAD
   <?php include_once("Admin-Web-Template/sidebar.php"); ?>
=======
   <?php include_once("Admin-Web-Template/admin_sidebar.php"); ?>
>>>>>>> d5352549590e6e8cfee2e9311f06e08265d18053
           
   
            <!-- Page Content -->
            <div id="page-wrapper" style="width:100%;">
<<<<<<< HEAD
               <?php   include_once("Admin-Web-Template/navbar.php");  ?>
=======
               <?php   include_once("Admin-Web-Template/admin_navbar.php");  ?>
>>>>>>> d5352549590e6e8cfee2e9311f06e08265d18053
               
                <div class="container">
                   
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Add a Product:</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
<!--                    form begins-->
               <form  method="post" enctype="multipart/form-data">
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
                                    <input type="file" id="photo" name="photo">
                                </div>

                            </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn btn-warning" name="submit" id="submit" style="margin-bottom:40px;margin-left:150px;">Save</button>
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
