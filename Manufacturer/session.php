<?php
	
    session_start();

	if (isset($_SESSION['type']) && $_SESSION['type']=='Manufacturer'){
		
	}
	else {
		header("location: ./../index.php");
	}   
?>