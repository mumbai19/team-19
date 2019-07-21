<?php

require_once('config.php');

$sqlQuery = "SELECT count(order_product_mapping.order_id) as products,region FROM `team`,product,order_product_mapping where product.team_id=team.team_id and product.pid=order_product_mapping.product_id GROUP BY team.region";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}



echo json_encode($data);
?>