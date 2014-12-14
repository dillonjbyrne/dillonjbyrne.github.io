<?php
	//Check for HTTPS
	if (empty($_SERVER['HTTPS'])) {
		$redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		header("Location: $redirect");
		exit;
	} 
	//Start Session
	session_start();
	//If logged in already, check if logout was pressed and handle, or redirect to index.
	if (isset($_SESSION["loggedin"])) {
		if ($_GET['action'] == "logout") {
			unset($_SESSION["loggedin"]);
			unset($_SESSION["loginfailure"]);
			header("Location: index.php");
			exit();
		}
	} else { //If not logged in, test if login successful and give appropriate feedback
		if ($_POST['username'] == "test" && $_POST['password'] == "pass") {
			$_SESSION['loggedin'] = $_POST['username'];
		} else {
			$_SESSION['loginfailure'] = true;
		}
	}
	//Redirect back to webpage
	header("Location: index.php?loginattempt=true");
	exit();
?>