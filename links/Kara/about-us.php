<?php if(session_id() == '') session_start();
/*
Filename: AboutUs.php
Author: Daniel Busch, Dahmon Bicheno, Aleksander Tudorin, Yeojin song, Blair Collins, Harris salehi
Date Created: 12/10/2018
Date Last updated: 12/10/2018
Last Updated By: Aleksander Tudorin
Description: About Us page for the Kara House Website
Version Number: 0.1
*/

// set the page title
$pageTitle = "About Us";

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
		hero("activeAboutUs");
	?>

	<div class="container">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.php">HOME</a></li>
				<li class="breadcrumb-item active" aria-current="page">ABOUT US</li>
			</ol>
		</nav>
		<div class="row">
			<div class="col-12">
				<h1 class="pageTitle">About Us</h1>

				<p>Kara House is a specialist family violence service providing safe and secure accommodation and outreach services to women and children escaping family violence. We encourage and empower women to take control of their lives and work towards making strategies to create a better future.</p>
			</div>
		</div>

		<div class="row">
			<div class="statDetails col-12">
				<a href="#/" class="accordionButton" onclick="toggleAccordion('accordionContent1')">
					<div class="accordionHeading">
						<h3>About Kara House</h3>
						<img class="accordionArrowOpen" src="images/arrow.png" alt="arrow">
					</div>
				</a>

				<!-- Kara House statistic boxes first row -->
				<div class="accordionContentOpen accordionContent1 row">
					<?php
					include "includes/shared/statistics.php";
					statistics("activeAboutUs");
					?>

					<div class="col-12 mt-1">
						<?php
							include "includes/aboutUs/about-us-info.php";
						?>
					</div>
				</div>

				<a href="#/" class="accordionButton" onclick="toggleAccordion('accordionContent2')">
					<div class="accordionHeading">
						<h3>Our history</h3>
						<img class="accordionArrow" src="images/arrow.png" alt="arrow">
					</div>
				</a>
				<div class="accordionContent accordionContent2 row">

					<?php
						include "includes/aboutUs/history.php";
					?>

					<div class="col-12 col-lg-4 actionCard">
						<div class="bgGrey">
							<h3 class="white">Philosophy</h3>
							<p>
								All women should have the right to live free of family violence, harassment, discrimination and abuse.
							</p>
						</div>
					</div>
					<div class="col-12 col-lg-4 actionCard">
						<div class="bgGrey">
							<h3 class="white">Vision</h3>
							<p>
								Kara House is committed to providing a physical and personal environment which optimises the privacy, value and strength of the individual.
							</p>
						</div>
					</div>
					<div class="col-12 col-lg-4 actionCard">
						<div class="bgGrey">
							<h3 class="white">Mission</h3>
							<p>
								Kara House supports the rights of women and children to live in safety and without fear, using professional practice informed by feminist, human rights and social justice principles.
							</p>
						</div>
					</div>
				</div>

				<div class="section">
					<h1>Our partners</h1>
				</div>
				<a href="#/" class="accordionButton" onclick="toggleAccordion('accordionContent3')">
					<div class="accordionHeading">
						<h3>Who we work with</h3>
						<img class="accordionArrow" src="images/arrow.png" alt="arrow">
					</div>
				</a>
				<div class="accordionContent accordionContent3 row">
					<div class="col-12">
						<div class="borderBox">
							<div class="row">
								<?php
									include "includes/aboutUs/workingWithLevel1.php";
									workingWithLevel1();
								?>
							</div>
						</div>
						<div>
							<br>
							<p>We’d like to thank the organisations and services listed below who we partner with to provide services.</p>
						</div>
						<div class="borderBox">
							<div class="row">
								<?php
									include "includes/aboutUs/workingWithLevel2n3.php";
									workingWithLevel2n3();
								?>
							</div>
						</div>
					</div>
				</div>

				<a href="#/" class="accordionButton" onclick="toggleAccordion('accordionContent4')">
					<div class="accordionHeading">
						<h3>Who we are</h3>
						<img class="accordionArrow" src="images/arrow.png" alt="arrow">
					</div>
				</a>
				<div class="accordionContent accordionContent4 row">
					<div class="col-12">
						<h3 class="mainColour">Management Committee</h3>
						<p>Kara House is an Incorporated Association governed by a Management Committee with an executive elected by its Members.</p>

						<p>The Kara House Management Committee is comprised of knowledgeable women with extensive experience in business related disciplines such as Financial Services, Legal, IT, Human Resources, Fundraising and Marketing. Members also have welfare related knowledge, including general service provision and mental health.</p>

						<p>Kara House Management Committee has responsibility under the Associations Incorporation Reform Act 2012 and the Kara House constitution to provide leadership, set the strategic direction of the organisation and monitor the finances and activities. The Management Committee has overall responsibility to ensure Kara House is accountable, complies with all relevant legal and regulatory requirements, and supports its vision, purpose and aims. Our Management Committee members are all volunteers that give of their time and expertise.</p>

						<!-- Committee List -->
						<p class="lowhead">Kara House Management Committee</p>
					</div>
					<div class="col-lg-6">
						<?php
							include "includes/aboutUs/committee-table.php";
						?>
					</div>
					<div class="col-lg-6">
						<img class="img-fluid imgCenter img" src="images/committee.jpg" alt="Image">
					</div>
					<div class="col-12">
						<p>Learn more about Kara House through our <a href="media.php">Annual Reports</a></p>
						<!-- Joining Kara House -->
						<p class="lowhead">Interested in joining the Kara House Management Committee?</p>
						<p class="">Kara House is governed by a Management Committee of capable and professional women and welcomes applications from women who can add to our skill base. If you are interested in joining the Kara House Management Committee, please email your expression of interest to the Manager at <a href="mailto:admin@karahouse.org.au">admin@karahouse.org.au</a></p>

						<!-- Quality Improvement -->
						<p class="lowhead">Working to ensure Quality Improvement</p>
						<p class="">Kara House is constantly looking at our policies and procedures, risk management processes, client service delivery and human resource for ways of improving.</p>

						<p class="lowhead">Accreditation</p>
						<p>Kara House successfully underwent external Accreditation in March 2018 meeting all requirements. Accreditors from Quality Innovation Performance (QIP) assessed Kara House against the Quality Improvement Council standards (QIC) and the Department of Health and Human Service standards (HSS). Kara House is now an Accredited organisation through to 2021. The Management and staff of Kara House are committed to continuous improvement and we are proud to have achieved Accreditation and to have received positive feedback.</p>

						<img src="images/qip.png" alt="qip">
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
		// include the footer and links
		include "includes/footer.php";
		include "includes/jsLinks.php";
	?>
</body>
</html>
