<?php
    
    session_start();

	include_once "../config.php";
	try {
		if (isset($_POST['Alogin'])) {
            
			$username = $_POST['email'];
			$password = $_POST['password'];

            $login = $conn->prepare("SELECT * FROM Users WHERE Email = ?");
            $login->execute([$username]);
            $alldata = $login->fetchAll(PDO::FETCH_ASSOC);

            $rowCount = count($alldata);
            if ($rowCount>0) {
                $data=$alldata[0];
                if (password_verify($password,$data["Password"])){
                    $_SESSION["type"]="Admin";
                    $_SESSION["username"]=$data["Name"];
                    header("location: Home.php");
                }
                else{
                    $_SESSION['error'] = "Invalid password";
                    // header("Location: index.php");             
                }
            }
            else{
                $_SESSION['error'] = "Invalid username";
                // header("Location: index.php");
            }
            }
		
	} catch (PDOException $e) {
		$_SESSION['error'] = "Can't Login The User because: " . $e->getMessage();
		// header("location: user.php");
	}   




?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="icon" type="image/jpeg" href="../img/favicon.jpeg">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="../css/universal.css">
    <link rel="stylesheet" type="text/css" href="../css/error.css">
    <link rel="stylesheet" type="text/css" href="../css/Flogin.css">
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4"><br><br><br><br><br>
        <h3 class="text-center mt-5">Admin</h3><br><br>
        <form method="POST" action="index.php">
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
                        // elseif (isset($_SESSION["username"])) {
                        //     header("location: ../logout.php");
                        // }


                ?>
          <div class="mb-3">
            <label for="number" class="form-label">Email ID</label>
            <input type="email" class="form-control" name="email" placeholder="Enter your Email ID" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Enter your password" required>
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="rememberMe">
            <label class="form-check-label" for="rememberMe">Remember me</label>
          </div>
          <button type="submit" name="Alogin" class="btn btn-success w-100">Login</button>
        </form>
        <p class="text-center mt-3">Don't have an account? <a href="./../SignUp.php">Sign up</a></p>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS (Optional) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../js/error.js"></script>
</body>
</html>

