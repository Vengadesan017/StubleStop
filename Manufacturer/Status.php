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


    $fetch_query="SELECT * FROM orders o 
    LEFT JOIN dsroom d ON d.DSRId = o.CardId 
     where o.OrderedBy = (?)";
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
    <link rel="stylesheet" type="text/css" href="../css/Manufacturer/Home.css">
    <link rel="stylesheet" type="text/css" href="../css/Manufacturer/status.css">
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
    </style>

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


  <!-- Main Container -->
  <div class="container-fluid p-5" >
    <div class="row justify-content-center">

        
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
      <div class="col-lg-6 col-md-8 col-sm-12">
      <div class="parent-container">
        <div class="card-outer">
        <!-- First Card -->
        <div class="card p-3 mb-4">
          <div class="card-body">
            <h5><?php echo($post['DSRCropType']); ?> Straw | Total Quantity: <?php echo($post['DSRRollCount']); ?> Tons / 30kg per roll</h5>
            <p>Location: <?php echo($post['DSRLocation']); ?></p>
            <p>Humidity: 44 | Temperature: 30°C</p>
          </div>
        </div>

        <!-- Second Card -->
        <div class="card p-3 mb-4">
          <div class="card-body">
            <p>Order Quantity: <?php echo($post['Quantity']*30); ?>Kg || <?php echo($post['Quantity']); ?>Rolls (30kg per roll)</p>
            <p>Deliver To: Ali Yavar, Mumbai-400 051 (Company Address)</p>
            <p>Total Price: $<?php echo($post['Quantity']*150); ?> (<?php echo($post['Quantity']); ?>*150)</p>
          </div>
        </div>
        <div class="modal-body card">
          <div class="progress-track">
            <ul id="progressbar">
              <li class="step0 <?php if ($post['Paid']) { echo"active";} ?>" id="step1">Paid</li>
              <li class="step0 <?php if ($post['Packed']) { echo"active";} ?> text-center" id="step2">Packed</li>
              <li class="step0 <?php if ($post['Shipped']) { echo"active";} ?> text-center" id="step2">Shipped</li>
              <li class="step0 <?php if ($post['Delivery']) { echo"active";} ?> text-right" id="step3"><span id="">Delivery</span></li>
              <li class="step0 <?php if ($post['Verfied']) { echo"active";} ?> text-right" id="step4">Verfied</li>
            </ul>
          </div>
         
           
          </div> 
        </div>
      </div>
    </div>
    <?php endforeach; } ?>
  </div>
</div>

  <script src="../js/error.js"></script>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>