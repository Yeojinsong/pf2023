<?php if(session_id() == '') session_start();
/*
Filename: index.php
Author: Daniel Busch, Dahmon Bicheno, Aleksander Tudorin, Yeojin song, Blair Collins, Harris salehi 
Date Created: 8/08/2018
Date Last updated: 8/08/2018
Last Updated By: Dahmon Bicheno
Description: Home page of the Kara House website
Version Number: 0.1
*/

// set the page title
$pageTitle = "Be Informed";

// import the head section
include "includes/head.php";
?>

<body>
	<?php
		// include the navbar
		include "includes/nav.php";

		// import the scroll to top of page button
		include "includes/topPage.php";

		// import quick escape button
		include "includes/quickEscape.php";

		// import hero image
		include "includes/shared/hero.php";
		hero("activeBeInformed");
	?>

	<div class="container">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.php">HOME</a></li>
				<li class="breadcrumb-item active" aria-current="page">BE INFORMED</li>
			</ol>
		</nav>

		<div class="row">
			<div class="col-12">
				<h1 class="pageTitle">Be Informed</h1>
				<h1>What is family violence?</h1>

				<p>Family violence is when someone behaves violently to another family member.</p>
				<p>It may be experienced within families, marriages, de facto relationships and lesbian relationships. It may be inflicted on adults and children or it may be between siblings or extended family members.</p>
			</div>
		</div>
		
		<div class="row">
			<?php
			include "includes/shared/statistics.php";
			statistics("activeBeInformed");
			?>
		</div>

		<?php
		include "includes/beInformed/beInformedFacts.php";
		beInformedFacts(1);

		include "includes/shared/clientStories.php";
		clientStories("activeBeInformed");
		?>

		<div class="row">
			<div class="col-12">
				<h1>How to prevent family violence</h1>
				<p>Family violence is complex and each experience is difference.</p>
				<ul>
					<li>From international evidence that the major cause is inequality between women and men – that is, the unequal distribution of power, resources and opportunities</li> 
					<li>Stereotypical ideas about the roles of women and men in society and the way they should behave, fosters an environment for violence against women to occur</li>
					<li>In individual relationships, this inequality plays out in the belief that a man is entitled to exercise power and control over his partner and children</li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="preventViolence col-12">
				<?php
				beInformedFacts(2);
				?>

				<a href="#/" class="accordionButton" onclick="toggleAccordion('accordionContent8')">
					<div class="accordionHeading">
						<h3>What can the community do to help?</h3>
						<img class="accordionArrow" src="images/arrow.png" alt="arrow">
					</div>
				</a>
				<div class="accordionContent accordionContent8 row">
					<div class="col-12 col-md-6 col-lg-4 actionCard">
						<div class="bgGrey">
							<h3 class="white">Crisis response</h3>
							<p>
								Support of women and children who are in high risk of harm.
							</p>
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-4 actionCard">
						<div class="bgGrey">
							<h3 class="white">Early intervention</h3>
							<p>
								Identification of and support of women and children experiencing family violence as early as possible.
							</p>
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-4 actionCard">
						<div class="bgGrey">
							<h3 class="white">Primary intervention</h3>
							<p>
								Population-based and community initiatives to educate and bring about social and cultural change.
							</p>
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-4 actionCard">
						<div class="bgGrey">
							<h3 class="white">Advocate for action</h3>
							<p>
								Advocate that action is needed through legislation and policy change by governments and organisations.
							</p>
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-4 actionCard">
						<div class="bgGrey">
							<h3 class="white">Advocate for rights</h3>
							<p>
								Advocate for the rights of women and children to live in safety and without fear, using professional practice informed by feminist, human rights and social justice principles.
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div id="resourceSection" class="row section">
			<div class="col-12">
				<h1>Useful Resources</h1>
				<div class="row">
					<div class="col-md-6 col-lg-5 resourceCol">
						<div class="resourceBox">
							<h2 class="resourceHeading">Our Services</h2>
							<div class="resourceHeadingUnderline"></div>
							<p>About Kara House and our services</p>
							<a class="resourceButton" href="docs/Kara-House-Brochure.pdf" download>Download Brochure</a>
						</div>
					</div>
					<div class="col-md-6 col-lg-5 resourceCol">
						<div class="resourceBox">
							<h2 class="resourceHeading">Work with LGBTI</h2>
							<div class="resourceHeadingUnderline"></div>
							<p>About Kara House and how we work with the LGBTI Community</p>
							<a class="resourceButton" href="docs/Kara-House-LGBTI-Brochure.pdf" download>Download Brochure</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php
		include "includes/beInformed/webLinks.php";
		?>
	</div>
	<?php
		// include the footer and links
		include "includes/footer.php";
		include "includes/jsLinks.php";

		if (isset($_POST['seekHelpRedirect'])) {
			?>
			<script type="text/javascript">
				document.getElementById('resourceSection').scrollIntoView();
				openSectionAccordion('webLinks');
			</script>
			<?php
			unset($_POST['seekHelpRedirect']);
		}
	?>
</body>
</html>
