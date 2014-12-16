<?php
session_start();
//Check for HTTPS
if (empty($_SERVER['HTTPS'])) {
	$redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	header("Location: $redirect");
	exit;
}
?>

<!DOCTYPE html>

<html>
	<head>
		<title>Dillon John Byrne</title>
		<link rel="stylesheet" href="css/main.css">
		<style>
		</style>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
		<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" />
	</head>

	<body>
		<header></header>
		<script>
			$("header").load("header.php");
		</script>
		<div id="content">
			<?php
				//If survey was taken
				if (!empty($_POST)) {
				//Print survey results.
			?>
					<p>Here's your survey results:</p>
					<p>Name: <?php echo $_POST['name'];?></p>
					<p>Age: <?php echo $_POST['age'];?></p>
					<p>Gender: <?php echo $_POST['gender'];?></p>
					<p>Comments: <?php echo $_POST['comments'];?></p>
			<?php
				} else {
			?>
			<p>
				Welcome to my little corner of the web, make yourself at home! I'd
				offer you a drink but the internet doesn't work like that. Sorry.
			</p>
			<?php } ?>
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
							//JQuery UI in personal page.
							if (type == "personal") {
								$("#survey").button({ label: "Survey" }); //JQuery UI button
							}
							//JQuery UI in survey page.
							if (type == "survey") {
								$("#submit").button({ label: "Submit" }); //JQuery UI button
								$("#slider").slider({ //JQuery UI slider for alternate way to select age
									min: 1,
									max: 120,
									step: 1,
									slide: function( event, ui ) {
										$("#age").val(ui.value);
									}
								});
								$("#name").tooltip({ //JQuery UI tooltip
									show: {effect: "slideDown", delay: 250},
									hide: "slideUp"
								});
								$("#age").tooltip({ //JQuery UI tooltip
									show: {effect: "slideDown", delay: 250},
									hide: "slideUp"
								});
								$("#slider").tooltip({ //JQuery UI tooltip
									show: {effect: "slideDown", delay: 250},
									hide: "slideUp"
								});
								$(".gender").tooltip({ //JQuery UI tooltip
									show: {effect: "slideDown", delay: 250},
									hide: "slideUp"
								});
								$("#comments").tooltip({ //JQuery UI tooltip
									show: {effect: "slideDown", delay: 250},
									hide: "slideUp"
								});
							}
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
						case 'survey':
							xmlhttp.open("GET", "survey.html", true);
							break;
					}
					xmlhttp.send();
				}
			}
			<?php
				//Load personal page if requested
				if ($_SESSION["personal"] == true) {
					echo "loadContent('personal');";
					unset($_SESSION["personal"]);
				}
			?>
		</script>
	</body>
</html>