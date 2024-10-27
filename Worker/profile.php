<?php 

  include_once 'session.php';
  include_once "./../config.php";

  try {

    $fetch_query="SELECT * FROM Users where User_id = (?)";
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql=$conn->prepare($fetch_query);
    $sql->execute([$_SESSION['user_id']]);
    $x= $sql->setFetchMode(PDO::FETCH_ASSOC);
    $profile=$sql->fetchAll();


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
    <link rel="stylesheet" type="text/css" href="../css/Farmer/profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
@media (min-width: 500px){
    br{

      
display: none; 
    
      
    }
}  

    </style>

</head>
<body>

<div class="container">
        <div class="header">
            <!-- Display Profile Picture -->
            <img src="../img/image.png" alt="Profile Picture" id="profile-image">
            <h2 id="name-display"><?php echo($_SESSION["username"]); ?></h2>
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
        <div class="profile-info">
            <p><i class="fas fa-user icon"></i><strong>Full Name:</strong> <span id="full-name"><?php echo($_SESSION["username"]); ?></span></p>
            <p><i class="fas fa-envelope icon"></i><strong>Email:</strong> <span id="email"><?php echo($profile[0]['Email']); ?></span></p>
            <p><i class="fas fa-phone icon"></i><strong>Phone:</strong> <span id="phone"><?php echo($profile[0]['Phone']); ?></span></p>
            <!-- <?php print_r($profile[0]); ?> -->
            <p><i class="fas fa-calendar icon"></i><strong>Birthday:</strong> <span id="birthday">Jan 1, 1990</span></p>
            <p><i class="fas fa-map-marker-alt icon"></i><strong>Address:</strong> <span id="location">New York, USA</span></p>
        </div>
        <button class="edit-profile-btn" onclick="toggleEditForm()">Edit Profile</button>
        <button href="./../logout.php" class="edit-profile-btn"><a href="./../logout.php" class="nav-link">Logout</a></button>

        <!-- Editable Profile Form -->
        <div class="edit-form" id="edit-form">
            <input type="text" id="edit-fullname" class="form-control" placeholder="Full Name">
            <input type="email" id="edit-email" class="form-control" placeholder="Email">
            <input type="number" id="edit-phone" class="form-control" placeholder="Phone">
            <input type="date" id="edit-birthday" class="form-control" placeholder="Birthday">
            <input type="text" id="edit-location" class="form-control" placeholder="Location">

            <!-- Image Upload -->
            <input type="file" id="edit-image" class="form-control-file" accept="image/*" onchange="loadFile(event)">
            
            <button class="btn btn-success mt-2 profile-edit-button" onclick="saveProfile()">Save Changes</button>
        </div>
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