<?php if(session_id() == '') session_start();
/*
Filename: index.php
Author: Daniel Busch, Dahmon Bicheno, Aleksander Tudorin, Yeojin song, Blair Collins, Harris salehi
Date Created: 6/08/2018
Date Last updated: 6/08/2018
Description: Home page of the Kara house website
*/

// set the page title
$pageTitle = "What's New";

// import the head section
include "includes/head.php";
?>

<body>
	<?php
	include "includes/nav.php";

	// import quick escape button
	include "includes/quickEscape.php";

	// import the scroll to top of page button
	include "includes/topPage.php";

	include "includes/shared/hero.php";
	hero("activeWhatsNew");
	?>

	<div class="container">

		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.php">HOME</a></li>
				<li class="breadcrumb-item active" aria-current="page">WHAT'S NEW</li>
			</ol>
		</nav>

		<div class="row">
			<div class="col-sm-12">
				<h1 class="pageTitle">What's New</h1>
			</div>
		</div>

		<div class="row">
			<div class="col-12">
				<?php include "includes/whatsNew/whatsNewphp.php";?>

			</div> <!-- end of col-12 -->
		</div> <!-- end of row -->
	</div> <!-- end of container -->


	<?php
	// include the footer
	include "includes/footer.php";
	include "includes/jsLinks.php";
	?>
</body>
</html>
