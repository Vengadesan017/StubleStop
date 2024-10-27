<?php 

  include_once 'session.php';
  include_once "./../config.php";
  try {

    if (isset($_POST['ordernow'])) {

        $roll = $_POST['roll'];
        $id = $_POST['id'];

        $PostId = $_POST['id'];
        $create = $conn->prepare("UPDATE dsroom SET DSRRollCount = DSRRollCount - ? where DSRId=(?)");

        $create->execute([$roll,$id]);

        $create1 = $conn->prepare("INSERT INTO orders (OrderedBy, CardId, Quantity) VALUES (?, ?, ?)");
// print_r($_SESSION["user_id"] . $id . $roll);
        $create1->execute([$_SESSION["user_id"] , $id , $roll]);




        $_SESSION['msg'] = 'You are successfully Ordered '. $roll . " Roll of stubble";
        header("location: Status.php");

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
        $fetch_query="SELECT * FROM DSRoom";
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql=$conn->prepare($fetch_query);
        $sql->execute();
        $x= $sql->setFetchMode(PDO::FETCH_ASSOC);
        $posts=$sql->fetchAll();
        $rowCount = count($posts);

        $fetch_query1="SELECT DISTINCT DSRLocation FROM DSRoom";
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql1=$conn->prepare($fetch_query1);
        $sql1->execute();
        $x1= $sql1->setFetchMode(PDO::FETCH_ASSOC);
        $DSRLocations=$sql1->fetchAll();

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
    <div class="row">
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

    <form method="POST" action="Home.php" class="input-group mb-3">
            <select name="croptype" class="form-control">
                <option value="Rice">Rice</option>
                <option value="Wheat">Wheat</option>
            </select>
            <select name="location" class="form-control">
            <option value="all">All</option>
                <?php foreach ($DSRLocations as $DSRLocation): ?>
                    <option value="<?php echo($DSRLocation['DSRLocation']); ?>"><?php echo($DSRLocation['DSRLocation']); ?></option>
                <?php endforeach; ?>
            </select>
                <button type="submit" name="SearchCrop" class="btn btn-success" type="button">Search</button>
    </form>
        </div>
    </div>
</div>


    <!-- Cards Section -->
    <div class="container mt-4">
    <div class="row">
    <?php if ($rowCount<=0): ?>
            <div class="card mb-4">
            <div class="card-body">
                <div class="card-text">No Crop Rolls Found..!</div>

            </div>
            </div>            

            <?php else: ?> 
        <?php foreach ($posts as $post): ?>
            <!-- Card 1 -->
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo($post['DSRCropType']); ?> Straw</h5>
                        <p class="card-text">Total Quantity: <?php echo(($post['DSRRollCount'])/1000); ?> Tons/30kg per roll</p>
                        <p class="card-text">Location: <?php echo($post['DSRLocation']); ?></p>
                        <p class="card-text">Storeroom Name: <?php echo($post['DSRName']); ?></p>
                        <p class="card-text">Humidity: 44</p>
                        <p class="card-text">Temperature: 28 <sup>o</sup>C</p>
                        <hr>
                        <form method="POST" action="Home.php" class="mb-3">
                            <div class="input-group mb-3 mt-3">
                            <div>Order Quantity : </div>
                            <input type="hidden" name="id" value="<?php echo($post['DSRId']); ?>">
                            <input type="number" name="roll" min="1" class="form-control">
                            <div>Rolls(30Kg/Roll)</div>
                            </div>

                            <button type="submit" name="ordernow" class="btn btn-success" style="width:100%">Order Now</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach;endif; ?>
    </div>
    </div>


    <script src="../js/error.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
