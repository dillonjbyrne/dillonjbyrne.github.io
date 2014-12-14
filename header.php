<?php session_start();?>

<ul>
		<li id="title">Dillon John Byrne</li>
		<?php if (isset($_SESSION["loggedin"])) { echo "<li><a class=\"navbar\" href=\"index.php?content=logout\">Logout</a></li>"; }?>
		<li><a class="navbar" href="index.php?content=contact">Contact</a></li>
		<li><a class="navbar" href="index.php?content=resume">Resume</a></li>
		<li><a class="navbar" href="index.php?content=personal">Personal</a></li>
		<li><a class="navbar" href="index.php?content=about">About</a></li>
		<li><a class="navbar" href="index.php">Home</a></li>
</ul>