<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="description" content="Web application development" />
	<meta name="keywords" content="PHP" />
	<meta name="author" content="Yeojin Song" />
	<link rel="stylesheet" href="style.css">
	<title>Search Job Vacancy Page</title>
	</head>
	<body class="searchForm">
		<h1>Job Vacancy Posting System</h1>
		<form action = "searchjobprocess.php" method = "GET" >
			<fieldset id="searchSet">
				<div id="fieldSearch">
				<select id="filter" name="filter">
					<option value="1">Search Filter</option>
					<option value="4">Position</option>
					<option value="5">Contract</option>
					<option value="6">Application type</option>
					<option value="7">Location</option>
				</select>

				<input type="text" id="searchbar" name="searchbar" placeholder="Enter keyword">
				<input type="submit" name="submit" value="Search">
				</div>
			</fieldset>
		</form>
	</body>
	</html>