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
			<input type="submit" name="submit" value="Log In">
		</form>
<?php
	} else {
?>
		<p>I'm sure if you're my friend, you've seen this already. But if you haven't, you need to!</p>
		<iframe width="853" height="480" src="//www.youtube.com/embed/UJSyY5HZNYw" frameborder="0" allowfullscreen></iframe>
		<div id="column1">
			<p>Take a survey about what you think of my website!</p>
			<button id="survey" onclick="loadContent('survey')"></button>
		</div>
<?php
	}						
?>