<?php
	session_start();
	//Check for HTTPS
	if (empty($_SERVER['HTTPS'])) {
		$redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		header("Location: $redirect");
		exit;
	}
	//Check for login, display login prompt if not
	if (!isset($_SESSION["loggedin"])) {
		//Check for previous login failure. Display error if present, display generic message if not.
		if (isset($_SESSION['loginfailure'])) {
				echo "<p>Previous login failed, please try again.</p>";
		} else {
			echo "<p>Personal can only be accessed by myself and friends (and graders!), please login.</p>";
		}	
?>
		<form action="login.php" method="post">
			<label for="username">Username:</label>
			<input type="text" name="username" id="username">
			<label for="password">Password:</label>
			<input type="password" name="password" id="password">
			<input type="submit" name="submit" class="submit" value="Log In">
		</form>
<?php
	} else {
?>
		
<?php
	}						
?>