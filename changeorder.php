<?php

include_once("config.php");
if(isset($_POST['submit']))
{
    $quan=$_POST['quantity'];
    $price=$_POST['price'];
<<<<<<< HEAD
$query="update order_product_mapping set qty=$quan where order_id=".$_GET['id'];
=======
$query="update order_quantity set quantity=$quan where order_id=".$_GET['id'];
>>>>>>> adf98983641cb84389676c5e9a07d76a34ae4b5a
 $result=mysqli_query($conn,$query);
    echo $query;
    $query="update order_master set total=$price where order_id=".$_GET['id'];
 $result=mysqli_query($conn,$query);
echo "done";
header("Location: acceptorder.php");
}
?>