<?php
    $showAlert = false;
    $showError = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        include 'controllers/_dbconnect.php';
        $username = $_POST["username"];
        $password = $_POST["password"];
        $vpassword = $_POST["vpassword"];

        // Check whether the username exists in the db:
        $existSql = "SELECT * FROM `users` WHERE `username` = '$username'"; 
        $result = mysqli_query ($conn, $existSql);
        $numExists = mysqli_num_rows ($result);
        if ($numExists > 0) {
            $showError = "The user already Exists.";
        }
        else {
            // Inserting the required data after comparing passwords
            if (($password == $vpassword)) {
                $hash = password_hash ($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO `users` (`username`, `password`, `date`, `isAdmin`) VALUES ('$username', '$hash', current_timestamp(), '1') ";
                $result = mysqli_query ($conn, $sql);
                if ($result) {
                    $showAlert = true;
                    header ("Refresh:3, url=index.php", true, 303);
                }
            }
            else {
                $showError = "Passwords doesn't match.";
            }
        }
    }      
?>