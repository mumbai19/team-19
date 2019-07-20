<?php
$servername = "localhost";
$username = "";
$password = "";
$dbname = "trishul";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
