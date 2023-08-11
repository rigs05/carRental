<!-- Database Credentials -->

<?php 
$server = "localhost";
$username = "sunny";
$password = "N3wP@ss";
$database = "agency";

$conn = mysqli_connect ($server, $username, $password, $database);
if (!$conn)
    die ("error".mysqli_connect_error());
?>
