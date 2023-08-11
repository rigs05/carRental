<!-- calling required files to display homepage -->
<?php
require_once 'controllers/_homepage.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>HomePage</title>
</head>
<body>
    <!-- Including the Navigation bar -->
    <?php require 'controllers/_navbar.php' ?>
    
    <!-- Logged in alert (FOR LATER USE) -->
    <!-- <?php 
    // if ($loggedIn && isset($_SESSION['shAlert'])) {
    // echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    //     <strong>Success!</strong> Your are now logged in.
    //     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    // </div>';
    // $_SESSION['shAlert'] = false;
    // }
    // '</div>'; 
    ?> -->
    
    <!-- Welcoming the User when logged in or the Guest if accessing w/o logging in -->
    <h2 class="text-center mt-2 pt-2">Welcome  - 
    <?php
    if ($loggedIn) {
        echo $_SESSION['username'];
    }
    else {
    echo 'Guest'; 
    } ?>
    </h2>

    <!-- enabling additional buttons if the user logged in is Admin -->
    <?php
    if($isAdmin) {
        echo '<div class="d-flex justify-content-center">
        <a href="booked.php">
            <button type="button" class="btn btn-primary p-3 m-4 mx-5 text-center">Booking Information</button>
        </a>
        <a href="addCar.php">
            <button type="button" class="btn btn-warning p-3 m-4 mx-5 text-center">Add/Edit Inventory</button>
        </a>
        </div>';
    } ?>
        
    <!-- Dynamic fetching of data from database and posting booking information back to db -->
    <form action="home.php" method="post">
        <!-- Requirement of vehicle for required number of days -->
        <?php
        if ($loggedIn && !$isAdmin) {
            echo '<div id="days" class="text-center">
            <select class="mt-4" name="days" required>
                <option value="">Select Number of Days of Requirement</option>
                <option value="1">1 day</option>
                <option value="2">2 days</option>
                <option value="3">3 days</option>
                <option value="5">5 days</option>
                <option value="7">7 days</option>
                <option value="15">15 days</option>
                <option value="30">30 days</option>
                <option value="more_than_30">More than 30 days</option>
            </select>
        </div>';
        }
        ?>

        <!-- Dynamic Population of Data -->
        <div class="container-fluid my-2 p-3">
            <div class="row">
            <?php
            while ($item = mysqli_fetch_assoc($result)) {
                echo '<div class="col-md-4 col-sm-6 border border-dark-subtle my-2 p-2">';
            ?>
                    
                    <img src="support/car.jpg" alt="Vehicle Image" width="100%" height="300">
                    <h4 class="text-center"><span class="model"><?php echo $item['model']; ?></span></h4>
                    <h3 class="rent text-center"><em>Rs.<?php echo $item['rent']; ?>/day</em></h3>
                    <div class="text-center">
                        <span class="text-secondary mx-5"><?php echo $item['regnumber']; ?></span>
                        <em class="mx-5">Seating Capacity: <strong><span class="seat"><?php echo $item['seat']; ?></span></strong></em>
                    </div>
                    
                <?php
                // condition to check whether the User is logged in
                 if (!$loggedIn) {
                    echo '
                    <input type="hidden" name="btnRent" value="'.$item['sno'].'">
                    <button type="submit" class="btn btn-success mt-4 w-100" name="btnRent" value="'.$item['sno'].'">Rent This Car</button> ';
                }
                
                // to check if the logged in user is an Admin
                else {
                    if (!$isAdmin) {
                        echo '
                    <input type="hidden" name="btnRent" value="'.$item['sno'].'">
                    <button type="submit" class="btn btn-success mt-4 w-100" name="btnRent" id="'.$item['sno'].'" value="'.$item['sno'].'">Rent This Car</button> ';
                    }
                } ?>
            </div>

            <?php    
            }
            ?>
        </div>
    </form>

    <!-- Optional JS apis -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
