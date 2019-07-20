<?php
 include 'config.php';
 $sql = "DELETE FROM product WHERE  pid =".$_POST["pid"];
 echo "testing" ;
 if(mysqli_query($conn, $sql)) 
 {  
      echo 'Data Deleted';  
 }  
 ?>