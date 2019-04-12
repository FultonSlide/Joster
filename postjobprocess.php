<!DOCTYPE html>
<html lang="en">

<!--
	Author: William Qoro
	Creation Date: 28/03/2019

	Description:
	Assignment 1, php script that checks the input data from the job form page, writes the data to a text file and then generates the corresponding HTML output in response to the user's request.
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
					$errMsg = "<p>"; //Sets the start of the error message.
					$errCloseTag = "</p>"; //Sets the end of the error message.
					$strCheck = strpos($_POST["posID"], "P"); //Checks if the user has enter P in the position id input.
					$pattern = "/^[a-zA-Z0-9,.!? ]*$/"; 
					$datePattern = "/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{2}$/";
					$title = $_POST["title"];
					$cloDate = $_POST["clodate"];

					if((isset($_POST["posID"])) && (empty($_POST["posID"]) == false) && ($strCheck == 0) && ($strCheck !== false)) //Checks if posID isset and not empty as well as if P is in the position ID and is in the first position.
					{
						$posID = $_POST["posID"];
					} else {
						$errMsg .= "<p>Please enter a unique position ID in the format: 'P0000'. <br/>";
					}

					if ((isset($_POST["title"])) && (empty($_POST["title"]) == false) && preg_match($pattern, $title)) //Checks if the title isset and is not empty as well as has only alphanumeric characters, commas, periods, exclamation marks.
					{
						$title = $_POST["title"];
					} else {
						$errMsg .= "<p>Please enter a valid Job title with only alphanumeric characters including spaces, commas, periods (full stop) and exclamation points. <br/>";
					}

					if ((isset($_POST["desc"])) && (empty($_POST["desc"]) == false))
					{
						$desc = $_POST["desc"];
					} else {
						$errMsg .= "<p>Please enter a valid description. <br/>";
					}

					if ((isset($_POST["clodate"])) && (empty($_POST["clodate"]) == false) && preg_match($datePattern, $cloDate)) //Checks if clodate is set, is not empty and matches the date pattern dd/mm/yy.
					{
						$cloDate = $_POST["clodate"];
					} else {
						$errMsg .= "<p>Please enter a valid closing date in the format: 'dd/mm/yy'. <br/>";
					}

					if ((isset($_POST["pos"])) && (empty($_POST["pos"]) == false))
					{
						$pos = $_POST["pos"];
					} else {
						$errMsg .= "<p>Please select a position type.<br/>";
					}

					if ((isset($_POST["cont"])) && (empty($_POST["cont"]) == false))
					{
						$cont = $_POST["cont"];
					} else {
						$errMsg .= "<p>Please select a contract type.<br/>";
					}

					if (((isset($_POST["app1by"])) && (empty($_POST["app1by"]) == false)) || ((isset($_POST["app2by"])) && (empty($_POST["app2by"]) == false))) //Checks if the inputs on the checkbox have been selected then checks which ones have been selected, or either.
					{
						if(empty($_POST["app1by"]))
						{
							$app1by = " ";
						} else {
							$app1by = $_POST["app1by"];
						}

						if(empty($_POST["app2by"]))
						{
							$app2by = " ";
						} else {
							$app2by = $_POST["app2by"];
						}
					
					} else {
						$errMsg .= "<p>Please select an application type.<br/>";
					}

					if ((isset($_POST["loc"])) && (empty($_POST["loc"]) == false) && ($_POST["loc"] !== "default")) //Checks that the location dropdown has been selected and isn't default.
					{
						$loc = $_POST["loc"];
					} else {
						$errMsg .= "<p>Please select a location.<br/>";
					}

					$errMsg .= $errCloseTag; //Concatenates all the error content and the closing eroor message together.

					if($errMsg == "<p></p>") 
					{
						$filename = "../../data/jobposts/jobs.txt"; //Gets file path.
						$dir = "../../data/jobposts"; //Gets directory path.

						if(!(file_exists($dir))) //if the directory dosent exist it creates the directory with permissions to access.
						{
							umask(0007);
					        mkdir($dir, 02770);
						}

						if(file_exists($filename)) //if the file exists.
						{
							$posIDdata = array();
							$handle = fopen($filename, "r"); //Opens the file in read mode.
							while(!feof($handle)) //While the file pointer isn't at the end of the file, continue.
							{
								$onedata = fgets($handle); //$onedata gets a line from the file.
								if($onedata != "") //if $onedata isn't equal to nothing.
								{
									$data = explode("\t", $onedata); //Explodes the line around the delimiter '\t'.
									$posIDdata[] = $data[0]; //Stores the posID data.
								}
							}
							fclose($handle); //Closes the files

							if(in_array($posID, $posIDdata)) //if the posID is in the existing posID data from the file the $newdata boolean is set to false meaning the entered psoition ID is not unique.
							{
								$newdata = false;
							} 
							else 
							{
								$newdata = true;
							}
						} 
						else
						{
							$newdata = true;
						}

						if($newdata) //if the position ID is unique and the $newdata is true.
						{
							$handle = fopen($filename, "a"); //Opens file in append mode.
							$data = $posID . "\t" . $title . "\t" . $desc . "\t" . $cloDate . "\t" . $pos . "\t" . $cont . "\t" . $app1by . "\t" . $app2by . "\t" . $loc . "\n"; //Concatenates the data from the job post submission form with tabs and end of line escape characters.
							fputs($handle, $data); //Puts the data into the jobs.txt file.
							fclose($handle); //Closes the file.

							echo("<p>Job successfully posted!</p><br/>"); //Echos a success message back to the user.
							echo("<p><a href='index.php' class='return-form'>Home</a></p>"); //Link to the home page.
						} else 
						{
							echo "<p>Job post Position ID already exists</p><br/>"; //Error message.
							echo("<p><a href='jobpostform.php' class='return-form'>Return to Job Post Form</a></p>"); //Link back to the job post page.
						}
					} else {
						echo("<strong>Error:</strong><br/>");
						echo($errMsg); //Echos the error message back to the user.
						echo("<br/><p><a href='jobpostform.php' class='return-form'>Return to Job Post Form</a></p>"); //Link back to the job post form.
					}
				?>
			</div>
		</div>

		<div id="footer">
			<br/><p><span class="bottom-divide1">|</span><span class="return-butt"><a href="index.php">Home</a></span><span class="bottom-divide2">|</span></p>
		</div>
	</div>
</body>
</html>
