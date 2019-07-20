<?php include 'config.php'?>
<?php

$productID = $_GET['productID'];
$cbFlag = $_GET['cbFlag'];
$qty = $_GET['qty'];
$total = $_GET['total'];

if(!empty($productID)){
    
    //get user data from the database
    $sql1 = "INSERT INTO order_master (order_date,
     total,
     cb_flag,
     customer_id,
    order_status)
    VALUES
    (
        SYSDATE(),
        '$total',
        '$cbFlag',
        '1',
        '2',
    )";  
    $result1 = mysqli_query($conn, $sql1); 
    
    $orderID = mysqli_insert_id($conn);
    if($result1->num_rows > 0){
        $data['status'] = 'ok';
        $sql2 = "INSERT INTO order_product_mapping (order_id,
     product_id,
     qty)
    VALUES
    (
        '$orderID',
        '$productID',
        '$qty'
    )";  
        
    }else{
        $data['status'] = 'err';
    }
    
    //returns data as JSON format
    echo json_encode($data);
}
?>