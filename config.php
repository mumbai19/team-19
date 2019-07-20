<?php
<<<<<<< HEAD
$servername = "localhost";
$username = "";
$password = "";
=======
$servername = "";
$username = "root";
$password = "";
>>>>>>> 160e956aaab3e15abb6d68c918e7b15632b85926
$dbname = "trishul";

$connection = mysqli_connect($servername, $username, $password, $dbname);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
<<<<<<< HEAD
//echo "Connected successfully";
=======
>>>>>>> 160e956aaab3e15abb6d68c918e7b15632b85926
?>