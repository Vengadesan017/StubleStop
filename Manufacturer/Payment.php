<?php 

  include_once 'session.php';
  include_once "./../config.php";
  try {

    if (isset($_POST['ordernow'])) {
        $roll = $_POST['roll'];
        $id = $_POST['id'];


        $fetch_query="SELECT * FROM dsroom where DSRId= ?";
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql=$conn->prepare($fetch_query);
        $sql->execute([$id]);
        $x= $sql->setFetchMode(PDO::FETCH_ASSOC);
        $posts=$sql->fetchAll();




       }


    if (isset($_POST['SearchCrop'])) {
        $croptype = $_POST['croptype'];
        $location = $_POST['location'];

        if($location=='all'){
            $fetch_query="SELECT * FROM dsroom where DSRCropType = ?";
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql=$conn->prepare($fetch_query);
            $sql->execute([$croptype]);
            $x= $sql->setFetchMode(PDO::FETCH_ASSOC);
            $posts=$sql->fetchAll();

            $rowCount = count($posts);
        }
        else{
            $fetch_query="SELECT * FROM dsroom where DSRLocation = ? and DSRCropType = ?";
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql=$conn->prepare($fetch_query);
            $sql->execute([$location,$croptype]);
            $x= $sql->setFetchMode(PDO::FETCH_ASSOC);
            $posts=$sql->fetchAll();

            $rowCount = count($posts);
        }            



            $fetch_query1="SELECT DISTINCT DSRLocation FROM DSRoom";
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql1=$conn->prepare($fetch_query1);
            $sql1->execute();
            $x1= $sql1->setFetchMode(PDO::FETCH_ASSOC);
            $DSRLocations=$sql1->fetchAll();  
       }
       else{


       }







    
} catch (PDOException $e) {
    $_SESSION['error'] = "Can't Create enrolled the Work: " . $e->getMessage();
    // header("location: user.php");
}   



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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/Manufacturer/Home.css">
    <link rel="stylesheet" type="text/css" href="../css/Manufacturer/Payment.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-success">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="#">STUBBLE SOLVE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="Home.php">Home</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link text-white" href="./../payment/payment.html">Cart</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link text-white" href="Status.php">Status</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="Profile.php">Profile</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


  <!-- Search Bar -->
  <div class="container mt-4">
    <div class="row" style="margin:15% 0 0 0">
        <div class="col-12">

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

<section class="summary-section">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Outer Card -->
                <div class="col-md-10">
                    <div class="card outer-card p-4">
                        <!-- Order Summary Card -->
                        <div class="card summary-card mb-4 p-4">
                            <h2 class="section-title mb-4">ORDER SUMMARY</h2>
                            <p><strong>Order Quantity:</strong> 100Kg (25*4) (25Kg per roll)</p>
                            <p><strong>Deliver To:</strong> svdixh iqw d d sdsd</p>
                            <p><strong>Total Price:</strong> $123 (25*31)</p>
                        </div>
                        
                        <!-- Goodon Details Card -->
                        <div class="card goodon-card p-4">
                            <h2 class="section-title mb-4">GOODON DETAILS</h2>
                            <p><strong>Rice Straw:</strong> Total Quantity : 100 Tons / 30kg per roll</p>
                            <p><strong>Location:</strong> xxx street, dcdxvx, Punjab</p>
                            <p><strong>Humidity:</strong> 44 <strong>Temperature:</strong> 28c</p>
                        </div>
                        <section>
                            <div class="button-container mt-4 d-flex">
                                <button class="btn btn-primary">Process Payment</button>
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>
                        </section>
    </div>
    </div>


    <script src="../js/error.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
