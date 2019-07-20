<?php

$servername = "localhost";
$username = "";
$password = "";

$dbname = "trishul";

$connection = mysqli_connect($servername, $username, $password, $dbname);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

?>