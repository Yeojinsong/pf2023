<?php if(session_id() == '') session_start();
/*
Filename: index.php
Author: Daniel Busch, Dahmon Bicheno, Aleksander Tudorin, Yeojin song, Blair Collins, Harris salehi
Date Created: 8/08/2018
Date Last updated: 11/10/2018
Last Updated By: Dahmon Bicheno
Description: Home page of the Kara House website
Version Number: 0.2
*/

// set the page title
$pageTitle = "Home";

// import the head section
include "includes/head.php";
?>

<body>
	<?php
		// include the navbar
		include "includes/nav.php";

		// import quick escape button
		include "includes/quickEscape.php";

		// import the scroll to top of page button
		include "includes/topPage.php";
	?>

	<!-- Carousel contnt from here -->

	<?php 
		include "includes/index/carousel.php";
	?>


	<!-- Main contnt of the index page from here -->

	<!-- statistic boxes -->

	<div class="container" >
		<div class="row">
			<div class="col-2 col-sm-3 col-md-4 d-none d-sm-flex headingLine">
				<section>
				</section>
			</div>
			<div class="col-12 col-sm-6 col-md-4 text-center pageHeading">
				<h1>Seek help</h1>
			</div>
			<div class="col-2 col-sm-3 col-md-4 d-none d-sm-flex headingLine">
				<section>
				</section>
			</div>
		</div>

		<div class="row">
			<?php
			include "includes/shared/statistics.php";
			statistics("activeHome");
			?>
		</div>

		<!-- Get Involved donation tabs & Image -->

		<div class="row">
			<div class="col-2 col-sm-3 col-md-4 d-none d-sm-flex paddingRightGone headingLine">
				<section>
				</section>
			</div>
			<div class="col-12 col-sm-6 col-md-4 text-center pageHeading">
				<h1>Get involved</h1>
			</div>
			<div class="col-2 col-sm-3 col-md-4 d-none d-sm-flex headingLine">
				<section>
				</section>
			</div>
		</div>

		<?php
			include "includes/shared/donation-area.php";
		?>

		<!-- What's New section & Media Items -->

		<div class="row">
			<div class="col-2 col-sm-3 col-md-4 d-none d-sm-flex headingLine">
				<section>
				</section>
			</div>
			<div class="col-112 col-sm-6 col-md-4 text-center pageHeading">
				<h1>News and resources</h1>
			</div>
			<div class="col-2 col-sm-3 col-md-4 d-none d-sm-flex headingLine">
				<section>
				</section>
			</div>
		</div>

		<!-- News items section -->

		<!-- News Item Featured -->

		<?php
			include "includes/index/featured-news.php";
		?>

		<!-- news item cards -->

		<?php
			include "includes/index/news-cards.php";
		?>

	</div>


	<?php
		// include the footer
		include "includes/footer.php";
		include "includes/jsLinks.php";
	?>
</body>
</html>
