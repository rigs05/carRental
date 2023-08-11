<!-- Navigation Bar -->

<?php
// session_start();
    if (isset($_SESSION['loggedin']) && ($_SESSION['loggedin'] == true)) {
        $loggedIn = true;
    }
    else {
        $loggedIn = false;
    }
    // navbar design
    echo '<nav class="navbar navbar-expand-lg bg-body-secondary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Car Rental Agency</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item px-2 mx-3">';
                if (!$loggedIn) {
                echo ' <a class="nav-link" href="home.php">Home</a>';
                }
                else {
                echo' <a class="nav-link" href="home.php">Home</a>';
                }
                '</li>';

                if (!$loggedIn) {
                echo
                '<li class="nav-item px-2 mx-3">
                    <a class="nav-link" href="index.php">Login</a>
                </li>
                <li class="nav-item px-2 mx-3">
                    <a class="nav-link" href="csignup.php">Sign Up</a>
                </li>';
                }
                if ($loggedIn) {
                echo
                ' <li class="nav-item" style="position: absolute; right: 120px;">
                    <a class="nav-link btn btn-danger border border-danger-subtle" href="logout.php">Logout</a>
                </li>';
                }
        echo '</ul>
        </div>
    </div>
</nav>';
?>