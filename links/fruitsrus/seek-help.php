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
		<div class="row">
			<div class="col-12">
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="#">HOME</a></li>
				    <li class="breadcrumb-item active" aria-current="page">SEEK HELP</li>
				  </ol>
				</nav>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<h1 class="pageTitle">Seek Help</h1>
				<h1>How we can help</h1>

				<p>Kara House offer a range of programs to assist women and children in situations of control and abuse. These include crisi accommodation, emotional support, children’s services and community education.</p>
			</div>
		</div>
		<div class="row">
			<div class="statDetails col-12">
				<a href="#/" class="accordionButton" onclick="toggleAccordion('accordionContent1')">
					<div class="accordionHeading">
						<h3>Seek help now</h3>
						<p>&#9660;</p>
					</div>
				</a>

				<div class="accordionContent accordionContent1 row">
					<div class="col-12">
						<p>Violence Response Centre (details below).</p>
						<div class="row">
							<div class="col-md-6 col-lg-5 flex">
								<div class="seekHelpBox">
									<h2 class="seekHelpHeading">Emergency</h2>
									<div class="seekHelpUnderline"></div>
									<p>If you are experiencing family violence or you’re concerned for someone’s safety and need immediate assistance: </p>
									<button class="seekHelpButton">Emergency/Police 24HR : 000</button>
								</div>
							</div>
							<div class="col-md-6 col-lg-5 flex">
								<div class="seekHelpBox">
									<h2 class="seekHelpHeading">Support and information</h2>
									<div class="seekHelpUnderline"></div>
									<p>If you require crisis support and information: <a href="www.safesteps.org.au">www.safesteps.org.au</a></p>
									<button class="seekHelpButton">Safe steps 24HR Response : 1800 015 188</button>
								</div>
							</div>
						</div>
						<p>Kara House provides a confidential outreach support service to women experiencing family violence. We can provide support and information regarding your legal rights, accommodation options, referral to counselling services, court support or other services as identified.
						<a href="be-informed.php" target="_self">Our Useful Resources</a> section has more information about other family violence support services and brochures.
						</p>
					</div>
				</div>

				<a href="#/" class="accordionButton" onclick="toggleAccordion('accordionContent2')">
					<div class="accordionHeading">
						<h3>Crisis accommodation</h3>
						<p>&#9660;</p>
					</div>
				</a>

				<div class="accordionContent accordionContent2 row">
					<div class="col-12">
						<p class="seekHelpArticleHeading">Kara House provides safe and secure accommodation and for women and children escaping family violence.</p>
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
										Highly secure ccommodation that prioritises their safety in the immediate crisis.
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
					include "includes/connect.php";
					try {
						$sql = "SELECT * FROM tbl_seekHelpFact WHERE active is TRUE";
						$resultSet = $pdo->query($sql);
					}

					catch (PDOException $e) {
						echo "Error fetching update ckeditor:".$e->getMessage();
						exit();
					}

					foreach ($resultSet as $row) {
						$id = $row['id'];
						$heading = $row['heading'];
						$img = $row['img'];
						$fact = $row['fact'];
					?>
				<a href="#/" class="accordionButton" onclick="toggleAccordion('accordionContent<?php echo 2+$id;?>')">
					<div class="accordionHeading">
						<h3><?php echo $heading;?></h3>
						<p>&#9660;</p>
					</div>
				</a>
				<div class="accordionContent accordionContent<?php echo 2+$id;?> row">
					<div class="accordionImg col-lg-5">
						<img class="img-fluid" src="<?php echo $img;?>" alt="<?php echo $heading;?>">
					</div>
					<div class="accordionDescription col-lg-7">
						<?php echo $fact;?>
					</div>
				</div>
				<?php
			}
				?>

			</div>
		</div>

		<?php
		include "includes/shared/clientStories.php";
		clientStories("activeSeekHelp");
		?>

		<div class="row section">
			<div class="col-12 ">
				<h1>Family Violence Support Group</h1>
			</div>
		</div>
		<div class="row">
			<div class="preventViolence col-12">
				<a href="#/" class="accordionButton" onclick="toggleAccordion('accordionContent8')">
					<div class="accordionHeading">
						<h3>Building hope and strength for the future.</h3>
						<p>&#9660;</p>
					</div>
				</a>
				<div class="accordionContent accordionContent8">
					<p>The group is for women and their children who have experienced family violence and might be feeling alone, stuck and overwhelmed. It's a safe place to take time out, improve your well-being and develop strategies for the future. Over 6 weeks enjoy relaxation activities and time to talk with other women with similar circumstances. The group is facilitated by our Specialist Family Violence Practitioners who understand your situation and are there to help.</p>

					<p><strong>The next group will be starting later in this year - to stay informed pleased contact Kara House on <a href="#">1800 900 520</a> or email <a href="
					#">admin@karahouse.org.au</a></strong></p>
						<?php
							include "includes/connect.php";
							try {
								$sql = "SELECT * FROM tbl_supportGroup WHERE active is TRUE";
								$resultSet = $pdo->query($sql);
							}

							catch (PDOException $e) {
								echo "Error fetching SupportGroup:".$e->getMessage();
								exit();
							}

							foreach ($resultSet as $row) {
								$id = $row['id'];
								$start = $row['start'];
								$time = $row['time'];
								$location = $row['location'];
								$children = $row['children'];
								$refreshments = $row['refreshments'];
								$transport = $row['transport'];
							?>
					<table class="table-responsive-sm groupDetails">
						<th colspan="2">Details for the next group</th>
							<tr>
								<td>Starts</td>
								<td><?php echo $start;?></td>
							</tr>
							<tr>
								<td>Times</td>
								<td>10am - 12pm</td>
							</tr>
							<tr>
								<td>Location</td>
								<td>Box Hill</td>
							</tr>
							<tr>
								<td>Childcare</td>
								<td>Free by prior arrangement</td>
							</tr>
							<tr>
								<td>Refreshments</td>
								<td>Morning tea will be served</td>
							</tr>
							<tr>
								<td>Transport</td>
								<td>Close to public transport - assistance with transport may be available with prior arrangement.</td>
							</tr>
					</table>
					<div class="groupBrochure">
						<p>Family Violence Support Group Brochure</p>
						<button class="groupBrochureButton">Download Brochure</button>
					</div>

					<p class="groupBrochureP">
					<span class="groupHeading">Who is the Family Violence Support Group appropriate for?</span><br>
					Women and children who have been impacted by family violence. Women of all ages and backgrounds who are feeling stuck and overwhelmed and isolated.<br><br>

					<span class="groupHeading">Who runs it? </span><br>
					The group is facilitated by two Specialist Family Violence Practitioners who are trained in family violence counselling. <br><br>

					<span class="groupHeading">What are the activities?	</span><br>
					Activities will include Art Therapy and Music Therapy facilitated by trained professionals. These creative therapies are used to bring out thoughts and start discussion. Massage, breathing exercises and tai chi will be used to relax and break down barriers.<br><br>

					<span class="groupHeading">Childcare?</span><br>
					Free Childcare will be available on site by prior arrangement.
					Contact Kara House on 1800 900 520 or email admin@karahouse.org.au<br><br>

					<span class="groupHeading">Referrals?</span><br>
					Clients can be referred by Doctors, Schools, Housing Services, Family Services, private and government organisations. Those wishing to attend will need to email or ring Kara House so we can check that they are appropriate for the group and confirm the safety of other clients attending.<br><br>

					<span class="groupHeading">Process?</span><br>
					Simply Contact Kara House on 1800 900 520 or email admin@karahouse.org.au to make sure you are the right fit for the group and to arrange childcare.</p>
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
