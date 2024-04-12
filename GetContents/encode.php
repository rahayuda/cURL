<?php
$host_name  = "localhost";
$port       = "3307"; 
$user_name  = "root";
$password   = "maria";
$database   = "db1";

$con = mysqli_connect($host_name . ":" . $port, $user_name, $password);
$sdb = mysqli_select_db($con, $database);

$result = mysqli_query($con, "SELECT * FROM table1");

$emparray = array();
while ($row = mysqli_fetch_assoc($result)) {
	$emparray[] = $row;
}

$jsonfile = json_encode($emparray, JSON_PRETTY_PRINT);
file_put_contents("api/tb1.json", $jsonfile);

mysqli_close($con);
?>