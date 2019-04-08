<!DOCTYPE html>
<html lang="en">

<!--
	Author: William Qoro
	Creation Date: 28/03/2019

	Description:
	Assignment 1, job post form page where the user can enter in the information of a job post they wish to make.

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

		<form action="postjobprocess.php" method="post" id="body">
			<p><span class="form-title"><strong>Job Post Form:</strong></span><br/><br/>
				<!--TODO: validate all inputs to assignment criteria on assignment instuction sheet (in php or js?)-->
			    <div class="body-text">
					Position ID: <input type="text" name="posID" minlength="5" maxlength="5"><br/>
					Title: <input type="text" name="title" maxlength="20"><br/>
					Description: <br/><textarea rows="5" cols="40" name="desc" maxlength="260" placeholder="Enter description"></textarea><br/>
					Closing Date: <input type="text" name="clodate" value="<?php echo (date("d/m/y"));?>"><br/>
					Position: <span class="text-black"><input type="radio" name="pos">Full Time <input type="radio" name="pos">Part Time<br/></span>
					Contract: <span class="text-black"><input type="radio" name="cont">On-going <input type="radio" name="cont">Fixed Term<br/></span>
					Application by: <span class="text-black"><input type="checkbox" name="appby">Post <input type="checkbox" name="appby">Mail<br/></span>
					Location: 
					<select>
						<option value="default">--</option>
						<option value="VIC">VIC</option>
						<option value="NSW">NSW</option>
						<option value="QLD">QLD</option>
						<option value="SA">SA</option>
						<option value="NT">NT</option>
						<option value="WA">WA</option>
						<option value="TAS">TAS</option>
					</select><br/>
				</div>
				<input type="submit" name="Post">
				<input type="reset" name="Reset">
			</p>

			<div id="bottom">
				<p><strong>All fields are required.</strong></p>
			</div>
		</form>

		<div id="footer">
			<p><span class="bottom-divide1">|</span><span class="return-butt"><a href="index.php">Home</a></span><span class="bottom-divide2">|</span></p>
		</div>
	</div>
</body>
</html>