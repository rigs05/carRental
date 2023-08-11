<?php
// connecting the database
require_once 'controllers/_dbconnect.php';

$loggedIn = false;
$sql = "SELECT * FROM vehicle";
$result = mysqli_query ($conn, $sql);

session_start();

// Check if user is logged in and is an Administrator
$loggedIn = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;
$isAdmin = false;

// check if the logged in user is Admin
if ($loggedIn) {
    $usrName = $_SESSION['username'];
    $adminSql = "SELECT `isAdmin` FROM `users` WHERE `username` = '$usrName' AND `isAdmin` = 1";
    $adminRes = mysqli_query($conn, $adminSql);
    $isAdmin = mysqli_num_rows($adminRes) > 0;
}

// Handle form implementation
if ($_SERVER["REQUEST_METHOD"] == "POST" && $loggedIn) {

// if any button is clicked while the user not logged in, it will redirect to the login page
     if (!$loggedIn) {
        header ("location: index.php");
}

// checking which button is clicked and inserting required information to the database
else if (isset($_POST['days']) && isset($_POST['btnRent'])) {
        $reqDays = $_POST['days'];
        $itemId = $_POST['btnRent'];

        $updateSql = "UPDATE `vehicle` SET `requiredays`='$reqDays', `startdate`=current_timestamp(), `isAllotted`='$usrName' WHERE `sno`='$itemId'";
        $updateRes = mysqli_query($conn, $updateSql);

        // Feedback to the user based on $updateRes
        if ($updateRes) {
            echo "Updated vehicle with sno $itemId";
        } else {
            echo "Failed to update vehicle with sno $itemId";
        }
    }
}
?>