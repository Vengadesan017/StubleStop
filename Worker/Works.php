<?php 

  include_once 'session.php';
  include_once "./../config.php";

  try {

    if (isset($_POST['EnrollWork'])) {

        $cropType = $_POST['CropType'];
        $location = $_POST['Location'];
        $fieldSize = $_POST['FieldSize'];
        $deadline = $_POST['Deadline'];
        $work = $_POST['Work'];
        $post = $_POST['id'];
    
        $neededHuman = $_POST['NeededHuman'];
        $enrolledHuman = $_POST['EnrolledHuman'];
        $committedHuman = $_POST['CommitedHuman'];




        $PostId = $_POST['id'];
        $create = $conn->prepare("UPDATE Posts SET EnrolledHuman = EnrolledHuman + 1, CommitedHuman = CommitedHuman + 1 where PostId=(?)");

        $create->execute([$PostId]);

        $create1 = $conn->prepare("INSERT INTO Works ( WorkType, PostId, WorkerId, Committed) VALUES (?, ?, ?, ?)");

        $create1->execute([$work , $post , $_SESSION["user_id"] , 1]);




        $_SESSION['msg'] = 'You are successfully enrolled the Work';
        header("location: Status.php");

       }


    if (isset($_POST['filter'])) {
        $work_type = $_POST['work-type'];
        $location = $_POST['location'];

        if($work_type=='labour'){
            $fetch_query="SELECT * FROM Posts where Location = ? and Collected = ?";
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql=$conn->prepare($fetch_query);
            $sql->execute([$location,0]);
            $x= $sql->setFetchMode(PDO::FETCH_ASSOC);
            $posts=$sql->fetchAll();

            $rowCount = count($posts);
        }
        else if($work_type=='balen'){
            $fetch_query="SELECT * FROM Posts where Location = ? and Rolled = ?";
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql=$conn->prepare($fetch_query);
            $sql->execute([$location,0]);
            $x= $sql->setFetchMode(PDO::FETCH_ASSOC);
            $posts=$sql->fetchAll();
            $rowCount = count($posts);
        }
        else{
            $fetch_query="SELECT * FROM Posts where Location = ? and Transported = ?";
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql=$conn->prepare($fetch_query);
            $sql->execute([$location,0]);
            $x= $sql->setFetchMode(PDO::FETCH_ASSOC);
            $posts=$sql->fetchAll();
            $rowCount = count($posts);
        }





        $fetch_query1="SELECT DISTINCT Location FROM Posts";
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql1=$conn->prepare($fetch_query1);
        $sql1->execute();
        $x1= $sql1->setFetchMode(PDO::FETCH_ASSOC);
        $locations=$sql1->fetchAll();        
       }
       else{
        $fetch_query="SELECT * FROM Posts";
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql=$conn->prepare($fetch_query);
        $sql->execute();
        $x= $sql->setFetchMode(PDO::FETCH_ASSOC);
        $posts=$sql->fetchAll();
        $rowCount = count($posts);

        $fetch_query1="SELECT DISTINCT Location FROM Posts";
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql1=$conn->prepare($fetch_query1);
        $sql1->execute();
        $x1= $sql1->setFetchMode(PDO::FETCH_ASSOC);
        $locations=$sql1->fetchAll();

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
    <link rel="stylesheet" href="./../css/Worker/Works.css">
</head>
<body>
    <section class="labour-work-section">
        <!-- Header Section -->
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
        <!-- Main Content Section -->
        <form method="POST" action="Works.php" class="labour-work-section">
            <div class="form-group">
                <div class="combined-control">
                    <div class="form-control combined-field">
                        <select name="work-type" class="work-title-select-small">
                            <option value="labour">Labour Works</option>
                            <option value="balen">Balen Machine Works</option>
                            <option value="delivery">Delivery Work</option>
                        </select>

                        <select id="work-type" name="location" class="work-title-select-small">
                        <?php foreach ($locations as $location): ?>
                            <option value="<?php echo($location['Location']); ?>"><?php echo($location['Location']); ?></option>
                            <?php endforeach; ?>
                        </select>

                        
                    </div>
                </div>
            </div>
            <div class="form-control-1">
                <button type="submit" name="filter" class="apply-filter-btn">Apply Filter</button>
            </div>
                        </form>
        
        <!-- Labour Work Card Section -->


         <?php if ($rowCount<=0): ?>
            <div class="labour-work-card">
            <div class="details">
                <div class="detail">No Works Found..!</div>

            </div>
            </div>            

            <?php else: ?> 
        <?php foreach ($posts as $post): ?>
        <form method="POST" action="Works.php" class="labour-work-card">
            <div class="box"><img src="<?php if (!$post['Rolled']) { echo('./../img/Worker/rolling.png');}else if(!$post['Collected']){echo"./../img/Worker/collecting.png";}else{echo"./../img/Worker/delivery.png";} ?>" alt="" width="100%" height="auto"></div>

            <div class="details">
                <div class="detail">Crop Type: <?php echo($post['CropType']); ?></div>
                <div class="detail">Location: <?php echo($post['Location']); ?></div>
                <div class="detail">Field Size: <?php echo($post['FieldSize']); ?> acres</div>
                <div class="detail">Deadline: <?php echo($post['Deadline']); ?></div>
                <div class="detail">Work: <?php if (!$post['Rolled']) { echo($post['CropType']);echo"Straw Baling Machine";}else if(!$post['Collected']){echo"Collecting & Storing the Straw Rolls";}else{echo"Delivery works";} ?></div>

            </div>
            <hr>
            <div class="human-power">
                <div class="power-detail">Needed Human Power: <?php echo($post['NeededHuman']); ?> persons</div>
                <div class="power-detail">Enrolled Human Power: <?php echo($post['EnrolledHuman']); ?> persons</div>
                <div class="power-detail">Committed Human Power: <?php echo($post['CommitedHuman']); ?> persons</div>
            </div>
            <input type="hidden" name="id" value="<?php echo($post['PostId']); ?>" >
            <input type="hidden" name="CropType" value="<?php echo($post['CropType']); ?>">
            <input type="hidden" name="Location" value="<?php echo($post['Location']); ?>">
            <input type="hidden" name="FieldSize" value="<?php echo($post['FieldSize']); ?>">
            <input type="hidden" name="Deadline" value="<?php echo($post['Deadline']); ?>">
            <input type="hidden" name="Work" value="<?php if (!$post['Rolled']) { echo"1";} else if(!$post['Collected']){ echo"2"; } else { echo"3"; } ?>">
            <input type="hidden" name="NeededHuman" value="<?php echo($post['NeededHuman']); ?>">
            <input type="hidden" name="EnrolledHuman" value="<?php echo($post['EnrolledHuman']); ?>">
            <input type="hidden" name="CommitedHuman" value="<?php echo($post['CommitedHuman']); ?>">
            <button type="submit" name="EnrollWork" class="enroll-button">Enroll the Work</button>
        </form>
        <?php endforeach;endif; ?>

    </section>
    
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
