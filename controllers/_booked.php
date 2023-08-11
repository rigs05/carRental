<?php
// including the database credentials
require_once 'controllers/_dbconnect.php';

$loggedIn = false;
session_start();
$loggedIn = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;
$isAdmin = false;

// condition to check if the user logged in is Admin
if ($loggedIn) {
    $usrName = $_SESSION['username'];
    $adminSql = "SELECT `isAdmin` FROM `users` WHERE `username` = '$usrName' AND `isAdmin` = 1";
    $adminRes = mysqli_query($conn, $adminSql);
    $isAdmin = mysqli_num_rows($adminRes) > 0;
}

// Query to select required rows from the database
$query = "SELECT * FROM `vehicle`";
$result = mysqli_query ($conn, $query);
?>