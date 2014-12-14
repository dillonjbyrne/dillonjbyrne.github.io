<?php
session_start();
?>

<!DOCTYPE html>

<html>
	<head>
		<title>Dillon John Byrne</title>
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
		<div id="content">
			<?php
				switch($_GET["content"]) {
					case "about":
					?>
						<p>
							Hello! I'm Dillon, if you couldn't figure that out by the big name in 
							the top left corner. I'm a 21 year old computer science student at
							Mizzou. This website started as a final project for my World Wide Web
							class, so if you see some weird design choices, it's probably a holdover
							from that (you occasionally have to do odd things to satisfy all the
							requirements of a project specification.)
						</p>	
						
						<p>
							This is my little corner of the internet, make yourself at home! I'd
							offer you a drink but computers don't work like that. Sorry.
						</p>
					<?php
						break;
					case "personal":
						if (isset($_SESSION['loggedin'])) {
							header("Location: personal.php");
						} else {
							//Check for HTTPS
							if (empty($_SERVER['HTTPS'])) {
								$redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
								header("Location: $redirect");
								exit;
							}
							if (isset($_SESSION['loginfailure'])) {
								echo "<p>Login failed, please try again.</p>";
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
						}
						break;
					case "resume":
					?>
						<script>
							function loadResume() {
								var content = document.getElementById('content');
								content.innerHTML = "<object id=\"pdfviewer\"></object>";
								var object = document.getElementById('pdfviewer');
								object.type="application/pdf";
								object.data="resume.pdf";
								object.height="1070px";
								object.width="840px";
							}
							loadResume();
						</script>
					<?php
						break;
					case "contact":
					?>
						<p>If you need to get in contact with me for any reason, here's my details:</p>
						<p>School E-mail: djb8tc@mail.missouri.edu</p>
						<p>Personal E-mail: dillonbyrne@gmail.com</p>
						<p>Or you can find me on Facebook, Twitter or GitHub!<p>
						<p>
							<a href="https://www.facebook.com/dillonjbyrne"><img src="icons/facebook.png"></a>
							<a href="https://twitter.com/DillonJByrne"><img src="icons/twitter.png"></a>
							<a href="https://github.com/dillonjbyrne/"><img src="icons/github.png"></a>
						</p>
					<?php
						break;
					case "logout":
						unset($_SESSION["loggedin"]);
						unset($_SESSION["loginfailure"]);
						header("Location: index.php");
						break;
				}
			?>
		</div>
	</body>
</html>