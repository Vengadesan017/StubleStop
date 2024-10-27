<?php
	
    session_start();

	if (isset($_SESSION['type']) && $_SESSION['type']=='Admin'){
		
	}
	else {
		header("location: ./../index.php");
	}   
?>