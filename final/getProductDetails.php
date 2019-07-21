<?php include 'config.php'?>
<?php

$productID = $_GET['productID'];

if(!empty($productID)){
    
    //get user data from the database
    $query = $conn->query("SELECT * FROM product WHERE pid = '$productID'");
    
    if($query->num_rows > 0){
        $userData = $query->fetch_assoc();
        $data['status'] = 'ok';
        $data['result'] = $userData;
    }else{
        $data['status'] = 'err';
        $data['result'] = '';
    }
    
    //returns data as JSON format
    echo json_encode($data);
}
?>