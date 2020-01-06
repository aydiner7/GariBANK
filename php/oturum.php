<?php 
	session_start();

	try {
		$_SESSION["tc"] = $_POST["tc"];
		echo "1";
	} catch (Exception $e) {
		echo "0";
	}

 ?>