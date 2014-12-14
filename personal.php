<?php
	session_start();
	//Check for HTTPS
	if (empty($_SERVER['HTTPS'])) {
		$redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		header("Location: $redirect");
		exit;
	}
	//Check for login, redirect if not
	if (!isset($_SESSION["loggedin"])) {
		header("Location: index.php?content=personal");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Dillon's Personal Stuff</title>
		<link rel="stylesheet" href="css/main.css">
		<style>
		
		</style>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	</head>

	<body>
		<header></header>
		<script>
			$("header").load("header.php");
		</script>
	</body>
</html>