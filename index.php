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
			<p>
				Welcome to my little corner of the web, make yourself at home! I'd
				offer you a drink but the internet doesn't work like that. Sorry.
			</p>
		</div>	
		<script>
			function loadContent(type) {
				//If index is clicked, load default welcome text.
				if (type == "index") {
					document.getElementById('content').innerHTML = "<p>Welcome to my little corner of the web, make yourself at home! I'd offer you a drink but the internet doesn't work like that. Sorry.</p>";
				} else { //Otherwise, retrieve content using AJAX.
					xmlhttp=new XMLHttpRequest();
					xmlhttp.onreadystatechange = function() {
						if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
							document.getElementById('content').innerHTML = xmlhttp.responseText;
						}
					}
					document.getElementById('content').innerHTML = '<p>Loading...</p>';
					switch (type) {
						case 'about':
							xmlhttp.open("GET", "about.html", true);
							break;
						case 'personal':
							xmlhttp.open("GET", "personal.php", true);
							break;
						case 'resume':
							xmlhttp.open("GET", "resume.html", true);
							break;
						case 'contact':
							xmlhttp.open("GET", "contact.html", true);
							break;
					}
					xmlhttp.send();
				}
			}
			<?php
				//If redirected from a loginattempt, load personal page.
				if ($_GET["loginattempt"] == true) {
					echo "loadContent('personal');";
				}
			?>
		</script>
	</body>
</html>