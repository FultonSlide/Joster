<!DOCTYPE html>
<html lang="en">

<!--
	Author: William Qoro
	Creation Date: 11/04/2019

	Description:
	Assignment 1, a php script that returns any and all job posts to the user.
-->

<head>
	<title>JOSTER</title>
	<meta charset="utf-8">
	<meta name="Description" content="Web App Development Assignment 1">
	<meta name="Keywords" content="HTML, PHP">
	<link rel="icon" type="style/png" href="images/favicon.png">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans+Condensed" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet" type="text/css">
</head>
<body>
	<div id="container">
		<div id="content-wrap">
			<div id="header">
				<h1 class="heading"><a href="index.php">JOSTER</a></h1>
				<div id="logo">
					<a href="index.php"><img src="style/logo_transparent.png" alt="Job Poster logo"></a>
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
					$filename = "../../data/jobposts/jobs.txt"; //Gets the file path.

					if(file_exists($filename)) //Checks if jobs.txt file exists.
					{
						if(!(filesize($filename) == 0)) //Checks the jobs.txt file is not empty.
						{
							$handle = fopen($filename, "r"); //Opens the jobs.txt file in read mode.
							while(!feof($handle)) //While the file pointer is not at the end of the file continue.
							{
								$onedata = fgets($handle); //$onedata gets a single line of the jobs.txt file.
								if($onedata != "") //if the line from the file isn't nothing.
								{
									$data = explode("\t", $onedata); //Explodes the line from the text file using the delimiter '\t'.
									echo "<p><strong>$data[1]</strong></p><br/>
										  <p><span class='body-text'>Position ID: </span>$data[0]</p>
										  <p><span class='body-text'>Description: </span>$data[2]</p>
										  <p><span class='body-text'>Closing Date: </span>$data[3]</p>
										  <p><span class='body-text'>Position: </span>$data[4]</p>
										  <p><span class='body-text'>Contract: </span>$data[5]</p>
										  <p><span class='body-text'>Apply by: </span>$data[6] $data[7]</p>
										  <p><span class='body-text'>Location: </span>$data[8]</p><br/>"; //Echos the contents of the line in a meaningful format for the user.
								}
							}
							fclose($handle); //Closes the file.
						} else {
							echo "<p>No jobs have been posted.</p>"; //Error message.
						}
					} else {
						echo "<p><strong>Error:</strong></p><br/>"; //Error message.
						echo "<p>Jobs.txt file cannot be found.</p>";
					}
				?>
			</div>
		</div>

		<div id="footer">
			<br/>
			<p><span class="bottom-divide1">|</span><span class="return-butt"><a href="index.php">Home</a></span><span class="bottom-divide2">|</span></p>
		</div>
	</div>
</body>
</html>