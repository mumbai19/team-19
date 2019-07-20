<?php
 include 'config.php';
 $sql = "DELETE FROM product WHERE  pid =".$_POST["pid"];
 if(mysqli_query($conn, $sql)) 
 {  
      echo 'Data Deleted';  
 }  
 ?>