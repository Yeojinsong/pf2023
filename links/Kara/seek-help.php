<?php if(session_id() == '') session_start();
/*
Filename: index.php
Author: Daniel Busch, Dahmon Bicheno, Aleksander Tudorin, Yeojin song, Blair Collins, Harris salehi 
Date Created: 8/08/2018
Date Last updated: 21/11/2018
Last Updated By: Yeojin Song
Description: Seek-help page of the Kara House website
Version Number: 0.1
*/

// set the page title
$pageTitle = "Seek Help";

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

		include "includes/shared/hero.php";
		hero("activeSeekHelp");
	?>

	<div class="container">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.php">HOME</a></li>
				<li class="breadcrumb-item active" aria-current="page">SEEK HELP</li>
			</ol>
		</nav>
		
		<div class="row">
			<div class="col-12">
				<h1 class="pageTitle">Seek Help</h1>
				<h1>How we can help</h1>

				<p>Kara House offer a range of programs to assist women and children in situations of control and abuse. These include crisis accommodation, emotional support, children’s services and community education.</p>
			</div>
		</div>
		
		<div class="row">
			<div class="statDetails col-12">
				<a href="#/" class="accordionButton" onclick="toggleAccordion('accordionContent1')">
					<div class="accordionHeading">
						<h3>Seek help now</h3>
						<img class="accordionArrowOpen" src="images/arrow.png" alt="arrow">
					</div>
				</a>

				<div class="accordionContentOpen accordionContent1 row">
					<div class="col-12">
						<p>Violence Response Centre (details below).</p>
						<div class="row">
							<div class="col-md-6 col-lg-5 flex">
								<div class="seekHelpBox">
									<h2 class="seekHelpHeading">Emergency</h2>
									<div class="seekHelpUnderline"></div>
									<p>If you are experiencing family violence or you’re concerned for someone’s safety and need immediate assistance: </p>
									<button class="seekHelpButton" onclick="location.href='tel:000';">Emergency/Police 24HR: 000</button>
								</div>
							</div>
							<div class="col-md-6 col-lg-5 flex">
								<div class="seekHelpBox">
									<h2 class="seekHelpHeading">Support and information</h2>
									<div class="seekHelpUnderline"></div>
									<p>If you require crisis support and information: <a href="www.safesteps.org.au">www.safesteps.org.au</a></p>
									<button class="seekHelpButton" onclick="location.href='tel:1800-015-188';">Safe steps 24HR Response: 1800 015 188</button>
								</div>
							</div>
						</div>
						<p class="d-inline">
							Kara House provides a confidential outreach support service to women experiencing family violence. We can provide support and information regarding your legal rights, accommodation options, and referral to counselling services, court support or other services as identified.
						</p>
						<form class="d-inline" id="seekHelpRedirect" action="be-informed.php" method="POST">
							<input type="hidden" name="seekHelpRedirect">
							<a href="javascript:{}" onclick="document.getElementById('seekHelpRedirect').submit();">Our Useful Resources</a>
						</form>
						<p class="d-inline">
							section has more information about other family violence support services and brochures.
						</p>
					</div>
				</div>

				<a href="#/" class="accordionButton" onclick="toggleAccordion('accordionContent2')">
					<div class="accordionHeading">
						<h3>Crisis accommodation</h3>
						<img class="accordionArrow" src="images/arrow.png" alt="arrow">
					</div>
				</a>

				<div class="accordionContent accordionContent2 row">
					<div class="col-12">
						<h4>Kara House provides safe and secure accommodation and for women and children escaping family violence.</h4>
						<div class="row">
							<div class="col-12 col-md-4 actionCard">
								<div class="bgGrey">
									<h3 class="white">Refuge</h3>
									<p>
										Part of the Victorian Women’s Crisis Accommodation service.
									</p>
								</div>
							</div>
							<div class="col-12 col-md-4 actionCard">
								<div class="bgGrey">
									<h3 class="white">Security</h3>
									<p>
										Highly secure accommodation that prioritises their safety in the immediate crisis.
									</p>
								</div>
							</div>
							<div class="col-12 col-md-4 actionCard">
								<div class="bgGrey">
									<h3 class="white">Material aid</h3>
									<p>
										Provision of material aid to address immediate needs.
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php
				include "includes/seekHelp/seekHelpFact.php";
				seekHelpFact();
				?>
			</div>
		</div>
		
		<?php
		include "includes/shared/clientStories.php";
		clientStories("activeSeekHelp");
		?>

		<div class="row section">
			<div class="col-12">
				<h1>Family Violence Support Group</h1>
			</div>
		</div>
		
		<div class="row">
			<div class="preventViolence col-12">
				<a href="#/" class="accordionButton" onclick="toggleAccordion('accordionContent100')">
					<div class="accordionHeading">
						<h3>Building hope and strength for the future.</h3>
						<img class="accordionArrow" src="images/arrow.png" alt="arrow">
					</div>
				</a>
				<div class="accordionContent accordionContent100">
					<p>The group is for women and their children who have experienced family violence and might be feeling alone, stuck and overwhelmed. It's a safe place to take time out, improve your well-being and develop strategies for the future. Over 6 weeks enjoy relaxation activities and time to talk with other women with similar circumstances. The group is facilitated by our Specialist Family Violence Practitioners who understand your situation and are there to help.</p>

					<p><strong>To find out more, or book your place, please contact Kara House on </strong><a href="tel:1800-900-520">1800 900 520</a> <strong>or email</strong> <a href="mailto:admin@karahouse.org.au">admin@karahouse.org.au</a></p>
					<div class="hidden">						
						<?php
							include "includes/seekHelp/supportGroup.php";
							supportGroup();
						?>						
						
						<div class="col-sm-12 groupBrochure">
							<div class="row">
								<div class="col-lg-8 col-sm-12 groupBrochureText"><p>Family Violence Support Group Brochure</p></div>
								<div class="col-lg-4 col-sm-12 groupBrochurebtn"><a class="groupBrochureButton" href="docs/Support_Group_Brochure.pdf" download>Download Brochure</a></div>
							</div>
						</div>
						

						<?php
							include "includes/seekHelp/supportGroupFAQ.php";
							supportGroupFAQ();
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
		// include the footer
		include "includes/footer.php";
		include "includes/jsLinks.php";
	?>
</body>
</html>
