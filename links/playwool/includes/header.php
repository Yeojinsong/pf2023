<?php

/*
Filename: header.php
Author: Yeojin Song 102060145
Date: 28 March 2018
Last Updated:
Description: Header section for the Play Wool Website
*/
?>

<header>
	<div class="jumbotron">
		<h1><?php echo $pageTitle; ?></h1>

		<p>Enjoy your knitting with us<p>

		<div class="row">
			<div class="col-sm-6">
				<a href="catalogue.php" class="btn btn-success btn-lg">View Products</a>
			</div>

			<div class="col-sm-6 text-right">
				<?php
				//test if customer logged in and if so display logout button.
				if (isset($_SESSION['login']) && $_SESSION['login'] == "valid")   {
				?>
				<!-- log off button-->
				<button type="button" class="btn btn-success btn-default btn-lg"><a href="logOff.php" class="logoff">Log Off</a></button>
				<?php
				}
				else {
				?>
				<!-- Trigger the modal with a button -->
				<button type="button" class="btn btn-success btn-default btn-lg" id="myBtn">Login</button>
				<?php
				}
				?>
			</div>
		</div>
	</div>
</header>