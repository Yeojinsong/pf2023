<?php  

/*
Filename: Nav.php
Author: Yeojin Song 102060145
Date: 27 April 2018
Last Updated:
Description: navgation bar for the Play Wool Website
*/
?>

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container-fluid">
		<!-- Toggle menu for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
		</div>

		<!-- Collect the nav links for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
				<li><a href="catalogue.php">Catalogue</a></li>
				<li><a href="showCart.php">Shopping Cart</a></li>			
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">For Development Purposes Only<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="killSessionVariables.php">Kill Session</a></li>
						<li><a href="displaySessionVariables.php">Display Session Variables</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">For Testing Purposes Only<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="includes/connect.php">Database Connection</a></li>
						<li><a href="displayProducts.php">Display Products (Basic)</a></li>
						<li><a href="#">Display Products (Advanced)</a></li>
					</ul>
				</li>
				
				<?php
				// test is user logged in before display My Account menu
				if (isset($_SESSION['login']) && $_SESSION['login'] == "valid") {
				?>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">My Account<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="changePassword.php">Change Password</a></li>
							<li><a href="updatePersonalDetail.php">Update Personal Details</a></li>
							<li class="divider"></li>
							<li><a href="#">Display Orders</a></li>
						</ul>
					</li>
				<?php
				} // end of My Account test
				?>

			</ul>
			
			<?php
				// test is user logged in before display My Account menu
				if (isset($_SESSION['login']) && $_SESSION['login'] == "valid") {
			?>
			<p class="navbar-text navbar-right welcomeMsg">Welcome <?PHP echo $_SESSION['firstName'];?></p>
		
			<?php
			} // end of My Account test
			?>			
			
		</div>
	</div>
</nav>
