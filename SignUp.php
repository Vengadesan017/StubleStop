<?php
    
    session_start();

	include_once "config.php";
	try {
		if (isset($_POST['Create_User'])) {
			$name = $_POST['name'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$password1 = $_POST['password'];
			$password2 = $_POST['confirm-password'];

            if ($password1==$password2){
                if ($email) {
                    $create = $conn->prepare("INSERT INTO Users ( Name, Email, Phone, Password) VALUES (?, ?, ?, ?)");

                    $create->execute([$name, $email, $phone, password_hash($password, PASSWORD_DEFAULT)]);
        
                    $_SESSION['msg'] = 'Your Account ' . $name . ' was Created Successfully';
                    header("location: index.php");
                } else {

                    $create = $conn->prepare("INSERT INTO Users ( Name, Email, Phone, Password) VALUES (?, ?, ?, ?)");

                    $create->execute([$name, "DefaultEmailId".$phone."@ssmail.com", $phone, password_hash($password1, PASSWORD_DEFAULT)]);
        
                    $_SESSION['msg'] = 'Your Account ' . $name . ' was Created Successfully';
                    header("location: index.php");
                }
                


            }
            else{
                $_SESSION['error'] = 'Password Must Match'; 
                // header("location: SignUp.php");
            }



		}
	} catch (PDOException $e) {
		$_SESSION['error'] = "Can't Create New User because: " . $e->getMessage();
		// header("location: user.php");
	}   




?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up Form</title>
  <link rel="icon" type="image/jpeg" href="img/favicon.jpeg">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="css/universal.css">
    <link rel="stylesheet" type="text/css" href="css/error.css">
    <link rel="stylesheet" type="text/css" href="css/signup.css">
</head>
<body>
  <div class="container">
    <div class="row justify-content-center align-items-center">
      <div class="col-md-6"><br><br>
        <h3 class="text-center mt-5"id="one">Sign Up</h3>
        <form method="POST" action="SignUp.php">
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
                        elseif (isset($_SESSION["username"])) {
                            header("location: logout.php");
                        }
                        elseif (isset($_SESSION['user_id'])) {
                              header("location: logout.php"); 
                           }

                ?>
          <div class="mb-3"><br>
            <label for="name" class="form-label">Full Name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter your full name" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" placeholder="Enter your email" >
          </div>
          <div class="mb-3">
            <label for="phone" class="form-label">Phone No</label>
            <input type="number" class="form-control" name="phone" placeholder="Enter your Phone No" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Enter your password" required>
          </div>
          <div class="mb-3">
            <label for="confirm-password" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" name="confirm-password" placeholder="Confirm your password" required>
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" name="termsCheck">
            <label class="form-check-label" for="termsCheck">I agree to the <a href="#">terms and conditions</a></label>
          </div>
          <button type="submit" name="Create_User" class="btn btn-success w-100">Sign Up</button>
        </form>
        <p class="text-center mt-3">Already have an account? <a href="index.php">Login</a></p>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS (Optional) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/error.js"></script>
</body>
</html>

