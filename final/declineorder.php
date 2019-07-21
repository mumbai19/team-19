<?php

include_once("config.php");
$query="update order_master set order_status=-1 where order_id=".$_GET['id'];
 $result=mysqli_query($conn,$query);
//echo "done";
header("Location: acceptorder.php");
?>