<?php
	//Check for HTTPS
	if (empty($_SERVER['HTTPS'])) {
		$redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		header("Location: $redirect");
		exit;
	} 
	//Start Session
	session_start();
	//If logged in already, redirect to index.
	if (isset($_SESSION["loggedin"])) {
		header("Location: index.php");
		exit();
	} else {
		if ($_POST['username'] == "test" && $_POST['password'] == "pass") {
			$_SESSION['loggedin'] = $_POST['username'];
		}
		header("Location: index.php?content=personal");
		exit;
	}
?>