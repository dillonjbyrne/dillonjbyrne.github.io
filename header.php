<?php session_start();?>

<ul>
		<li id="title">Dillon John Byrne</li>
		<?php if (isset($_SESSION["loggedin"])) { echo "<li><button class=\"navbar\" onclick=\"window.location.href='login.php?action=logout'\">Logout</a></li>"; }?>
		<li><button class="navbar" onclick="loadContent('contact')">Contact</button></li>
		<li><button class="navbar" onclick="loadContent('resume')">Resume</button></li>
		<li><button class="navbar" onclick="loadContent('personal')">Personal</button></li>
		<li><button class="navbar" onclick="loadContent('about')">About</button></li>
		<li><button class="navbar" onclick="loadContent('index')">Home</button></li>
</ul>