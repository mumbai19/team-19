<?php 
    include('../config.php');
    $json = file_get_contents('php://input');
    
    $obj = json_decode($json);
    if(!is_null($obj))
    {
        $apikey = $obj->{'apikey'};
        $username = $obj->{'apikey'};
        $amount = $obj->{'apikey'};
        $transactionid = $obj->{'apikey'};

        $sql = "SELECT * FROM apikeys WHERE apikey = '$apikey'";
        if($result = mysqli_query($link, $sql)){
            if(mysqli_num_rows($result) == 1){
                $sqlinsert = "INSERT INTO transactions VALUES(?, ?, ?, ?)";
                if(mysqli_query($sqlinsert))
                {
                    $response = array("message"=>"successful");
                }
            }
        }    


        echo json_encode($response);

        
    }
?>





