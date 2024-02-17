<?php session_start();
/*
Filename: displaySessionVariables.php
Author: Yeojin	Song 102060145
Date Created: 21 March 2018
Last Updated:
Description: Display the current session's
variables (use for development and testing
purposes only).
*/

// set the page title
$pageTitle = "Display Session Variables";

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
					<h1 class="text-success">Session Variables</h1>
					

				<h2>Current session variables are:</h2>
				
				<?php
				// display all session variables
				while ($var = each($_SESSION)) {
				printf("%s: %s<br>",$var['key'], $var['value']);
				}
				echo "<br><br>";
				// display contents of the multi-dimensional cart array (when we have a shopping cart)
				if (isset($_SESSION['cart'])) {
				echo "cart: ";
				print_r($_SESSION['cart']);
				}
				?>













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