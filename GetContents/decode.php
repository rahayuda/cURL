<?php
$host_name  = "localhost";
$port       = "3307"; 
$user_name  = "root";
$password   = "maria";
$database   = "db1";

$con = mysqli_connect($host_name . ":" . $port, $user_name, $password);
$sdb = mysqli_select_db($con, $database);
?>

<h2><b>Request</b></h2>
<hr>

<a class="btn btn-primary btn-sm" href="decode.php" role="button">Request</a>
<br><br>

<?php

$profile_json = file_get_contents("https://raw.githubusercontent.com/rahayuda/cURL/main/mahasiswa.json");

$profile = json_decode($profile_json, TRUE);

$id     = array_column($profile, 'id');
$nim    = array_column($profile, 'nim');
$nama   = array_column($profile, 'nama');
$email  = array_column($profile, 'alamat');
$last   = count($id);

for ($x = 0; $x < $last; $x++) 
{
    $list   = mysqli_query($con,"SELECT * FROM mahasiswa WHERE nim = '$nim[$x]'");
    $dt     = mysqli_num_rows($list);

    if ($dt == 0)
    {
        $result = mysqli_query($con, "INSERT INTO mahasiswa (nim, nama, alamat) VALUES ('$nim[$x]', '$nama[$x]', '$email[$x]')");
        echo $nim[$x] . " " . $nama[$x] . " " .$email[$x]."<br>";
    }
    else
    {
        $result = mysqli_query($con, "UPDATE mahasiswa SET nama='$nama[$x]', alamat='$email[$x]' WHERE nim='$nim[$x]'");
    }
}

mysqli_close($con);
?>