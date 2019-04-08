<!DOCTYPE html>
<html lang="en">

<!--
	Author: William Qoro
	Creation Date: 28/03/2019

	Description:
	Assignment 1, php script that checks the input data from the job form page, writes the data to a text file and then generates the corresponding HTML output in response to the user's request.

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
			<?php
				$errMsg = "<p><ul>";
				$errCloseTag = "</ul></p>";
				$strCheck = strpos($_POST["posID"], "P");
				$pattern = "/^[a-zA-Z0-9,.!? ]*$/";
				$datePattern = "/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{2}$/";
				$title = $_POST["title"];
				$cloDate = $_POST["clodate"];

				if((isset($_POST["posID"])) && (empty($_POST["posID"]) == false) && ($strCheck == 0) && ($strCheck !== false))
				{
					$posID = $_POST["posID"];
				} else {
					$errMsg .= "<li>Please enter a unique position ID in the format: 'P0000'. <br/>";
				}

				if ((isset($_POST["title"])) && (empty($_POST["title"]) == false) && preg_match($pattern, $title))
				{
					$title = $_POST["title"];
				} else {
					$errMsg .= "<li>Please enter a valid Job title with only alphanumeric characters including spaces, commas, periods (full stop) and exclamation points. <br/>";
				}

				if ((isset($_POST["desc"])) && (empty($_POST["desc"]) == false))
				{
					$desc = $_POST["desc"];
				} else {
					$errMsg .= "<li>Please enter a valid description. <br/>";
				}

				if ((isset($_POST["clodate"])) && (empty($_POST["clodate"]) == false) && preg_match($datePattern, $cloDate))
				{
					$cloDate = $_POST["clodate"];
				} else {
					$errMsg .= "<li>Please enter a valid closing date in the formate: 'dd/mm/yy'. <br/>";
				}

				$errMsg .= $errCloseTag;

				if($errMsg == "<p><ul></ul></p>")
				{
					echo("<p>Job successfully posted!</p>");
					echo("<p><a href='index.php' class='return-form'>Home</a></p>");
				} else {
					echo("<strong>Error:</strong>");
					echo($errMsg);
					echo("<p><a href='jobpostform.php' class='return-form'>Return to Job Post Form</a></p>");
				}
			?>
		</div>

		<div id="footer">
			<p><span class="bottom-divide1">|</span><span class="return-butt"><a href="index.php">Home</a></span><span class="bottom-divide2">|</span></p>
		</div>
	</div>
</body>
</html>
