<!-- calling required files to check vehicle booking status -->
<?php
    require_once 'controllers/_booked.php'
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <title>Cars Booked</title>
</head>
<body>
    <!-- including the Navigation Bar -->
    <?php require 'controllers/_navbar.php' ?>

    <!-- booking information table body -->
    <div class="container border border-dark ">
        <h2 class="my-4 text-center">BOOKING INFORMATION</h2>
        <table class="table table-striped text-center">
            <tr class="bg-dark">
                <td class="col-3 border border-dark fs-5">Vehicle</td>
                <td class="col-3 border border-dark fs-5">Number</td>
                <td class="col-3 border border-dark fs-5">Username</td>
                <td class="col-3 border border-dark fs-5">Booked On</td>
            </tr>
            <tr class="">
            
            <!-- populating dynamic data from the database -->
            <?php
            if ($isAdmin) {
                while ($row = mysqli_fetch_assoc ($result)) {
            ?>
                <td class="border border-dark-subtle p-3"><?php echo $row['model'] ?></td>
                <td class="border border-dark-subtle p-3"><?php echo $row['regnumber'] ?></td>
                <td class="border border-dark-subtle p-3"><?php echo $row['isAllotted'] ?></td>
                <td class="border border-dark-subtle p-3">
                <?php
                // Formatting of Date and Time
                $dt = $row['startdate'];
                $formatted = date('d-M-Y  h:i A', strtotime($dt));
                echo $formatted;
                ?></td>
            </tr>
            
            <?php
                }
            }
            ?>
        </table>

        <!-- functional buttons -->
        <div class="text-center">
        <a href="booked.php">
            <button type="button" class="btn btn-outline-success m-4 p-2 col-2 text-center">REFRESH</button>
        </a>
        <a href="home.php">
            <button type="button" class="btn btn-outline-dark m-4 p-2 col-2 text-center">BACK TO HOME</button>
        </a>
        </div>
    </div>

     <!-- Optional JS apis -->
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>