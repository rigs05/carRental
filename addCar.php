<!-- calling required files to Add/Edit or Delete the vehicle information -->
<?php
    require_once 'controllers/_addCar.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Add New Cars</title>
</head>
<body>
    <!-- Including the Navigation bar -->
    <?php require 'controllers/_navbar.php' ?>

    <!-- CREATE ADD AND EDIT FORM -->
    <?php if ($isAdmin) {
    ?>
    <div class="container container-fluid">

        <!-- TO ADD VEHICLE INFORMATION -->
        <form action="addCar.php" method="post">
        <h2 class="text-center my-3">ADD NEW VEHICLE INFORMATION</h2>
            <div class="container container-fluid bg-info-subtle d-grid pt-3">
                <div class="row col-12 m-3 justify-content-center">
                    <label class="col-3" for="model" id="model">Vehicle Model</label>
                    <input class="col-4" name="model" value="" required />
                </div>
                <div class="row col-12 m-3 justify-content-center">
                    <label class="col-3" for="regNumber" id="regNumber">Vehicle Registration Number</label>
                    <input class="col-4" name="regNumber" value="" required />
                </div>
                <div class="row col-12 m-3 justify-content-center">
                    <label class="col-3" for="seat" id="seat">Seating Capacity</label>
                    <input class="col-4" name="seat" value="" required />
                </div>
                <div class="row col-12 m-3 justify-content-center">    
                    <label class="col-3" for="rent" id="rent">Rent per day</label>
                    <input class="col-4" name="rent" value="" required />
                </div>
                <div class="d-flex justify-content-center m-5">
                    <button type="submit" name="add" class="btn btn-primary mx-5 px-5 text-center">ADD</button>
                    <button type="reset" class="btn btn-secondary mx-5 px-5 text-center">RESET</button>
                </div>
            </div>
    </form>

        <br><br><br>

        <!-- TO EDIT/UPDATE VEHICLE INFORMATION -->
        <form action="addCar.php" method="post">
            <h2 class="text-center my-3">EDIT VEHICLE INFORMATION</h2>
            <div class="container container-fluid bg-success-subtle d-grid pt-3">
                <div class="row col-12 justify-content-center m-3">
                    <label class="col-3" for="searchNum">Search by Vehicle Registration Number</label>
                    <input class="col-4" name="searchNum" value="" required />
                </div>
                <div class="row col-12 justify-content-center m-3">
                    <label class="col-3" for="newModel">Vehicle Model (New)</label>
                    <input class="col-4" name="newModel" value="" />
                </div>
                <div class="row col-12 justify-content-center m-3">
                    <label class="col-3" for="newRegNumber">Vehicle Registration Number (New)</label>
                    <input class="col-4" name="newRegNumber" value="" />
                </div>
                <div class="row col-12 justify-content-center m-3">
                    <label class="col-3" for="newSeat">Seating Capacity (New)</label>
                    <input class="col-4" name="newSeat" value="" />
                </div>
                <div class="row col-12 justify-content-center m-3">    
                    <label class="col-3" for="newRent">Rent per day (New)</label>
                    <input class="col-4" name="newRent" value="" />
                </div>
                <div class="d-flex justify-content-center m-5">
                    <button type="submit" name="update" class="btn btn-success mx-5 px-5 text-center">UPDATE</button>
                    <button type="reset" class="btn btn-secondary mx-5 px-5 text-center">RESET</button>
                </div>
            </div>
        </form> 

        <br><br><br>

        <!-- TO DELETE VEHICLE INFORMATION -->
        <form action="addCar.php" method="post">    
            <h2 class="text-center my-3">DELETE VEHICLE INFORMATION</h2>
            <div class="container container-fluid bg-secondary-subtle d-grid pt-3">
                <div class="row col-12 justify-content-center m-3">    
                    <label class="col-3" for="regNumber" id="regNumber">Search by Vehicle Registration Number</label>
                    <input class="col-4" name="regNumber" value="" required />
                </div>
                <div class="d-flex justify-content-center m-5">
                    <button type="submit" name="delete" class="btn btn-danger mx-5 px-5 text-center">DELETE</button>
                    <button type="reset" class="btn btn-secondary mx-5 px-5 text-center">RESET</button>
                </div>
            </div>
        </form>
        <div class="text-center">
        <a href="home.php">
            <button type="button" class="btn btn-outline-dark m-4 p-2 col-2 text-center">BACK TO HOME</button>
        </a>
        </div>
    </div>
    <?php
    }
    ?>

    
     <!-- Optional JS apis -->
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>