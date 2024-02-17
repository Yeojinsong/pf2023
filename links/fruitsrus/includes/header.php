<?php

/*
Filename: header.php
Author: Yeojin Song
Date: 28 March 2018
Last Updated:
Description: Header section for the Fruits 'R' Us Website
*/
?>

<header>
	<div class="jumbotron">
		<h1>Fruits 'R' Us</h1>

		<p>There is no guilt in eating fruit ...<p>

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
				<button type="button" class="btn btn-success btn-default btn-lg"><a href="logOff.php" class="logoff">Login Off</a></button>
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
