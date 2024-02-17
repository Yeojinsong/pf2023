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

// import the scroll to top of page button
include "includes/topPage.php";
?>

<body>
	<?php
		// include the navbar
		include "includes/nav.php";

		// import quick escape button
		include "includes/quickEscape.php";
	?>

	<?php
include "includes/team_connect.php";
	try {
		$sql = "SELECT name, img FROM tbl_heroImage where activeAboutUs IS TRUE;";
		
		$resultSet = $pdo->query($sql);
		
	} catch (PDOException $e) {
		echo "Error fetching heroImage:".$e->getMessage();

		exit();	
	}
	foreach ($resultSet as $row) {
		$name = $row['name'];
		$img = $row['img'];
	?>
	<div class="heroWrap">
		<img class="heroImage" src="<?php echo $img;?>" alt="<?php echo $name;?>">
	</div>
	<?php
	}
	?>

	<div class="container">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.php">HOME</a></li>
				<li class="breadcrumb-item active" aria-current="page">ABOUT'S US</li>
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
						<p>&#9660;</p>	
					</div>
				</a>
			
				<!-- Kara House statistic boxes first row -->
				<div class="accordionContent accordionContent1 row">
					<div class="col-12 col-md-6 col-lg-4 flex">
						<div class="statBox statBlue white">
							<h3>350 WOMEN AND CHILDREN</h3>

							<p>We supported 350 women and children this year.</p>
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-4 flex">
						<div class="statBox statPurple white">
							<h3>26 CULTURAL BACKGROUNDS</h3>

							<p>We worked with women of 26 linguistic and cultural backgrounds.</p>
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-4 flex">
						<div class="statBox statBlue white">
							<h3>75% EXPERIENCED PREVIOUS TRAUMA</h3>

							<p>75% of clients we work with have experienced childhood trauma.</p>
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-4 flex">
						<div class="statBox statPurple white">
							<h3>90% SUCCESSFUL COURT OUTCOMES</h3>

							<p>90% of the clients we support in court have a successful outcome.</p>
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-4 flex">
						<div class="statBox statBlue white">
							<h3>100% CHILDREN HAVE EXPERIENCED</h3>

							<p>All the children we have worked with have witnessed family violence.</p>
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-4 flex">
						<div class="statBox statPurple white">
							<h3>80% EXISTING MENTAL ILLNESS</h3>

							<p>80% of our clients have an existing mental illness.</p>
						</div>
					</div>
					<div class="col-12">
						<p>Operating for 40 years, Kara House is a not-for profit organisation, primarily funded by the Department of Health and Human Services. Further fundraising and Grants help support additional educational programs, well-being activities and improvements to the refuge.</p>
						
						<!-- ul list -->				
						<ul>
							<li>We believe in the right of women and children to live free of violence and provide highly secure accommodation which prioritises the safety</li><br>
							<li>We offer a range of programs and services including risk assessment, case management, outreach support, children’s programs, advocacy and client education</li><br>
							<li>We have a specialist understanding of the complexities of family violence which helps our clients make informed choices to improve their long term outcomes</li><br>
							<li>We challenge service providers, government and the community to adopt responses that do not tolerate violence to women and children</li>
						</ul>	
					</div>
				</div>

				<a href="#/" class="accordionButton" onclick="toggleAccordion('accordionContent2')">
					<div class="accordionHeading">
						<h3>Our History</h3>
						<p>&#9660;</p>	
					</div>
				</a>		
				<div class="accordionContent accordionContent2 row">
				  	<ul class="timeline">
						<li class="event timelineDate" data-date="1975">
							<p>The Italian welfare organisation Co-As-It (Comitato Assistenza Italiana) creates a place for women to reside in response to the existence of violence in Italian Families. The house, located in Carlton was self-funded by CO.AS.IT. and the Italian community.</p>
						</li>
						<li class="event timelineDate" data-date="1978">
							<p>Government support is introduced in Victoria for refuges and CO.AS.IT is one of the first to receive funding. This enables CO.AS.IT. to establish a permanent refuge.</p>
							<p>After lengthy discussions CO.AS.IT. relinquishes responsibility to a new body to be run solely for women</p>    
						</li>
						<li class="event timelineDate" data-date="1988">
							<p>The organisation purchases a permanent location which still houses the refuge to today</p>
							<p>The women’s refuge becomes an Incorporated Association known as Kara House</p>    
						</li>
						<li class="event timelineDate" data-date="2000">
							<p>Kara house, in response to community need, establishes a Domestic Violence Outreach program to provide information and support.</p>
						</li>
						<li class="event timelineDate" data-date="2002">
							<p>Kara house expands its Domestic Violence Outreach program to meet the needs of lesbian/same sex attracted women.</p>    
						</li>
						<li class="event timelineDate" data-date="2010">
							<p>Kara house receives funding from the department of Human Services to provide a program called A Place to Call Home.</p>    
						</li>
						<li class="event timelineDate" data-date="2014">
							<p>Kara House expands its Family Violence Outreach Program to include the entire LGBTI community</p>
							<p>Kara house moves office to larger premises with better facilities, sharing with another family violence service</p>
						</li>
						<li class="event timelineDate" data-date="2015">
							<p>Kara House takes a larger role in the Motel Outreach Program supporting up to 300 women and their children a year.</p>    
						</li>
						<li class="event timelineDate" data-date="2017">
							<p>Kara House introduces the Family Violence Support Group which provides 	ongoing support for women who have experienced family violence in the wider community</p>    
						</li>
					</ul>
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
					<h1>Our Partners</h1>
				</div>
				<a href="#/" class="accordionButton" onclick="toggleAccordion('accordionContent3')">
					<div class="accordionHeading">
						<h3>Who we work with</h3>
						<p>&#9660;</p>	
					</div>
				</a>
				<div class="accordionContent accordionContent3 row">
					<div class="col-12 borderBox row">
						<div class="col-12 col-lg-4 paddingImage paddingText paddingVic">
							<img class="partnerImage" src="images/vic.png" alt="placeholder">
						</div>
						<div class="col-12 col-lg-8 paddingText">
							<p>Kara House Management Committee and staff would like to thank the Department of Health and Human Services who provide our operational funding under the Funding and Service Agreement and to the staff of the Department in the Eastern Region who have assisted with their donation collections and ongoing support</p>
						</div>
					</div>
					<div class="col-12">
						<p>We’d like to thank the organisations and services liste d below who we partner with to provide services.</p>
					</div>
					<div class="col-12 borderBox row">
					
						<?php
							include "includes/team_connect.php";
							try {
																
								$sql = "SELECT * FROM tbl_workingWith where active IS TRUE";								
								$resultSet = $pdo->query($sql);								
							}

							catch (PDOException $e) {
								echo "Error fetching Clientstory:".$e->getMessage();
								exit();	
							}
							
							foreach ($resultSet as $row) {
								$name = $row['name'];
								$level = $row['level'];
								$logo = $row['logo'];
								$url = $row['url'];
								
								if($level == 2){
									echo "<div><img src=\"$logo\"><\"div>}";}
									
						?>
						<div class="col-12 col-lg-6 partnerWrapper">
							
							<ul class="centerList">
								<li><a href="<?php if($level==3){echo $url;}?>" target="_blank"><?php if($level==3){echo $name;}?></a></li>
							</ul>
						</div>
						<?php
							}
						?>
					</div>
				</div>

				<a href="#/" class="accordionButton" onclick="toggleAccordion('accordionContent4')">
					<div class="accordionHeading">
						<h3>Who we are</h3>
						<p>&#9660;</p>	
					</div>
				</a>
				<div class="accordionContent accordionContent4 row">
					<div class="col-12">
						<h3>Management Committee</h3>
						<p>Kara House is an Incorporated Association governed by a Management Committee with an executive elected by its Members.</p>
						
						<p>The Kara House Management Committee is comprised of knowledgeable women with extensive experience in business related disciplines such as Financial Services, Legal, IT, Human Resources, Fundraising and Marketing. Members also have welfare related knowledge, including general service provision and mental health.</p>
						
						<p>Kara House Management Committee has responsibility under the Associations Incorporation Reform Act 2012 and the Kara House constitution to provide leadership, set the strategic direction of the organisation and monitor the finances and activities. The Management Committee has overall responsibility to ensure Kara House is accountable and complies with all relevant legal and regulatory requirements and supports its vision, purpose and aims. Our Management Committee members are all volunteers that give of their time and expertise.</p> 
						
						<!-- Committee List -->	
						<p class="lowhead">Kara House Management Committee</p>
					</div>
					<div class="col-lg-6">
						<table style="width:100%">
						  <tr>
							<td class="tableLeft tableColor whiteText">Chair</td>
							<td class="tableCenter">Margaret Morrissey</td>
						  </tr>
						  <tr>
							<td class="tableLeft tableColor whiteText">Vice Chair</td>
							<td class="tableCenter">Catherine Lockstone</td>
						  </tr>
						  <tr>
							<td class="tableLeft tableColor whiteText">Treasurer</td>
							<td class="tableCenter">Jyoti Wardhen</td>
						  </tr>
						  <tr>
							<td class="tableLeft tableColor whiteText">Secretary</td>
							<td class="tableCenter">Melinda Harrison</td>
						  </tr>
						  <tr>
							<td class="tableLeft tableColor whiteText">Members</td>
							<td class="tableCenter">Veronica Coleman (Manager)<br>
								<br>Maureen Breen<br>
								<br>Susan Smith<br>
								<br>Chloe Brayne</td>
						  </tr>
						</table>
					</div>
					<div class="col-lg-6">
						<img class="img-fluid imgCenter img" src="images/committee.png" alt="placeholder">
					</div>
					<div class="col-12">					
						<!-- Joining Kara House -->	
						<p class="lowhead">Interested in joining the Kara House management Comittee?</p>
						<p class="">Kara House is governed by a Management Committee of capable and professional women and welcomes applications from women who can add to our skill base. If you are interested in joining the Kara House Management Committee, please email your expression of interest to the Manager at admin@karahouse.org.au</p><br>
						
						<br>
						
						<!-- Quality Improvement -->
						<p class="lowhead">Working to ensure Quality Improvement</p>
						<p class="">Kara House is constantly looking at our policies and procedures, risk management processes, client service delivery and human resource for ways of improving.</p>
						<p>Kara House was accredited under the Quality Improvement Council (QIP) and department of Human Services standards in 2015 and has previously been accredited under the Housing Assistance and Support Standards (HASS) and Quality Improvement and Community Service Standards (QICSA) standards in 2009 and 2011 and will seek re-accreditation under the Quality Improvement Council (QIP) and Department of Human Services in 2015.</p>

						<img src="images/qip.png" alt="qip">
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php 
		// include the footer and links
		include "includes/footer.php";
	?>
</body>
<?php 
	include "includes/jsLinks.php";
?>
</html>
