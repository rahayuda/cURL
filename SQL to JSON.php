<?php
$user_name 	= "root";
$password	= "";
$database	= "kampus";
$host_name	= "localhost";

$con 	= mysqli_connect($host_name,$user_name,$password);
$kampus = mysqli_select_db($con,$database);

	$result 	= mysqli_query($con,"SELECT * FROM mahasiswa");

    //create an array
    $emparray 	= array();
    while($row 	= mysqli_fetch_assoc($result))
    {
        $emparray[] = $row;
    }
	
	$jsonfile = json_encode($emparray, JSON_PRETTY_PRINT);

	file_put_contents("api/mahasiswa.json", $jsonfile);
?>