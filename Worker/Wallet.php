<?php 

  include_once 'session.php';
  include_once "./../config.php";

  try {

    // $fetch_query="SELECT * FROM Posts where CreatedBy = (?)";
    // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // $sql=$conn->prepare($fetch_query);
    // $sql->execute([$_SESSION['user_id']]);
    // $x= $sql->setFetchMode(PDO::FETCH_ASSOC);
    // $posts=$sql->fetchAll();


//     if (isset($_POST['Create_Post'])) {
//         $cropType = $_POST['cropType'];
//         $location = $_POST['location'];
//         $fieldSize = $_POST['fieldSize'];
//         $deadline = $_POST['deadline'];
//         $cropStatus = $_POST['cropStatus'];
//         $image = $_POST['image'];
//         $Harvested = 0;
//         $Rolled = 0;

//         if ($cropStatus=="Harvested"){
//             $Harvested = 1; 
//         }
//         else if($cropStatus=="Rolled"){
//             $Harvested = 1;
//             $Rolled = 1;
//         }


//         if ($cropType && $location && $fieldSize && $deadline && $cropStatus){

//                 $create = $conn->prepare("INSERT INTO Posts ( CropType, Location, FieldSize, Deadline, CreatedBy, NeededHuman, EnrolledHuman, Harvested, Rolled) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

//                 $create->execute([$cropType , $location , $fieldSize , $deadline , $_SESSION["User_id"] , floor($fieldSize/10), 0 , $Harvested , $Rolled]);
    
//                 $_SESSION['msg'] = 'Your Post for  ' . $cropType . ' was Created Successfully';
//                 // header("location: Home.php");
//         }
//         else{
//             $_SESSION['error'] = 'Enter all the details'; 
//             // header("location: SignUp.php");
//         }
    //    }



    
} catch (PDOException $e) {
    $_SESSION['error'] = "Error at: " . $e->getMessage();
    // header("location: user.php");
}   



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wallet</title>
    <link rel="icon" type="image/jpeg" href="../img/favicon.jpeg">
    <link rel="stylesheet" type="text/css" href="../css/universal.css">
    <link rel="stylesheet" type="text/css" href="../css/error.css">
    <link rel="stylesheet" type="text/css" href="../css/Farmer/wallet.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>


    </style>

</head>
<body>

<div id="two">
<div class="container mt-4" >
        
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
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="wallet-amount bg-light text-center p-4 mb-3">
                    <h5>Total amount in wallet</h5>
                    <h2>₹ 1500</h2>
                </div>
            </div>
        </div>

         <!-- Transfer Button Section -->
    <div class="transfer-btn-container">
        <button class="btn btn-success btn-block" id="button">Transfer to Your Account</button>
    </div>

        

        <!-- Transaction History Section -->
         <center>
        <div class="row justify-content-center" id="one">
            <div class="col-md-6">
                <h5>History:</h5><br>
                <div class="transaction-history">
                    <div class="transaction bg-light p-2 mb-2 d-flex justify-content-between">
                        <span>Rice Field</span> <span class="text-success">+ ₹ 500</span>
                    </div>
                    <div class="transaction bg-light p-2 mb-2 d-flex justify-content-between">
                        <span>Wheat Field</span> <span class="text-success">+ ₹ 500</span>
                    </div>
                    <div class="transaction bg-light p-2 mb-2 d-flex justify-content-between">
                        <span>Withdrawal</span> <span class="text-danger">- ₹ 500</span>
                    </div>
                    <div class="transaction bg-light p-2 mb-2 d-flex justify-content-between">
                        <span>Rice Field</span> <span class="text-success">+ ₹ 500</span>
                    </div>
                </div>
            </div>
        </div>
    </div></center>

</div>

    <!-- Bottom Navigation Bar -->
    <nav class="navbar navbar-light bg-light navbar-expand fixed-bottom">
        <ul class="navbar-nav nav-justified w-100">
            <li class="nav-item">
                <a class="nav-link text-center" href="Home.php">
                    <i class="fas fa-home"></i><br>Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-center active" href="Works.php">
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


