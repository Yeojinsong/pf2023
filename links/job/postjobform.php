<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="Web Programming :: assgin 1" />
	<meta name="keywords" content="Web,programming" />
	<link rel="stylesheet" href="style.css">
	<title>Assign1</title>
</head>
<body class="bodyForm"> 
	<h1>Job Vacancy Posting System</h1>
	<div class="container">
		<form action="postjobprocess.php" method="POST">

			<label for="positionID">Position ID</label>
			<input type="text" id="positionID" name="positionID" placeholder="P0001" >

			<label for="jobTitle">Title</label>
			<input type="text" max="20" id="jobTitle" name="jobTitle" placeholder="IT Manager" >

			<label for="jobDescription">Desicription</label>
			<textarea id="jobDescription" name="jobDescription" placeholder="“This position promotes and supports the use of information technology throughout the organisation."style="height:200px" ></textarea>

			<label for="closingDate">Closing Date</label>
			<input type="date" id="closingDate" name="closingDate" value ="<?php date_default_timezone_set('Australia/Melbourne'); echo date('Y-m-d');?>" ><br>

			<label for="closingDate">Position</label><br>
			<input type="radio" id="fullTime" name="position" value="Full Time" required>
			<label for="fullTime">Full Time</label>
			<input type="radio" id="partTime" name="position" value="Part Time">
			<label for="partTime">Part Time</label><br>

			<label for="contract">Contract</label><br>
			<input type="radio" id="onGoing" name="contract" value="On going" required>
			<label for="onGoing">On-going</label>
			<input type="radio" id="fixedTerm" name="contract" value="Fixed Term">
			<label for="fixedTerm">Fixed Term</label><br>

			<label for="applicicationBy">Applicication By</label><br>
			<input type="checkbox" id="post" name="applicicationBy[]" value="Post">
			<label for="post">Post</label>
			<input type="checkbox" id="mail" name="applicicationBy[]" value="Mail">
			<label for="mail">Mail</label><br>

			<label for="location">Location</label>
			<select id="location" name="location" required>
				<option value="">---</option>
				<option value="ACT">ACT</option>
				<option value="NSW">NSW</option>
				<option value="NT">NT</option>
				<option value="QLD">QLD</option>
				<option value="SA">SA</option>
				<option value="TAS">TAS</option>
				<option value="VIC">VIC</option>
				<option value="WA">WA</option>
			</select>
			<div class="btns">
				<input type="submit" name="submit" value="Post"><input type="reset" value="Reset">
			</div>
		</form>
		<p>All fields are rquired. <a href="index.php">Return to Home Page</a></p>
	</div>
	<br>
</body>
</html>