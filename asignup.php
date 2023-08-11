<!-- calling required file for agency/employee signup operations -->
<!-- Agency Signup can be accessed using URL only -->
<?php
    require_once 'controllers/_agencySignup.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <title>Agency Signup Page</title>
</head>
<body>
    <!-- including the Navigation Bar -->
    <?php require 'controllers/_navbar.php' ?>
    <?php

    // showing alerts for signup successful or error
    if ($showAlert) {
        echo
        '<div class="alert alert-success" role="alert">
            <strong>Success!</strong> Your account has been created, you can now login.
        </div>'
        ;
    }
    if ($showError) {
        echo
        '<div class="alert alert-danger" role="alert">
            <strong>Error!</strong> '.$showError.'
        </div>'
        ;
    }
    ?>

    <!-- signup form body -->
    <div class="container container-fluid">
        <h2 class="text-center m-2 p-2">Signup to our Website (AGENCY EMPLOYEES ONLY)</h2>
        <form action="asignup.php" method="post" class="mt-4 d-grid justify-content-center">
            <div class="container border border-dark">
                <div class="m-4 p-2">
                    <label name = "username" class="pb-3">Username</label>
                    <input type="text" id="username" name="username" class="form-control border-2" minlength=3 maxlength=15 required />
                </div>
                <div class="m-4 p-2">
                    <label name = "password" class="pb-3">Password</label>
                    <input type="password" id="password" name="password" class="form-control border-2" required />
                </div>
                <div class="m-4 p-2">
                    <label name = "vpassword" class="pb-3">Verify Password</label>
                    <input type="password" id="vpassword" name="vpassword" class="form-control border-2" required />
                </div>
                <div class="m-4 p-2">
                    <button type="submit" class="btn btn-success mx-3 px-3">Signup</button>
                    <button type="reset" class="btn btn-secondary mx-3 px-3">Reset</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Optional JS apis -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>