<?php
// connecting the database
require_once 'controllers/_dbconnect.php';

$loggedIn = false;
session_start();
$loggedIn = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;
$isAdmin = false;

// check if the logged in user is Admin
if ($loggedIn) {
    $usrName = $_SESSION['username'];
    $adminSql = "SELECT `isAdmin` FROM `users` WHERE `username` = '$usrName' AND `isAdmin` = 1";
    $adminRes = mysqli_query($conn, $adminSql);
    $isAdmin = mysqli_num_rows($adminRes) > 0;
}

// Handling Add operation
if ($_SERVER["REQUEST_METHOD"] == "POST" && $isAdmin && isset($_POST['add'])) {
    // retrieving form data
    $model = $_POST['model'];
    $regNumber = $_POST['regNumber'];
    $seat = $_POST['seat'];
    $rent = $_POST['rent'];

    $addSql = "INSERT INTO `vehicle` (`model`, `regnumber`, `seat`, `rent`) VALUES ('$model', '$regNumber', '$seat', '$rent')";
    $addRes = mysqli_query ($conn, $addSql);
    
    if ($addRes) {
        echo 'Vehicle Information Added Successfully';
    }
    else {
        echo 'Failed to add vehicle information';
    }
}

// Handling Edit operation
if ($_SERVER["REQUEST_METHOD"] == "POST" && $isAdmin && isset($_POST['update'])) {
    // retrieving form data
    $searchNum = $_POST['searchNum'];
    $newModel = $_POST['newModel'];
    $newRegNumber = $_POST['newRegNumber'];
    $newSeat = $_POST['newSeat'];
    $newRent = $_POST['newRent'];

    // building the database and making parameters
    $updateSql = "UPDATE `vehicle` SET ";
    $updates = array();
    
    if (!empty($newModel)) {
        $updates[] = "`model` = '$newModel'";
    }
    if (!empty($newRegNumber)) {
        $updates[] = "`regnumber` = '$newRegNumber'";
    }
    if (!empty($newSeat)) {
        $updates[] = "`seat` = '$newSeat'";
    }
    if (!empty($newRent)) {
        $updates[] = "`rent` = '$newRent'";
    }
    
    if (!empty($updates)) {
        $updateSql .= implode(", ", $updates);
        $updateSql .= " WHERE `regnumber` = '$searchNum'";
    }
        
    $updateRes = mysqli_query ($conn, $updateSql);
    
    if ($updateRes) {
        echo 'Vehicle Information Updated Successfully';
    }
    else {
        echo 'Failed to update vehicle information';
    }
}

// Handling Delete operation
if ($_SERVER["REQUEST_METHOD"] == "POST" && $isAdmin && isset($_POST['delete'])) {
    // retrieving form data
    $searchNum = $_POST['regNumber'];
    
    // deleting the data from database
    $delSql = "DELETE FROM `vehicle` WHERE `regnumber`='$searchNum'";
    $delRes = mysqli_query ($conn, $delSql);
    
    if ($delRes) {
        echo 'Vehicle Information Deleted Successfully';
    }
    else {
        echo 'Failed to delete vehicle information';
    }
}
?>