<?php
	
    session_start();

	if (isset($_SESSION['type']) && $_SESSION['type']=='Farmer'){
		
	}
	else {
		header("location: ./../index.php");
	}   
?>