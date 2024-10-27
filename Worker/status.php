<?php 

  include_once 'session.php';
  include_once "./../config.php";

  try {

    if (isset($_POST['WorkCommitted'])) {

        $PostId = $_POST['id'];
        $create = $conn->prepare("UPDATE Works SET Committed = (?)  where PostId=(?)");

        $create->execute([1,$PostId]);

        $_SESSION['msg'] = 'You Verified your Work was completed.';

       }
    else if (isset($_POST['WorkCompleted'])) {

        $PostId = $_POST['id'];
        $create = $conn->prepare("UPDATE Works SET Completed = (?)  where PostId=(?)");
        print_r($PostId);
        $create->execute([1,$PostId]);

        $PostId = $_POST['id'];
        $create = $conn->prepare("UPDATE posts SET Collected = ?, Transported = ? WHERE PostId = ?");
        $create->execute([1, 1, $PostId]);

        $_SESSION['msg'] = 'You Verified your Work was completed.';

       }


    $fetch_query="SELECT p.*,w.WorksId,w.WorkType,w.PostId as wPostId , w.WorkerId, w.Committed as wCommitted, w.Completed as wCompleted, w.Verified as wVerified, w.Paid as wPaid FROM Works w 
    LEFT JOIN Posts p ON w.PostId = p.PostId 
     where w.WorkerId = (?)";
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
    <link rel="stylesheet" type="text/css" href="../css/Worker/status.css">
    <style>
 
    </style>

</head>
<body>

          <!-- Header Section -->
          <div class="header">
            <div class="logo">STUBBLE SOLVE</div>
        </div>

        <!-- Status Section -->
        <div class="container status-container" id="statusPage">
            <div class="row justify-content-center">
            <div class="col-md-4"><br><br><br><br>
                <div class="post_status" >
                <h3 class="text-center">Work Status</h3>
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
    <?php if (!empty($posts)) { ?>
    <?php foreach ($posts as $post): ?>
    <form method="POST" action="status.php" id="one">
        <div class="image-placeholder bg-light mb-3" >
          <img src="<?php if (!$post['Rolled']) { echo('./../img/Worker/rolling.png');}else if(!$post['Collected']){echo"./../img/Worker/collecting.png";}else{echo"./../img/Worker/delivery.png";} ?>" id="uploadedImage" alt="Uploaded Image" width="100%" height="auto" />
        </div>
    <div class="status">
        <p><strong>Crop Type:</strong> <span id="statusCropType"><?php echo($post['CropType']); ?></span></p>
        <p><strong>Location:</strong> <span id="statusLocation"><?php echo($post['Location']); ?></span></p>
        <p><strong>Field Size:</strong> <span id="statusFieldSize"><?php echo($post['FieldSize']); ?></span></p>
        <p><strong>Last Date:</strong> <span id="statusDeadline"><?php echo($post['Deadline']); ?></span></p>

    </div>
        <div class="modal-body card">
            <div class="progress-track">
              <ul id="progressbar">
                <li class="step0 active" id="step1">Enrolled</li>
                <li class="step0 <?php if ($post['wCommitted']) { echo"active";} ?> text-center" id="step2">Committed</li>
                <li class="step0 <?php if ($post['wCompleted']) { echo"active";} ?> text-center" id="step2">Completed</li>
                <li class="step0 <?php if ($post['wVerified']) { echo"active";} ?> text-center" id="step3"><span id="">Verified</span></li>
                <li class="step0 <?php if ($post['wPaid']) { echo"active";} ?> text-center" id="step4">Payment</li>
              </ul>
              
            </div>
            </div> <center>
            <div class="container mt-5">
            <input type="hidden" name="id" value="<?php echo($post['wPostId']); ?>">
            <?php if (!$post['wCommitted']): ?>
                <button type="submit" name="WorkCommitted" class="btn btn-primary custom-btn" style="background-color:rgba(23, 106, 38);">Work Committed</button>
            <?php elseif (!$post['wCompleted']): ?>
                <button type="submit" name="WorkCompleted" class="btn btn-primary custom-btn" style="background-color:rgba(23, 106, 38);">Work Completed</button>
            <?php elseif (!$post['wVerified']): ?>
                <button class="btn btn-primary custom-btn" style="background-color:gray; color:#fff">Waiting for Verification</button>
            <?php elseif (!$post['wPaid']): ?>
                <button class="btn btn-primary custom-btn" style="background-color:gray; color:#fff">Waiting for Payment</button>
            <?php endif ?>
            </div>
        </center>
          
    </form>
    <?php endforeach; } ?>
    <!-- Bottom Navigation Bar -->
    <nav class="navbar navbar-light bg-light navbar-expand fixed-bottom">
        <ul class="navbar-nav nav-justified w-100">
            <li class="nav-item">
                <a class="nav-link text-center" href="Home.php">
                    <i class="fas fa-home"></i><br>Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-center" href="Works.php">
                    <i class="fas fa-edit"></i><br>Works
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-center active" href="Status.php">
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