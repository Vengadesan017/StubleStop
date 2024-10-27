<?php
    
    session_start();
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stubble Stop</title>
    <link rel="icon" type="image/jpeg" href="img/favicon.jpeg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/universal.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/error.css">
</head>
<body class="bg-image">
    
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="text-center p-4 animate-fade-in mt-4" id="login-card">
                <?php
                        if (isset($_SESSION['error'])) {
                            echo " <div class='alert alert-danger alert-dismissible text-center'>
                                ".$_SESSION['error']."<div class='close'>&times;</div>
                            </div>";
                            unset($_SESSION['error']);
                        }
                        if (isset($_SESSION['msg'])) {
                            echo " <div class='alert alert-success alert-dismissible text-center'>
                                ".$_SESSION['msg']."<div class='close'>&times;</div>
                            </div>";
                            unset($_SESSION['msg']);
                        }
                        elseif (isset($_SESSION["username"])) {
                            header("location: logout.php");
                        }
                        elseif (isset($_SESSION['user_id'])) {
                              header("location: logout.php"); 
                           }

                ?>
            <h3 class="mb-3 mr-2"><b>Login as</b></h3><br>
            
            <div class="d-grid gap-3" id="login-text">
                <button class="btn btn-success btn-lg animated-btn" id="farmer-btn"><a href="./Farmer/" class="nav-link text-center">Farmer</a></button>
                <button class="btn btn-success btn-lg animated-btn" id="manufacturer-btn"><a href="./Manufacturer/" class="nav-link text-center">Manufacturer</a></button>
                <button class="btn btn-success btn-lg animated-btn" id="manufacturer-btn"><a href="./Worker/" class="nav-link text-center">Worker</a></button>
                <button class="btn btn-success btn-lg animated-btn" id="admin-btn"><a href="./Admin/" class="nav-link text-center">Admin</a></button><br>
            </div>
        
            <p class="mt-3">Don't have an account? <a href="SignUp.php">Sign up</a></p>
        </div>
    </div>

    <!-- Add Image with Animation -->
    <img src="img/balen.png" alt="Bottom Image" class="bottom-image animate-bounce">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/error.js"></script>
</body>
</html>