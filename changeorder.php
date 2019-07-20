<?php

include_once("config.php");
if(isset($_POST['submit']))
{
    $quan=$_POST['quantity'];
    $price=$_POST['price'];
$query="update order_quantity set quantity=$quan where order_id=".$_GET['id'];
 $result=mysqli_query($connection,$query);
    echo $query;
    $query="update order_master set total=$price where order_id=".$_GET['id'];
 $result=mysqli_query($connection,$query);
//echo "done";
//header("Location: acceptorder.php");
}
?>