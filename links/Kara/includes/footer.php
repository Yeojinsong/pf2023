<footer class="footer">
	<div class="container">
		<div class="row footerRow">
			<div class="col-sm-6">
				<h2>Kara House</h2>
				<div class="footerText">
					<p><span class="text-secondary">Phone: <a href="tel:1800-900-520">1800 900 520</a></span></p>
					<p><span class="text-secondary">Email: <a href="mailto:admin@karahouse.org.au">admin@karahouse.org.au</a></span></p>
					<p><span class="text-secondary">Postal Address: P.O. BOX 308 Burwood 3125</span></p>
					<p><span class="text-secondary">ABN: 20 305 139 734</span></p>
					<p><strong>&#169; Kara House</strong> | <span class="footerLinks"><a data-toggle="modal" data-target="#disclaimerModal" href="#">Disclaimer & Site Policy</a> | <a href="#" data-toggle="modal" data-target="#privacyModal">Privacy policy</a></span></p>
					<button class="btn btn-primary newsBtn" data-toggle="modal" data-target="#signUp" >Sign up for newsletter</button>
					<br>
						<div class="footerFlex">
							<?php
							include "includes/connect.php";

							try{
								//sql statement
								$sql = "SELECT * FROM tbl_socialMedia WHERE active IS TRUE";
								//execute statement and store output
								$resultSet = $pdo->query($sql);

							} // end of try code

							// Error if SQL statement fails
							catch(PDOException $e) {
								//error message
								echo "Error fetching social media icons from database: " .$e->getMessage();

								exit();
								//catch script stop
							}

							foreach ($resultSet as $row) {
							$name = $row['name'];
							$img = $row['img'];
							$url = $row['url'];
							?>

							<a href='<?php echo $url;?>' target='_blank' rel='noopener noreferrer'>
								<img class='img-fluid' src='<?php echo $img;?>' alt='<?php echo $name;?>' >
							</a>

							<?php
							}
							?>
						</div>
				</div>
			</div>

			<div class="col-sm-6 footerCol">
				<div class="d-flex flex-row">
					<div class="footerFlag">
						<img class="img-fluid" src="images/Aboriginal_Flag.jpg" alt="Aboriginal Flag">
					</div>
					<div class="footerFlag">
						<img class="img-fluid" src="images/Torres_Strait_Islanders.jpg" alt="Flag Strait Islanders">
					</div>
					<div class="footerFlag">
						<img class="img-fluid" src="images/Gay_flag.jpg" alt="Gay flag">
					</div>
				</div>
				<div class="d-flex flex-row footerMarg">
					<p>In the spirit of reconciliation, Kara House acknowledges the Wurundjeri people as the traditional custodians of the land we are meeting on. We pay our respects to their Elders past and present.</p>
				</div>
			</div>

		</div>
	</div>

	<!--Modals-->
	<!--Disclaimer modal-->
	<div class="modal fade" id="disclaimerModal" tabindex="-1" role="dialog" aria-labelledby="disclaimerModal" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
				   <h5 class="modal-title" id="disclaimerHeading">Disclaimer and Site Policy</h5>
				   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					 <span aria-hidden="true">&times;</span>
				   </button>
				 </div>
				<div class="modal-body">
					<div class="container-fluid">
						<div class="row">
							<div class="col-sm-12">
								<p>
									All the information on this website is for general information purposes only. It should not be considered as legal advice or to replace appropriate counselling, service provision or medical assistance.
								</p>
								<p>
									This website provides links to sites that provide information and resources which help support, inform and empower family violence survivors, service practitioners and other worker. Links are provided for reference and the convenience of users only. We do not attempt to maintain the accuracy and completeness of information at linked sites.
								</p>
								<p>
									All the material on this website, including the Kara House logo and its variants is subject to copyright. Users must not unlawfully use any of our copyright material, or pass off as their own, any content contained within.
								</p>
								<p>
									If you wish to republish any material from our website, our written permission must be obtained, unless the material is marked otherwise.
								</p>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
				  <button type="button" class="btn btn-secondary btnColor" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!--Privacy modal-->
	<div class="modal fade" id="privacyModal" tabindex="-1" role="dialog" aria-labelledby="privacyModal" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
				   <h5 class="modal-title" id="privacyheading">Privacy policy</h5>
				   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					 <span aria-hidden="true">&times;</span>
				   </button>
				 </div>
				<div class="modal-body">
					<div class="container-fluid">
						<div class="row">
							<div class="col-sm-12">
								<p>Kara House is committed to protecting the privacy of individuals and handling their personal
									information in line with the Privacy and Data Protection Act 2014 (Vic), containing the
									Information Privacy Principles (IPPs).
								</p>
								<h5>Definitions</h5>
								<ul>
									<li>Personal information means information or an opinion (including information or an opinion</li>
									<li>forming part of a database), that is recorded in any form and whether true or not, about an
										individual whose identity is apparent, or can reasonably be ascertained, from the information or
										opinion.
									</li>
									<li><strong>Sensitive information</strong> is a special category of personal information.
										Sensitive information means:
										<ul>
											<li>information or an opinion about an individual’s (i) racial or ethnic origin, (ii) political
											opinions, (iii) membership of a political association, (iv) religious beliefs or affiliations, (v)
											philosophical beliefs, (vi) membership of a professional or trade association, (vii)
											membership of a trade union, (viii) sexual orientation or practices, (ix) criminal record,
											that is also personal information;
											</li>
											<li>
												health information about an individual,
											</li>
											<li>
												genetic information about an individual that is not otherwise health information;
											</li>
											<li>
												biometric information that is to be used for the purpose of automated biometric
												verification or biometric identification, or biometric templates.
											</li>
										</ul>
									</li>
								</ul>
								<h5>What type of personal information does Kara House collect?</h5>
								<p>
									Kara House collects personal information from staff, clients (including children), contractors, and
									Management Committee members.
								</p>
								<p>
									The type of personal information that Kara House collects and holds will depend on the nature of a person’s involvement with the organisation.
								</p>
								<p>
									Depending on the reason for collecting the personal information, the personal information collected by Kara House may include (but is not limited to) name, residential address, email address, phone number, current employment information, personal relationships with others, images (including digital images), health information/medical records, date of birth, bank account details or credit card details.
								</p>
								<p>
									Whilst a person is not required to provide the personal information and/or sensitive information requested by Kara House, if the person chooses not to provide information as requested, it may not be practicable for Kara House to service their needs.
								</p>
								<p>
									In circumstances where Kara House receives unsolicited personal information (meaning, personal information received where Kara House has taken no active steps to collect the information), Kara House will usually destroy or de-identify the information as soon as practicable if it is lawful and reasonable to do so unless the unsolicited personal information is reasonably necessary for, or directly related to, Kara House’s functions or activities. For instance, we usually retain unsolicited volunteer or employment applications and complaints or feedback.
								</p>
								<h5>How does Kara House collect personal information?</h5>
								<p>Kara House will wherever practicable collect personal information directly from the owner of the personal information, including via phone, face to face, our website, email, SMS, electronic and hard copy forms, social media, and third party online portals.</p>
								<p>On occasion, Kara House may collect personal information from a third party. Kara House will generally obtain consent from the owner of personal information to collect their personal information. Consent will usually be provided in writing however sometimes it may be provided orally or may be implied through a person’s conduct.</p>
								<p>Kara House will endeavour to only ask for a person’s personal information if it is reasonably
								necessary for the activities that the person is seeking to be involved in.
								</p>
								<p>
								Kara House may collect, hold, use or disclose a person’s personal information for the following general purposes:
								</p>
								<ul>
									<li>to identify a person;</li>
									<li>for the purpose for which the personal information was originally collected;</li>
									<li>for a purpose for which the person has consented;</li>
									<li>for any other purpose authorised or required by an Australian law; and</li>
									<li>for any other purpose authorised or required by a court or tribunal</li>
								</ul>
								<p>Except for the following circumstances, Kara House does not pass information on to third parties:</p>
								<ul>
									<li>Agents and contractors of Kara House in which case Kara House will take reasonable steps to ensure that the contractor/agent does not breach the IPPs in relation to the information;</li>
									<li>Where information is given to financial institutions/intermediaries for normal bank processing in which case there is a contractual expectation of confidentiality;</li>
									<li>Where the Australian Taxation Office or other government authority or Australian law or court order requires or authorises disclosure of information;</li>
									<li>Where a person has consented to Kara House disclosing their personal information to a third party.</li>
									<li>Kara House may disclose a person’s personal information to a recipient overseas in accordance with the IPPs where:</li>
									<li>The person has consented to the disclosure;</li>
									<li>Kara House reasonably believes that the overseas recipient is subject to a law or binding scheme that protects the information in a way that is substantially similar to the way the information is protected under the IPPs; or</li>
									<li>The disclosure is required or authorised by an Australian law or a court order.</li>
								</ul>
								<h5>How does Kara House store personal information?</h5>
								<ul>
									<li>Kara House ensures all reasonable steps are taken to protect the personal information it holds from misuse and loss and from unauthorised access, modification or disclosure. A person’s personally identifiable information is kept secure.</li>
									<li>Only staff with a direct professional involvement in a matter has access to files.</li>
									<li>Where possible, disclosure of information to other organisations is performed in a way that does not personally identify individuals. Extreme care and vigilance are exercised in the use of any identifiers that may pass through to a Government agency. Such identifiers are only ever used in accordance with the terms and conditions of the contract that is held with the relevant agency.</li>
								</ul>
								<h5>How does Kara House keep personal information accurate and up to date?</h5>
								<p>
								Kara House is committed to holding accurate and up-to-date personal information. Persons are encouraged to contact Kara House at any time to update their personal information. Kara House will destroy or de-identify any personal information which is no longer required by the organisation for any purpose for which the organisation may use or disclose it, unless Kara House is required by law or under an Australian law or a court order to retain it.
								</p>
								<h5>How can a person access their personal information?</h5>
								<p>
									If a person wants to access a copy of their personal information that Kara House holds about them in order to seek correction of such information the person may do so by contacting the Privacy Officer of Kara House.
									In accordance with the IPPs, Kara House may refuse access to personal information in a number of circumstances including where giving access to the information would pose a serious threat to the life, health or safety of a person. Kara House will seek to handle all requests for access to personal information as quickly as possible.
								</p>
								<h5>If you have any questions about this information, contact either:</h5>
								<div class="footerText">
									<h6>karahouse:</h6>
									<p>Privacy Officer</p>
									<p>Email: <a href="mailto:admin@karahouse.org.au">admin@karahouse.org.au</a></p>
									<p>PO Box 308, Burwood VIV 3125</p>
									<p>PHONE: <a href="tel:+03-9899-5666">O3 9899 5666</a></p>
								</div>
								<br>
								<p>
									<strong>OR</strong>
								</p>
								<div class="footerText">
									<h6>Victorian Privacy Commissioner</h6>
									<p>Phone:  <a href="tel:1300-666-444">1300 666 444</a></p>
									<p>Email:  <a href="mailto:enquiries@cpdp.vic.gov.au">enquiries@cpdp.vic.gov.au</a></p>
									<p>Web:  www.cpdp.vic.gov.au</p>
								</div>


							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
				  <button type="button" class="btn btn-secondary btnColor" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!--Sign up modal-->
	<div class="modal fade" id="signUp" tabindex="-1" role="dialog" aria-labelledby="signUp" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
				   <h5 class="modal-title" id="signUpHeading">Sign up for newsletter</h5>
				   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					 <span aria-hidden="true">&times;</span>
				   </button>
				 </div>
				<div class="modal-body">
					<div class="container-fluid">
						<div class="row">
							<div class="col-sm-12">
								<form action="includes/mail/mail.php" method="POST" onsubmit="return checkNewsLetterInput(this)">
									<div class="row formMargin">
										<div class="col-sm-12">
											<label for="footerFirstName">First Name (optional)</label>
											<input type="text" class="form-control" id="footerFirstName" name="footerFirstName">
										</div>
									</div>

									<div class="row formMargin">

										<div class="col-sm-12">
											<label for="footerLastName">Last name</label>
											<input type="text" class="form-control" id="footerLastName" name="footerLastName" required>
										</div>

									</div>

									<div class="row formMargin">

										<div class="col-sm-12">
											<label for="footerEmail">Email address</label>
											<input type="text" class="form-control" id="footerEmail" name="footerEmail" required>
										</div>

									</div>

									<div class="row formMargin">

										<div class="col-sm-12">
											<label for="footerPhone">Phone number (optional)</label>
											<input type="text" class="form-control" id="footerPhone" name="footerPhone">
										</div>

									</div>
									<div class="row formMargin">
										<div class="form-group col-sm-12">
											<div class="form-check">
												<input class="form-check-input" type="checkbox" id="footerPolicyCheck" name="footerPolicyCheck">
												<label class="form-check-label formCheck" for="footerPolicyCheck">I agree to the terms and conditons as set out in the Kara House Privacy Policy.
												</label>
											</div>
										</div>
									</div>
									<button type="submit" class="btn btn-primary float-right formBtn" name="newsletterSubmit" >Submit</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
