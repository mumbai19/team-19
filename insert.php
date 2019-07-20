<?php  
include 'config.php';
 $name=$_POST['pname'];
 $price=$_POST["price"];
 $quantity=$_POST["quantity"];
 $image=$_POST["image"];
 $team_id=$_POST["team_id"];


 $sql = "INSERT INTO product(pname,price,quantity,image,team_id) VALUES('$name',$price,$quantity,'$image',$team_id)";  

 if(mysqli_query($conn, $sql))  
 {  
      echo 'Data Inserted';  
 }  
 else
	
	{
		echo mysqli_error($conn);
	}
 ?> 