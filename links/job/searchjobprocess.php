<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="description" content="Web application development" />
	<meta name="keywords" content="PHP" />
	<meta name="author" content="Yeojin Song" />
	<link rel="stylesheet" href="style.css">
	<title>Search Job Process</title>
</head>
<body class="bodyForm">
	<h1>Vacancy Job Lists</h1>
<?php 
if(isset($_GET['submit']))
{	
	if(!empty($_GET["searchbar"]))
	{
		$filter = stripslashes($_GET["filter"]);
		$title = stripslashes($_GET["searchbar"]);
		$titleLower = strtolower($title);
		$jobs = file_get_contents("../../data/jobposts/jobs.txt");
		$jobsLower = strtolower($jobs);

		$filename = "../../data/jobposts/jobs.txt"; 
		 $alldata = array(); // create an empty array
		 if (file_exists($filename)) 
		 { // check if file exists for reading
			 $eachdata = array(); // create an empty array
			 $handle = fopen($filename, "r"); // open the file in read mode
			 while (! feof ($handle)) 
			 { // loop while not end of file
				$onedata = fgets($handle); // read a line from the text file
				if ($onedata != "") 
				{ // ignore blank lines
					$data = explode("\n", $onedata); // explode string to array
					$alldata [] = $data; // create an array element
					$eachdata[] = explode("~", $data[0]); // create a string element
					//
				}
			}
			 fclose ($handle); // close the text file
		}
		// Tried to make it as advance search but it didn't work.
		/*if(strpos($jobsLower,$titleLower))
		{
			foreach ($eachdata as $data) 
			 { // loop using for each
			 	$data = array_map('strtolower', $data);
			 	if(strpos($filter,"all")=== true) 
			 	{
			 		echo "All:".$filter . " " . $titleLower;
			 		if(in_array($titleLower, $data))
			 		{
			 			echo "in_array";
			 			echo "<div class='searchResult'>";
						echo "<strong>Job ID: </strong>".$data[0]."<br>";
						echo "<strong>Job Title: </strong>".$data[1]."<br>";
						echo "<strong>Description: </strong>".$data[2]."<br>";
						echo "<strong>Closing Date: </strong>".$data[3]."<br>";
						echo "<strong>Position: </strong>".$data[4]."<br>";
						echo "<strong>Contract: </strong>".$data[5]."<br>";
						echo "<strong>Application by: </strong>".$data[6]."<br>";
						echo "<strong>Location: </strong>".$data[7]."<br>";
						echo "</div>";

			 		}
			 	}
			 	else
			 	{	
			 		echo "No:".$data[$filter] . " / " .$titleLower;
				 	//if(in_array($title, $data))
				 	if(strpos(strtolower($data[$filter]), $titleLower))
			 		{
			 			echo "strpos";
			 			echo "<div class='searchResult'>";
						echo "<strong>Job ID: </strong>".$data[0]."<br>";
						echo "<strong>Job Title: </strong>".$data[1]."<br>";
						echo "<strong>Description: </strong>".$data[2]."<br>";
						echo "<strong>Closing Date: </strong>".$data[3]."<br>";
						echo "<strong>Position: </strong>".$data[4]."<br>";
						echo "<strong>Contract: </strong>".$data[5]."<br>";
						echo "<strong>Application by: </strong>".$data[6]."<br>";
						echo "<strong>Location: </strong>".$data[7]."<br>";
						echo "</div>";
			 		}
			 	}
			 }
			 echo "<ul class='linkList'><li><a href='searchjobform.php'>Search for another job vacancy</a></li>";
				echo "<li><a href='index.php'>Return to Home page</a></li></ul>";

		}*/
		
		 foreach ($eachdata as $data) 
		 { // loop using for each
		 	$dataLower = array_map('strtolower', $data);

		 	if ($filter >= 1) 
		 	{
			 	if(isset($dataLower[$filter])&&strpos($dataLower[$filter], $titleLower))
		 		{	
		 			//echo "str";
		 			echo "<div class='searchResult'>";
					echo "<strong>Job ID: </strong>".$data[0]."<br>";
					echo "<strong>Job Title: </strong>".$data[1]."<br>";
					echo "<strong>Description: </strong>".$data[2]."<br>";
					echo "<strong>Closing Date: </strong>".$data[3]."<br>";
					echo "<strong>Position: </strong>".$data[4]."<br>";
					echo "<strong>Contract: </strong>".$data[5]."<br>";
					echo "<strong>Application by: </strong>".$data[6]."<br>";
					echo "<strong>Location: </strong>".$data[7]."<br>";
					echo "</div>";
		 		}
		 	}

	 		if(in_array($titleLower, $dataLower))
	 		{
	 			//echo "array";
	 			echo "<div class='searchResult'>";
				echo "<strong>Job ID: </strong>".$data[0]."<br>";
				echo "<strong>Job Title: </strong>".$data[1]."<br>";
				echo "<strong>Description: </strong>".$data[2]."<br>";
				echo "<strong>Closing Date: </strong>".$data[3]."<br>";
				echo "<strong>Position: </strong>".$data[4]."<br>";
				echo "<strong>Contract: </strong>".$data[5]."<br>";
				echo "<strong>Application by: </strong>".$data[6]."<br>";
				echo "<strong>Location: </strong>".$data[7]."<br>";
				echo "</div>";

	 		}
		 	
		 }
		echo "<ul class='linkList'><li><a href='searchjobform.php'>Search for another job vacancy</a></li>";
		echo "<li><a href='index.php'>Return to Home page</a></li></ul>";
	}
	else
	{
		echo"Please enter job title in searchbar";
	}
}
?>
</body>
</html>