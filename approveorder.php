<?php

include_once("config.php");
<<<<<<< HEAD
$query="update order_master set order_status=1 where order_id=".$_GET['id'];
=======
$query="update order_master set order_status=2 where order_id=".$_GET['id'];
>>>>>>> adf98983641cb84389676c5e9a07d76a34ae4b5a
 $result=mysqli_query($conn,$query);
//echo "done";
header("Location: acceptorder.php");
?>