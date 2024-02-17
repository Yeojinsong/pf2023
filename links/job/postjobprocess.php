<?php
if (isset ($_POST["submit"])) 
{ 
	if(!file_exists("../../data/jobposts/jobs.txt"))
	{
		umask(0007);
		$dir = "../../data/jobposts";
		mkdir($dir, 02770); 
	}

	$id = stripslashes($_POST["positionID"]);
	$title = stripslashes($_POST["jobTitle"]);
	$desc = stripslashes($_POST["jobDescription"]);
	$closingDate = stripslashes($_POST["closingDate"]);
	$position = stripslashes($_POST["position"]);
	$contract = stripslashes($_POST["contract"]);
	$app = $_POST["applicicationBy"];
	$location = $_POST["location"];
	
	$jobposts = array();
	// .s positoin ID check
	if(!empty($id))
	{
		if (strlen($id) == 5) 
		{ // check $id lenght is euqial to 5.
		 	if (substr($id, 0,1) == "P")
		 	{
	 			$num = substr($id, 1,4);
	 			if(is_numeric($num))
	 			{	
					if( strpos(file_get_contents("../../data/jobposts/jobs.txt"),$id) !== false)
					{
						echo"This id already exist";
					}
					else
					{
						array_push($jobposts, $id);
						// .s title check
						if(!empty($title))
						{
							if (strlen($title) <= 20) 
							{ // Title lenght check
								$pattern = "/^[A-Za-z-., !]+$/";
								if (preg_match($pattern, $title)) 
								{
									array_push($jobposts, $title);
									// .s desc check
									if(!empty($desc))
									{
										if (strlen($desc) <= 260) 
										{ // desc lenght check
											array_push($jobposts, $desc);
											// .s closing date check
											if(!empty($closingDate))
											{
												$closingDate = date('d/m/y');
												array_push($jobposts, $closingDate);
												// .s add positon, contact, accept location in jobposts array.
												array_push($jobposts, $position);
												array_push($jobposts, $contract);
												if(!empty($app))
												{	$newApp = "";
													for ($i = 0; $i < count($app); $i++) 
													{ 
														$newApp .= $app[$i]." ";
													}
													array_push($jobposts, $newApp);
												}
												array_push($jobposts, $location);
												// .e add positon, contact, accept location in jobposts array.
												//----------------------------------------------------------------------
												// .s add jobposts array in jobs.txt.
												$filename = "../../data/jobposts/jobs.txt"; // assumes php file is inside lab05
												$handle = fopen($filename, "a"); // open the file in append mode
												$jobposts = implode("~", $jobposts);
												$data = $jobposts."\n"; // concatenate item and qty delimited by new line
												if(is_writable($filename))
												{	
													//if(fwrite($handle, print_r($jobposts,true)))//add as array
													if(fwrite($handle, $data))
													{ // write string to text file
														 fclose($handle); // close the text file
														/* echo "<p style='color:green'>You job position added</p> "; */
														?>
														<script type="text/javascript">
														alert("You job position added");
														window.location.href = "postjobform.php";
														</script>
														<?php
													}
												}
												else
												{
													echo "<p style='color:red>Cannot add your job position</p> ";
													fclose($handle);
												}
											 	
											} 
											else 
											{ 
											 	echo "<p>Please enter closing date of job position.</p>";
											}
											// .e closing date check 
									 	}
									 	else 
									 	{	
									 		echo "<p>The maximum lenght of description of job position is 260.</p>";
									 	} 
									} 
									else 
									{ 
									 	echo "<p>Please enter description of job position.</p>";
									}
									// .e desc check 
								}
								else
								{
									echo "<p>The title can only contain alphanumeric characters including spaces, comma, period (full stop), and exclamation point. Other characters or symbols are not allowed.</p>";
								}
						 	}
						 	else 
						 	{	
						 		echo "<p>The maximum lenght of title is 20.</p>";
						 	} 
						} 
						else 
						{ 
						 	echo "<p>Please enter title of job position.</p>";
						}
						// .e title  check
					}
	 			}
	 			else
	 			{
	 				echo "<p>Please enter 4 digit numbers after letter P.</p>";
	 			}
	 		}
 			else
 			{
 				echo "<p>Psotion ID Must contain P in front.</p>";
 			}

	 	}
	 	else 
	 	{	
	 		echo "<p>Please enter 4 digit numbers after letter P.</p>";
	 	} 
	} 
	else 
	{ 
	 	echo "<p>Please enter Psotion ID with P + 4 digit numbers.</p>";
	}
	// .e position ID check 
}


else 
{ // no input
	echo "<p>Please enter data in the form</p>";
}
?>