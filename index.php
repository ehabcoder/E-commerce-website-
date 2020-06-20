<?php
include("Model/config.php");
	if(isset($_SESSION['userLoggedIn'])) {
		$userLoggedIn = $_SESSION['userLoggedIn'];
		header("Location: home.php");
	}
	else {
		header("Location: register.php");
	}

 ?>
