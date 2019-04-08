<!DOCTYPE html>
<html lang="en">

<!--
	Author: William Qoro
	Creation Date: 28/03/2019

	Description:
	Assingment 1, page that contains a search field that accepts a job title search string.

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

		<form action="#" method="get" id="body">
			<span class="body-text">Job Title: <input type="text" name="jobtitle"></span>
			<input type="submit" name="Search">
		</form>

		<div id="footer">
			<p><span class="bottom-divide1">|</span><span class="return-butt"><a href="index.php">Home</a></span><span class="bottom-divide2">|</span></p>
		</div>
	</div>
</body>
</html>