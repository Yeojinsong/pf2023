<?php  if (session_id() =='') session_start();

/*
Filename: xxxxxxxxx.php
Author: Janet Bott
Date: 27 February 2018
Description: xxxxxxxx page for Fruits 'R' Us website
*/

// set the page title
$pageTitle = "xxxxxxx";

// import the head section
include "includes/head.php";
?>

	<body>
		<?php
		// import the nav section
		include "includes/nav.php";

		// import the head section
		include "includes/header.php";

		// import the login modal
		include "includes/loginModal.php";
				
		// import the top of page button
		include "includes/topofpagebutton.php";
		?>

		<!-- main content -->
		<section class="container mainContent">

			<!-- xxxxxxxxxx row -->
			<div class="row">
				<section class="col-sm-12">
					<h1 class="text-success">xxxxxxxxxx</h1>















				</section>
			</div> <!-- end of xxxxxxxxxxx row -->


		</section> <!-- end of main content -->

		<?php  
		
			//import the social media
			include "includes/socialMedia.php"; 
			
			//import the footer section 
			include "includes/footer.php";
			
		?>
	</body>
</html>