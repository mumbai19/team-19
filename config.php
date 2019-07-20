<?php
$servername="localhost";
$username="root";
$password="";
$dbname="trishul";
$con=mysql_connect($servername,$username,$password,$dbname)
{
	if(!$con)
	{
		die("Connection failed: " . mysqli_connect_error());
	}
}

?>