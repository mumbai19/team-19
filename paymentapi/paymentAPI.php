<?php 
    include(DBConnection.php);
    $json = file_get_contents('php://input');
    
    $obj = json_decode($json);
    if(!is_null($obj))
    {
        $apikey = $obj->{'apikey'};
        $username = $obj->{'apikey'};
        $username = $obj->{'apikey'};
        $username = $obj->{'apikey'};

        $sql = "SELECT * FROM apikeys WHERE apikey = '$apikey'";





        
    }
?>





