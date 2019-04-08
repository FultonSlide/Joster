<!DOCTYPE html>
<html lang="en">

<!--
	Author: William Qoro
	Creation Date: 28/03/2019

	Description:
	Assignment 1, page for presenting whats been done based on the questions provided.

	TODO:
	-CSS
	++
-->

<head>
	<title>JOSTER</title>
	<meta charset="utf-8">
	<meta name="Description" content="Web App Development Assignment 1">
	<meta name="Keywords" content="HTML, PHP">
	<link rel="icon" type="image/png" href="images/favicon.png">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans+Condensed" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet" type="text/css">
</head>
<body>
	<div id="container">
		<div id="header">
			<h1 class="heading"><a href="index.php">JOSTER</a></h1>
			<div id="logo">
				<a href="index.php"><img src="images/logo_transparent.png" alt="Job Poster logo"></a>
			</div>
			<div id="links">
	    		<p>
	    			<span class="select1"><a href="jobpostform.php">Post</a></span> <span class="divide1">|</span>
	    			<span class="select2"><a href="searchjobform.php">Search</a></span> <span class="divide2">|</span>
	    			<span class="select3"><a href="about.php">About</a></span>
	    		</p>
	    	</div>
		</div>

		<div id="body">
			<p><strong>What is the PHP version installed in Mercury?</strong></p>
			<p>
				<?php
					echo "Current PHP version installed: " . phpversion();
				?>	
			</p>
			<p><strong>What tasks have you not attempted or not completed?</strong></p>
			<p>TODO: saving posts, searching posts and returning searches.</p>
			<p><strong>What special features have you done, or attempted, in creating the site that we should know about?</strong></p>
			<p>Implemented CSS to a high standard.</p>
			<p><strong>What discussion points did you participate on in the unit's discussion board for Assignment 1? If you did not participate state your reason.</strong></p>
			<p><img src="images/DiscCont.png" class="disc-cont"></p>
		</div>

		<div id="footer">
			<p><span class="bottom-divide1">|</span><span class="return-butt"><a href="index.php">Home</a></span><span class="bottom-divide2">|</span></p>
		</div>
	</div>
</body>
</html>