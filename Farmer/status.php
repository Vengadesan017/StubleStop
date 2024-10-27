<?php 

  include_once 'session.php';
  include_once "./../config.php";

  try {

    if (isset($_POST['Verify'])) {

        $PostId = $_POST['id'];
        $size = $_POST['size'];
        $create = $conn->prepare("UPDATE Posts SET Verified = (?) where PostId=(?)");

        $create->execute([1,$PostId]);

        $PostId = $_POST['id'];
        $create = $conn->prepare("UPDATE Works SET Verified = (?)  where PostId=(?)");
        print_r($PostId);
        $create->execute([1,$PostId]);


        $create = $conn->prepare("UPDATE dsroom SET DSRRollCount = DSRRollCount + ?   where DSRId= ?");
        print_r($PostId);
        $create->execute([$size*70,$PostId%4]);



        $_SESSION['msg'] = 'You Verified your land was clean by our team. And there was no issue';

       }


    $fetch_query="SELECT * FROM Posts where CreatedBy = (?)";
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql=$conn->prepare($fetch_query);
    $sql->execute([$_SESSION['user_id']]);
    $x= $sql->setFetchMode(PDO::FETCH_ASSOC);
    $posts=$sql->fetchAll();






    
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
    <title>Post Status</title>
    <link rel="icon" type="image/jpeg" href="../img/favicon.jpeg">
    <link rel="stylesheet" type="text/css" href="../css/universal.css">
    <link rel="stylesheet" type="text/css" href="../css/error.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/Farmer/status.css">
    <style>
        #progressbar li {
            list-style-type: none;
            font-size: 0.8rem;
            width: 20%;
            float: left;
            position: relative;
            font-weight: 400;
            color: black;
        }
        .custom-btn {
            background-color: gray; /* Custom green */
            border-radius: 20px; /* Make button rounded */
            width: 80%;
            margin:20px 30px;
            font-size: 1.2rem; /* Increase font size */
            padding: 10px 10px; /* Adjust padding */
            transition: background-color 0.3s ease; /* Smooth transition */

        }

        .Verify .active{
            background-color: #28a745; 
        }
        .Verify .active:hover{
            background-color: #218838; 
        }

.custom-btn:hover {
    background-color: gray; /* Darker green on hover */
}
#one{
    margin-top: 40px;
    border-radius: 15px ;
    box-shadow: 0 2px 4px black;
    min-width:400px;
    max-width: 450px;
    height: 650px;
    padding-bottom: 20px;
    padding-top: 20px;
    background-color: lightgreen;
    
    
    
  }

#uploadedImage {
    width: 100%;
    height: 199px;
    object-fit: cover;
}


    </style>

</head>
<body>

  <!-- Status Section -->
  <div class="container status-container" id="statusPage">
    <div class="row justify-content-center">
      <div class="col-md-4"><br><br><br><br>
        <h3 class="text-center">Post Status</h3>
        
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
        <div class="scroll">
        


        



        <?php foreach ($posts as $post): ?>
            <div id="one">
                <div class="image-placeholder bg-light mb-3" >
                <img src="../img/Farmer/image.png" id="uploadedImage" alt="Uploaded Image" width="auto" height="100%"/>
                </div>
            <div class="status">
                <p><strong>Crop Type:</strong> <span id="statusCropType"><?php echo($post['CropType']); ?></span></p>
                <p><strong>Location:</strong> <span id="statusLocation"><?php echo($post['Location']); ?></span></p>
                <p><strong>Field Size:</strong> <span id="statusFieldSize"><?php echo($post['FieldSize']); ?>acres</span></p>
                <p><strong>Last Date:</strong> <span id="statusDeadline"><?php echo($post['Deadline']); ?></span></p>
                <p><strong>Crop Status:</strong> <span id="statusCropStatus"></p>
             
            </div>
                <div class="modal-body card">
                    <div class="progress-track">
                    <ul id="progressbar">
                         <li class="step0 <?php if ($post['Harvested']) { echo"active";} ?>" id="step1">Harvested </li>
                        <li class="step0 <?php if ($post['Rolled']) { echo"active";} ?> text-center" id="step2">Rolled</li>
                        <li class="step0 <?php if ($post['Collected']) { echo"active";} ?> text-center" id="step2">Collected</li>
                        <li class="step0 <?php if ($post['Verified']) { echo"active";} ?> text-right" id="step3"><span id="">Verified</span></li>
                        <li class="step0 <?php if ($post['Paid']) { echo"active";} ?> text-right" id="step4">Paid</li> 
                    </ul>
                    </div>

                    </div> 
                    <form method="POST" action="status.php" class="Verify">
                        <input type="text" name="id" value="<?php echo($post['PostId']); ?>" hidden>
                        <input type="text" name="size" value="<?php echo($post['FieldSize']); ?>" hidden>
                        <button type="<?php if ($post['Collected']) { echo"submit";} ?>" name="<?php if ($post['Collected']) { echo"Verify";} ?>" class="custom-btn <?php if ($post['Collected']) { echo"active";} ?>" style="<?php if ($post['Collected'] && !$post['Verified']) { echo"";}else{echo"background-color: gray;color: rgb(255, 255, 255);";} ?>"><?php if ($post['Collected'] && !$post['Verified']) { echo"Verify The Work";}else{echo"Pending";} ?></button>
                    </form>   
            </div>
        <?php endforeach; ?>

    
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