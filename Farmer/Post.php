<?php 

  include_once 'session.php';
  include_once "./../config.php";

  try {
    if (isset($_POST['Create_Post'])) {
        $cropType = $_POST['cropType'];
        $location = $_POST['location'];
        $fieldSize = $_POST['fieldSize'];
        $deadline = $_POST['deadline'];
        $cropStatus = $_POST['cropStatus'];
        $image = $_POST['image'];
        $Harvested = 0;
        $Rolled = 0;

        if ($cropStatus=="Harvested"){
            $Harvested = 1; 
        }
        else if($cropStatus=="Rolled"){
            $Harvested = 1;
            $Rolled = 1;
        }


        if ($cropType && $location && $fieldSize && $deadline && $cropStatus){

                $create = $conn->prepare("INSERT INTO Posts ( CropType, Location, FieldSize, Deadline, CreatedBy, NeededHuman, EnrolledHuman, Harvested, Rolled) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

                $create->execute([$cropType , $location , $fieldSize , $deadline , $_SESSION["user_id"] , floor($fieldSize/10), 0 , $Harvested , $Rolled]);
    
                $_SESSION['msg'] = 'Your Post for  ' . $cropType . ' was Created Successfully';
                header("location: status.php");
        }
        else{
            $_SESSION['error'] = 'Enter all the details'; 
            // header("location: SignUp.php");
        }



    }
} catch (PDOException $e) {
    $_SESSION['error'] = "Can't Create Post: " . $e->getMessage();
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
    <link rel="stylesheet" type="text/css" href="../css/Farmer/Post.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

  <!-- Post Form Section -->
  <div class="container form-container" id="postForm">
    <div class="row justify-content-center">
      <div class="col-md-4"><br><br><br>
        <h3 class="text-center">Create a Post</h3><br>
        <form method="POST" action="Post.php">
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
          <div class="mb-3">
            <label for="cropType" class="form-label">Crop Type</label>
            <select class="form-control" name="cropType"  required>
              <option value="Rice" name="Rice">Rice</option>
              <option value="Wheat" name="Wheat">Wheat</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" class="form-control" name="location" placeholder="Enter Location" required>
          </div>
          <div class="mb-3">
            <label for="fieldSize" class="form-label">Field Size</label>
            <input type="text" class="form-control" name="fieldSize" placeholder="Enter Field Size" required>
          </div>
          <div class="mb-3">
            <label for="deadline" class="form-label">Deadline</label>
            <input type="date" class="form-control" name="deadline" value="2024-10-30" min="2024-10-30" required>
          </div>
          <div class="mb-3">
            <label for="cropStatus" class="form-label">Crop Status</label>
            <select class="form-control" name="cropStatus"  required>
              <option value="Rolled" name="Rolled">Rolled</option>
              <option value="Harvested" name="Harvested">Harvested</option>
              <option value="Not Harvested" name="Not Harvested">Not Harvested</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="image" class="form-label">Add Image</label>
            <input type="file" class="form-control" name="image" accept="image/*" onchange="previewImage(event)">
          </div>
          <button type="submit" class="btn-post" name="Create_Post" style="margin-bottom: 70px; padding:5px 0;">POST</button>
        </form>
      </div>
    </div>
  </div>

    <!-- Bottom Navigation Bar -->
    <nav class="navbar navbar-light bg-light navbar-expand fixed-bottom">
    <ul class="navbar-nav nav-justified w-100">
        <li class="nav-item">
            <a class="nav-link text-center active" href="Home.php">
                <i class="fas fa-home"></i><br>Home
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-center " href="Post.php">
                <i class="fas fa-edit"></i><br>Post
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
            <a class="nav-link text-center " href="Profile.php">
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