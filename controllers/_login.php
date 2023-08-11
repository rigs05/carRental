<?php
    $login = false;
    $showError = false;

    // check for username and password and starts the session
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include 'controllers/_dbconnect.php';
        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM  `users` WHERE `username`='$username' ";
        $result = mysqli_query ($conn, $sql);
        $num = mysqli_num_rows ($result);
        if ($num == 1) {
            // verifying password hash with the saved one
            while ($row = mysqli_fetch_assoc ($result)) {
                if (password_verify ($password, $row['password'])) {
                    $login = true;
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['shAlert'] = false;
                    $_SESSION['username'] = $username;
                    header ("location: home.php");
                }
                else {
                    $showError = "Invalid Credentials, please try again.";
                }
            }
        }
        else {
            $showError = "The User does not exist, please make a new account to continue.";
        }
    }
?>