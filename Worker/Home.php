<?php 

  include_once 'session.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stubble Stop - Home</title>
    <link rel="icon" type="image/jpeg" href="../img/favicon.jpeg">
    <link rel="stylesheet" type="text/css" href="../css/universal.css">
    <link rel="stylesheet" type="text/css" href="../css/error.css">
    <link rel="stylesheet" type="text/css" href="../css/Worker/Home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

    <div class="header">
            <div class="logo">STUBBLE SOLVE</div>
        </div>
    <?php 
        if (isset($_SESSION['error'])) {
        print_r(" <div class='alert alert-danger alert-dismissible'>
                ".$_SESSION['error']."<div class='close'>&times;</div>
                </div>
            ");
            unset($_SESSION['error']);
        } 
        if (isset($_SESSION['msg'])) {
        print_r(" <div class='alert alert-success alert-dismissible'>
                ".$_SESSION['msg']."<div class='close'>&times;</div>
                </div>
            ");
            unset($_SESSION['msg']);
        } 
    ?>
    <div class="Welcome"></div>

<header class="bg-success text-white text-center py-5">
    <div class="container">
        <h1 class="display-4">Welcome to Stubble Solve</h1>
        <p class="lead">Join us in reducing carbon emissions by turning stubble into valuable resources!</p>
    </div>
</header>

<section class="container my-5">
    <div class="row">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <img src="./../img/Worker/labour.png" class="card-img-top" alt="Field Cleaning">
                <div class="card-body">
                    <h5 class="card-title">Labourers - Clean Fields</h5>
                    <p class="card-text">Labourers can view available jobs to clean fields, earning money based on field size and crop type. This helps farmers prepare their land for future cultivation while reducing carbon emissions by preventing stubble burning.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm">
                <img src="./../img/Worker/balenmachine.png" class="card-img-top" alt="Balen Machine Work">
                <div class="card-body">
                    <h5 class="card-title">Balen Machine Operators</h5>
                    <p class="card-text">After fields are cleared, Balen Machine Operators can apply to turn wasted crops into transportable bales. This process helps transform waste into a valuable resource, reducing stubble waste in a sustainable way.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm">
                <img src="./../img/Worker/transportation.png" class="card-img-top" alt="Delivery Work">
                <div class="card-body">
                    <h5 class="card-title">Delivery Partners</h5>
                    <p class="card-text">Delivery partners transport the baled crops to manufacturers who will use the material for further production. This collaboration ensures an end-to-end process that minimizes environmental impact while providing work opportunities.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="get-started" class="bg-light py-5">
    <div class="container text-center">
        <h2 class="mb-4">How Stubble Stop Works</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="icon-box">
                    <i class="fas fa-seedling fa-3x text-success"></i>
                    <h5 class="one">Labourers</h5>
                    <p>Labourers can easily view jobs for field cleaning, apply, and get paid based on the amount of work needed. Every cleared field reduces stubble burning, contributing to a cleaner environment.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="icon-box">
                    <i class="fas fa-tractor fa-3x text-success"></i>
                    <h5 class="one">Balen Machine Operators</h5>
                    <p>Balen machine operators convert stubble waste into transportable bales after fields are cleared. This turns waste into a useful resource, reducing the need for stubble burning.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="icon-box">
                    <i class="fas fa-truck fa-3x text-success"></i>
                    <h5 class="one">Delivery Partners</h5>
                    <p>Delivery partners transport the bales to manufacturers. This ensures that the cleaned waste is repurposed effectively, reducing environmental waste and creating a cycle of sustainability.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="bg-dark text-white text-center py-3">
    <p>&copy; 2024 Stubble Stop. All Rights Reserved.</p>
</footer>

<nav class="navbar navbar-light bg-light navbar-expand fixed-bottom">
        <ul class="navbar-nav nav-justified w-100">
            <li class="nav-item">
                <a class="nav-link text-center active" href="Home.php">
                    <i class="fas fa-home"></i><br>Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-center" href="Works.php">
                    <i class="fas fa-edit"></i><br>Works
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-center" href="Status.php">
                    <i class="fas fa-info-circle"></i><br>Status
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-center" href="Wallet.php">
                    <i class="fas fa-wallet"></i><br>Wallet
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-center" href="Profile.php">
                    <i class="fas fa-user"></i><br>Profile
                </a>
            </li>
        </ul>
    </nav>
    <script src="../js/error.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
