<!DOCTYPE html>
<html lang="en">

<!--
	Author: William Qoro
	Creation Date: 28/03/2019

	Description:
	Assignment 1, a php page that checks the job title search string, reads the data from the job vacancy text file, searches for the occurrence of the job title string in each job vacancy record and generates the corresponding HTML output in response to the user’s search request.
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
					$queries = array(); //Sets up an array for all the user inputs from the serach form.

					$errMsg = "<p>"; //Sets up the opening tags of the error message that will be returned to the user in certain cases.
					$errCloseTag = "</p></br>"; //Sets up the closing tags of the error message to be concatenated with the content of the error message so it displays properly in HTML5.

					function job_search($haystack) //This function is passed an array of strings and checks all of those strings for any matching strings in the $queries array, if a match is found, true is returned.
					{
						$value = false;
						global $queries;

						foreach ($queries as $query)
						{
							if(strpos($haystack, $query) === false)
							{
								$value = false;
							} else {
								return true;
							}
						}
						return $value;
					}

					function date_sort($a, $b) //This function takes in two dates and converts them to larger integers and compares them to find out which one is larger.
					{
						if (strtotime($a) < strtotime($b))
						{
							return 1;
						} else if (strtotime($a) > strtotime($b))
						{
							return -1;
						} else {
							return 0;
						}
					}

					if(isset($_GET["jobtitle"]) && empty($_GET["jobtitle"]) == false) //Checks the jobtitle input is set and isn't empty, if it is it concatenates content to the error message.
					{
						$jobquery = $_GET["jobtitle"];
					} else {
						$errMsg .= "<li>Please enter a valid Job Title.</li>";
					}

					if(isset($_GET["position"]) && empty($_GET["position"]) == false) //Checks the position input is set and isn't empty, if it is it concatenates content to the error message.
					{
						$positionquery = $_GET["position"];
					} else {
						$positionquery = "Full Part Time";
					}

					if(isset($_GET["contract"]) && empty($_GET["contract"]) == false) //Checks the contract input is set and isn't empty, if it is it concatenates content to the error message.
					{
						$contractquery = $_GET["contract"];
					} else {
						$contractquery = "Fixed Term On-going";
					}

					if(isset($_GET["app"]) && empty($_GET["app"]) == false) //Checks the jobtitle application by is set and isn't empty, if it is it concatenates content to the error message.
					{
						$appquery = $_GET["app"];
					} else {
						$appquery = "Post Email";
					}

					if(isset($_GET["location"]) && empty($_GET["location"]) == false) //Checks the location input is set and isn't empty, if it is it concatenates content to the error message.
					{
						$locationquery = $_GET["location"];
					} else {
						$locationquery = "VIC NSW QLD TAS SA NT WA";
					}

					if($errMsg == "<p>") //if the error message is still equal to its decalred value, ie. hasn't had any content concatenated to it, it returns true.
					{
						$filename = "../../data/jobposts/jobs.txt"; //Stores the jobs.txt file and path.
						$dir = "../../data/jobposts"; //Stores the jobposts directory path.

						if(!(file_exists($dir))) //Checks if the directory exists.
						{
							echo "<p>Error: directory 'jobposts' not found.</p><br/>"; //Returns an error message to the user.
							echo "<p><a href='searchjobform.php' class='return-form'>Return to Search</a></p>";
						} else {
							if(file_exists($filename)) //Checks if the file exists.
							{
								$handle = fopen($filename, "r"); //Sets the handle with the open file in read mode.
								while(!feof($handle)) //While the pointer is not at the endof the file, continue.
								{
									$onedata = fgets($handle); //Store the first line of the file in $onedata.
									if($onedata != "") //If $onedata's not == to nothing.
									{
										$data = explode("\t", $onedata); //Explodes the line in $onedata by the \t delimiter.
										$posIDdata[] = $data[0]; //Stores the contents of the file line in the appropriate index of arrays.
										$titledata[] = $data[1];
										$descdata[] = $data[2];
										$clodatedata[] = $data[3];
										$posdata[] = $data[4];
										$contdata[] = $data[5];
										$app1bydata[] = $data[6];
										$app2bydata[] = $data[7];
										$locdata[] = $data[8];
									}
								}
								fclose($handle); //Closes the file.

								$jobqueries = explode(" ", $jobquery); //Explodes search strings from the user if they entered spaces.
								$posqueries = explode(" ", $positionquery);
								$contqueries = explode(" ", $contractquery);
								$appqueries = explode(" ", $appquery);
								$locqueries = explode(" ", $locationquery);

								if((!($jobqueries === false))) //Checks if the explodes returned strings or false and appropriatley stores either the multiple strings to the array $queries or just the single string.
								{
									for($i =0; $i < count($jobqueries); ++$i)
									{
										array_push($queries, $jobqueries[$i]);
									}
								} else {
									array_push($queries, $jobquery);
								}

								if((!($posqueries === false)))
								{
									for($i =0; $i < count($posqueries); ++$i)
									{
										array_push($queries, $posqueries[$i]);
									}
								} else {
									array_push($queries, $positionquery);
								}

								if((!($contqueries === false)))
								{
									for($i =0; $i < count($contqueries); ++$i)
									{
										array_push($queries, $contqueries[$i]);
									}
								} else {
									array_push($queries, $contractquery);
								}

								if((!($appqueries === false)))
								{
									for($i =0; $i < count($appqueries); ++$i)
									{
										array_push($queries, $appqueries[$i]);
									}
								} else {
									array_push($queries, $appquery);
								}

								if((!($locqueries === false)))
								{
									for($i =0; $i < count($locqueries); ++$i)
									{
										array_push($queries, $locqueries[$i]);
									}
								} else {
									array_push($titlequeries, $locationquery);
								}

								$titlematches = array_filter($titledata, 'job_search'); //Uses array filter to check if any of the queries match any of the data read from the file, if they do that key and value is stored in an array.
								$posIDmatches = array_filter($posIDdata, 'job_search'); //NOTE: apologies for the block code, whilst i could implement this using arrays in arrays and loops I unfortunatley ran out of time before the submission date to implement this.
								$descmatches = array_filter($descdata, 'job_search');
								$clodatematches = array_filter($clodatedata, 'job_search');
								$posmatches = array_filter($posdata, 'job_search');
								$contmatches = array_filter($contdata, 'job_search');
								$app1bymatches = array_filter($app1bydata, 'job_search');
								$app2bymatches = array_filter($app2bydata, 'job_search');
								$locmatches = array_filter($locdata, 'job_search');
								
								$matches = array();

								$matches = array_replace($matches, $titlematches); //Uses array replace to check through the arrays with matches in them and stores the keys existing in the datamatched arrays in the new array 'matches'.
								$matches = array_replace($matches, $posIDmatches);
								$matches = array_replace($matches, $descmatches);
								$matches = array_replace($matches, $clodatematches);
								$matches = array_replace($matches, $posmatches);
								$matches = array_replace($matches, $contmatches);
								$matches = array_replace($matches, $app1bymatches);
								$matches = array_replace($matches, $app2bymatches);
								$matches = array_replace($matches, $locmatches);

								if(!(empty($matches))) //If $matches isn't empty.
								{
									$filtdates = array();
									$dates = array();
									$h = max(array_keys($matches)); //As the keys in the $matches array arent in ascending order this finds the largest key so it can be used as the i < $h+1 condition which corresponds to the length of the array.

									for($i = 0; $i < $h+1; ++$i) 
									{
										$dates[$i] = $clodatedata[$i]; //Stores the dates of the job posts on the file in $dates.
										$filtdates[$i] = substr($dates[$i], 6, 2) . "-" . substr($dates[$i], 3, 2) . "-" . substr($dates[$i], 0, 2); //Reformats the dates to yy-mm-dd so the strtotime function can read it properly.
									}
									usort($filtdates, "date_sort"); //uses the date sort function to compare dates in the $filtdate array and order them from farthest in the future to today's date.

									for($i = 0; $i < count($filtdates); ++$i) 
									{
										$readdates[$i] = substr($filtdates[$i], 6, 2) . "/" . substr($filtdates[$i], 3, 2) . "/" . substr($filtdates[$i], 0, 2); //Re-formats the dates into dd/mm/yy to be matched against the dates in $clodatedata and be printed in the correct order.
									}

									for($i = 0; $i < count($readdates); ++$i) 
									{
										for($j = 0; $j < $h+1; ++$j) 
										{
											if(!(empty($matches[$j])))
											{
												if(strtotime($filtdates[$i]) >= strtotime(date('y-m-d'))) //Compares the dates of the job posts to the current date and if the current date is after the job post closing date that job dosent get returned to the user as it has lapsed.
												{
													if ($readdates[$i] == $clodatedata[$j]) //Checks through the $clodatedata array for the matching date of $readdates and iterates through $readdates from 0->n returning the job postings to the user in the order of furthest in the future to today's date.
													{
														echo "<p><strong>$titledata[$j]</strong></p><br/>
															  <p><span class='body-text'>Position ID:</span> $posIDdata[$j]</p>
															  <p><span class='body-text'>Description:</span> $descdata[$j]</p>
															  <p><span class='body-text'>Closing Date:</span> $clodatedata[$j]</p>
															  <p><span class='body-text'>Position:</span> $posdata[$j]</p>
															  <p><span class='body-text'>Contract:</span> $contdata[$j]</p>
															  <p><span class='body-text'>Apply by:</span> $app1bydata[$j] $app2bydata[$i]</p>
															  <p><span class='body-text'>Location:</span> $locdata[$j]</p><br/>";
													}
												}
											}
										}
									}
									echo "<p><a href='searchjobform.php' class='return-form'>Return to Search</a></p>"; //echos a link to the search page.
								} 
								else 
								{
									echo "<p>No matching job posts found.</p><br/>"; //Error message
									echo "<p><a href='searchjobform.php' class='return-form'>Return to Search</a></p>"; //Search page link
								}
							} 
							else
							{
								echo "<p>Error: file 'jobs.txt' not found. </p><br/>"; //Error message
								echo "<p><a href='searchjobform.php' class='return-form'>Return to Search</a></p>"; //Search page link
							}
						}
					} else {
						$errMsg .= $errCloseTag; //Concatenates the opening and closing tags of the error message together.
						echo "$errMsg"; //Echos the error message to the user.
						echo "<p><a href='searchjobform.php' class='return-form'>Return to Search</a></p>"; //Search page link.
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