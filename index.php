<!DOCTYPE html>
<html lang="en">

<!--
	Author: William Qoro
	Creation Date: 28/03/2019

	Description:
	Assignment 1, index.php landing page where the user can see the author students details, declaration of authentic work and use links to posting job page, searching job page and about page.

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
			   <p><span class="highlights">Name:</span> William Qoro <br/>
		   	   <span class="highlights">Student ID:</span> 100676265 <br/>
		 	   <span class="highlights">Email:</span> 100676265@student.swin.edu.au</p>

			    <p>I declare that this assignment is my individual work.<br/>I have not worked collaboratively nor have I copied from any other student's work or from any other source.</p>
		</div>
		<div id="footer">
		</div>
	</div>
</body>
</html>
