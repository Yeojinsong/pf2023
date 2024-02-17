<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="Web Programming :: assign 1" />
	<meta name="keywords" content="Web,programming" />
	<link rel="stylesheet" href="style.css">
	<title>About Page</title>
</head>
<body class="bodyForm">
	<h1>About Page</h1>
	<div class="answer">
		<button class="accordion active">What is the PHP version installed in mercury? </button> 
		<div class="panel" style="display:block;">
			<?php
				// prints e.g. 'Current PHP version: 4.1.1'
				echo 'Current PHP version: ' . phpversion();

				// prints e.g. '2.0' or nothing if the extension isn't enabled
				echo phpversion('tidy');
			?>
		</div>
		<button class="accordion">What tasks you have not attempted or not completed?</button> 
		<div class="panel">
			<h3>- Checkbox required in postjobform</h3>
			<h3>- Searchbar function</h3> 
			<p> With searchbar, it works with some keywords and it doesn't work with some others. I couldn't find the reason why.
			e.g. application type doesn't work with post keyword.</p>
		</div>
		<button class="accordion">What special features have you done, or attempted, in creating the site that we should know about?</button> 
		<div class="panel">I tried design and code this webstie by UX.</div>
		<button class="accordion">What discussion points did you participated on in the unit’s discussion board for Assignment 1? If you did not participate, state your reason.</button> 

		<div class="panel imgQ">
			<img src="img/question.png" alt="A question in discssion board">
			<img src="img/answer.png" alt="Answer of a question in discssion board">
		</div>

		<script>
			var acc = document.getElementsByClassName("accordion");
			var i;

			for (i = 0; i < acc.length; i++) {
			  acc[i].addEventListener("click", function() {
			    this.classList.toggle("active");
			    var panel = this.nextElementSibling;
			    if (panel.style.display === "block") {
			      panel.style.display = "none";
			    } else {
			      panel.style.display = "block";
			    }
			  });
			}
		</script>


	</div>
	<hr>
	<ul class='homeLinkList'>
		<li><a href="index.php">Go back to Home</a></li>
		<li><a href="postjobform.php">Post a job vacancy</a></li>
		<li><a href="searchjobform.php">Search for a job vacancy</a></li>
	</ul>
</body>
</html>