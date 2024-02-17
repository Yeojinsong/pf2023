<nav class="sideNav col-2">               
	<img src="images/CMSlogo.jpg" class="img-fluid" alt="CMSLOGOHERE">

	<!-- Home -->
	<a class="nav-link dropdown-btn <?php if ($pageTitle == "Slider Images" || $pageTitle == "Statistics" || $pageTitle == "Donations" || $pageTitle == "Donation Image") echo "active"; ?>" href="#/">Home</a>
	<div class="dropdown-container <?php if ($pageTitle == "Slider Images" || $pageTitle == "Statistics" || $pageTitle == "Donations" || $pageTitle == "Donation Image") echo "dropdownActive"; ?>">
		<a class="nav-link inner nav-link-bottom-border <?php if ($pageTitle == "Slider Images") echo "dropdownItemActive"; ?>" href="carousel.php">Slider Images</a>
		<a class="nav-link inner nav-link-bottom-border <?php if ($pageTitle == "Statistics") echo "dropdownItemActive"; ?>" href="statistics.php">Statistics</a>
		<a class="nav-link inner nav-link-bottom-border <?php if ($pageTitle == "Donations") echo "dropdownItemActive"; ?>" href="donations.php">Donations</a>
		<a class="nav-link inner nav-link-bottom-border <?php if ($pageTitle == "Donation Image") echo "dropdownItemActive"; ?>" href="donationImage.php">Donation Image</a>
	</div>

	<!-- Be Informed -->
	<a class="nav-link dropdown-btn <?php if ($pageTitle == "Client Stories" || $pageTitle == "Hero Images" || $pageTitle == "Statistics" || $pageTitle == "Family Violence Facts" || $pageTitle == "Prevention Facts" || $pageTitle == "Web Links") echo "active"; ?>" href="#/">Be Informed</a>
	<div class="dropdown-container <?php if ($pageTitle == "Client Stories" || $pageTitle == "Hero Images" || $pageTitle == "Statistics" || $pageTitle == "Family Violence Facts" || $pageTitle == "Prevention Facts" || $pageTitle == "Web Links") echo "dropdownActive"; ?>">
		<a class="nav-link inner nav-link-bottom-border <?php if ($pageTitle == "Hero Images") echo "dropdownItemActive"; ?>" href="hero.php">Hero Images</a>
		<a class="nav-link inner nav-link-bottom-border <?php if ($pageTitle == "Statistics") echo "dropdownItemActive"; ?>" href="statistics.php">Statistics</a>
		<a class="nav-link inner nav-link-bottom-border <?php if ($pageTitle == "Family Violence Facts") echo "dropdownItemActive"; ?>" href="familyViolenceFacts.php">Family Violence Facts</a>
		<a class="nav-link inner nav-link-bottom-border <?php if ($pageTitle == "Client Stories") echo "dropdownItemActive"; ?>" href="clientStories.php">Client Stories</a>
		<a class="nav-link inner nav-link-bottom-border <?php if ($pageTitle == "Prevention Facts") echo "dropdownItemActive"; ?>" href="preventionFacts.php">Prevention Facts</a>
		<a class="nav-link inner nav-link-bottom-border <?php if ($pageTitle == "Web Links") echo "dropdownItemActive"; ?>" href="webLinks.php">Web Links</a>
	</div>

	<!-- SEEK HELP -->
	<a class="nav-link dropdown-btn <?php if ($pageTitle == "Client Stories" || $pageTitle == "Hero Images" || $pageTitle == "Seek Help Facts" || $pageTitle == "Support Group" || $pageTitle == "Support Group FAQ") echo "active"; ?>" href="#/">Seek Help</a>
	<div class="dropdown-container <?php if ($pageTitle == "Client Stories" || $pageTitle == "Hero Images" || $pageTitle == "Seek Help Facts" || $pageTitle == "Support Group" || $pageTitle == "Support Group FAQ") echo "dropdownActive"; ?>">
		<a class="nav-link inner nav-link-bottom-border <?php if ($pageTitle == "Hero Images") echo "dropdownItemActive"; ?>" href="hero.php">Hero Images</a>
		<a class="nav-link inner nav-link-bottom-border <?php if ($pageTitle == "Seek Help Facts") echo "dropdownItemActive"; ?>" href="seekHelpFacts.php">Seek Help Facts</a>
		<a class="nav-link inner nav-link-bottom-border <?php if ($pageTitle == "Client Stories") echo "dropdownItemActive"; ?>" href="clientStories.php">Client Stories</a>
		<a class="nav-link inner nav-link-bottom-border <?php if ($pageTitle == "Support Group") echo "dropdownItemActive"; ?>" href="supportGroup.php">Support Group</a>
		<a class="nav-link inner nav-link-bottom-border <?php if ($pageTitle == "Support Group FAQ") echo "dropdownItemActive"; ?>" href="supportGroupFAQ.php">Support Group FAQs</a>
	</div>

	<!-- Get Involved -->
	<a class="nav-link dropdown-btn <?php if ($pageTitle == "Client Stories" || $pageTitle == "Hero Images" || $pageTitle == "Donations" || $pageTitle == "Donation Image" || $pageTitle == "Donation Facts" || $pageTitle == "Partner With Us" || $pageTitle == "Job Vacancies" || $pageTitle == "Employment Facts" || $pageTitle == "Connect With Us") echo "active"; ?>" href="#/">Get Involved</a>
	<div class="dropdown-container <?php if ($pageTitle == "Client Stories" || $pageTitle == "Hero Images" || $pageTitle == "Donations" || $pageTitle == "Donation Image" || $pageTitle == "Donation Facts" || $pageTitle == "Partner With Us" || $pageTitle == "Job Vacancies" || $pageTitle == "Employment Facts" || $pageTitle == "Connect With Us") echo "dropdownActive"; ?>">
		<a class="nav-link inner nav-link-bottom-border <?php if ($pageTitle == "Hero Images") echo "dropdownItemActive"; ?>" href="hero.php">Hero Images</a>
		<a class="nav-link inner nav-link-bottom-border <?php if ($pageTitle == "Donations") echo "dropdownItemActive"; ?>" href="donations.php">Donations</a>
		<a class="nav-link inner nav-link-bottom-border <?php if ($pageTitle == "Donation Image") echo "dropdownItemActive"; ?>" href="donationImage.php">Donation Image</a>
		<a class="nav-link inner nav-link-bottom-border <?php if ($pageTitle == "Donation Facts") echo "dropdownItemActive"; ?>" href="donationFacts.php">Donation Facts</a>
		<a class="nav-link inner nav-link-bottom-border <?php if ($pageTitle == "Partner With Us") echo "dropdownItemActive"; ?>" href="partnerDisplayLogo.php">Partner With Us</a>
		<a class="nav-link inner nav-link-bottom-border <?php if ($pageTitle == "Client Stories") echo "dropdownItemActive"; ?>" href="clientStories.php">Client Stories</a>
		<a class="nav-link inner nav-link-bottom-border <?php if ($pageTitle == "Job Vacancies") echo "dropdownItemActive"; ?>" href="jobVacancy.php">Job Vacancies</a>
		<a class="nav-link inner nav-link-bottom-border <?php if ($pageTitle == "Employment Facts") echo "dropdownItemActive"; ?>" href="employmentFacts.php">Employment Facts</a>
		<a class="nav-link inner nav-link-bottom-border <?php if ($pageTitle == "Connect With Us") echo "dropdownItemActive"; ?>" href="connectWithUs.php">Connect With Us</a>
	</div>

	<!-- About Us -->
	<a class="nav-link dropdown-btn <?php if ($pageTitle == "Statistics" || $pageTitle == "Hero Images" || $pageTitle == "About Us" || $pageTitle == "History" || $pageTitle == "Working With Partners" || $pageTitle == "Committee") echo "active"; ?>" href="#/">About Us</a>
	<div class="dropdown-container <?php if ($pageTitle == "Statistics" || $pageTitle == "Hero Images" || $pageTitle == "About Us" || $pageTitle == "History" || $pageTitle == "Working With Partners" || $pageTitle == "Committee") echo "dropdownActive"; ?>">
		<a class="nav-link inner nav-link-bottom-border <?php if ($pageTitle == "Hero Images") echo "dropdownItemActive"; ?>" href="hero.php">Hero Images</a>
		<a class="nav-link inner nav-link-bottom-border <?php if ($pageTitle == "About Us") echo "dropdownItemActive"; ?>" href="aboutUs.php">About Us</a>
		<a class="nav-link inner nav-link-bottom-border <?php if ($pageTitle == "Statistics") echo "dropdownItemActive"; ?>" href="statistics.php">Statistics</a>
		<a class="nav-link inner nav-link-bottom-border <?php if ($pageTitle == "History") echo "dropdownItemActive"; ?>" href="history.php">History</a>
		<a class="nav-link inner nav-link-bottom-border <?php if ($pageTitle == "Working With Partners") echo "dropdownItemActive"; ?>" href="workingWith.php">Working With Partners</a>
		<a class="nav-link inner nav-link-bottom-border <?php if ($pageTitle == "Committee") echo "dropdownItemActive"; ?>" href="committee.php">Committee</a>
	</div>
	
	<!-- What's New -->
	<a class="nav-link dropdown-btn <?php if ($pageTitle == "Media Types" || $pageTitle == "Hero Images" || $pageTitle == "Articles" || $pageTitle == "Article Images" || $pageTitle == "URLs" || $pageTitle == "Documents") echo "active"; ?>" href="#/">What's New</a>
	<div class="dropdown-container <?php if ($pageTitle == "Media Types" || $pageTitle == "Hero Images" || $pageTitle == "Articles" || $pageTitle == "Article Images" || $pageTitle == "URLs" || $pageTitle == "Documents") echo "dropdownActive"; ?>">
		<a class="nav-link inner nav-link-bottom-border <?php if ($pageTitle == "Hero Images") echo "dropdownItemActive"; ?>" href="hero.php">Hero Images</a>
		<a class="nav-link inner nav-link-bottom-border <?php if ($pageTitle == "Articles") echo "dropdownItemActive"; ?>" href="article.php">Articles</a>
		<a class="nav-link inner nav-link-bottom-border <?php if ($pageTitle == "Article Images") echo "dropdownItemActive"; ?>" href="articleImages.php">Article Images</a>
		<a class="nav-link inner nav-link-bottom-border <?php if ($pageTitle == "URLs") echo "dropdownItemActive"; ?>" href="links.php">URLs</a>
		<a class="nav-link inner nav-link-bottom-border <?php if ($pageTitle == "Documents") echo "dropdownItemActive"; ?>" href="news-report.php">Documents</a>
		<a class="nav-link inner nav-link-bottom-border <?php if ($pageTitle == "Media Types") echo "dropdownItemActive"; ?>" href="mediaType.php">Media Types</a>
	</div>

	<!-- Social Media -->
	<a class="nav-link dropdown-btn <?php if ($pageTitle == "Social Media") echo "active"; ?>" href="#/">Footer</a>
	<div class="dropdown-container <?php if ($pageTitle == "Social Media") echo "dropdownActive"; ?>">
		<a class="nav-link inner nav-link-bottom-border <?php if ($pageTitle == "Social Media") echo "dropdownItemActive"; ?>" href="social-media.php">Social Media</a>
	</div>

	<!-- Admin -->
	<?php
	if ($_SESSION['userRole'] == "Admin") {
		?>
		<a class="nav-link dropdown-btn <?php if ($pageTitle == "Users") echo "active"; ?>" href="#/">Admin</a>
		<div class="dropdown-container <?php if ($pageTitle == "Users") echo "dropdownActive"; ?>">
			<a class="nav-link inner nav-link-bottom-border <?php if ($pageTitle == "Users") echo "dropdownItemActive"; ?>" href="users.php">Users</a>
		</div>
		<?php
	}
	?>

</nav>

<nav class="navbar offset-2 col-md-10">
	<h1 class="cms-nav-text">Admin Control Panel: <?php echo $pageTitle; ?></h1>
	<a class="formButton changePasswordButton" href="#changePassword" data-toggle="modal">Change Password</a>
	<a class="cancelButton" href="logoff.php">Log Out</a>
</nav>

<div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="changePasswordLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<div class="modal-header">
	            <h4 class="modal-title">Change Password</h4>
	            <button type="button" class="close" data-dismiss="modal">&times;</button>
	        </div>
	        <div class="modal-body">

				<div class="form-group">
					<label>Enter your old Password: </label>
					<input minlength="8" class="form-control" type="password" size="20" name="oldPassword">
				</div>

				<div class="form-group">
					<label>Enter new Password (at least 8 characters): </label>
					<input minlength="8" class="form-control" type="password" size="20" name="newPassword">
				</div>

				<div class="form-group">
					<label>Confirm new Password: </label>
					<input minlength="8" class="form-control" type="password" size="20" name="newPasswordConfirm">
				</div>

	        </div>
	        <div class="modal-footer">
				<input class="formButton col-xs-12 col-md-6" type="submit" name="changePasswordSubmit" value="Change Password">
	        </div>
		</form>
	</div>
  </div>
</div>

<?php
if (isset ($_POST['changePasswordSubmit'])) {
	// connect to database
	include "connect.php";
	
	// clean variable
	$oldPassword = sha1(cleanInput($_POST['oldPassword']));	
	$newPassword = sha1(cleanInput($_POST['newPassword']));
	$newPasswordConfirm = sha1(cleanInput($_POST['newPasswordConfirm']));
	
	try {
		$sql = "SELECT COUNT(*) FROM tbl_user WHERE password = :password AND email = :email;";
		
		// prepare the statement 
		$statement = $pdo->prepare($sql);
		
		// bind the values to the statement 
		$statement->bindValue(':password', $oldPassword);
		$statement->bindValue(':email', $_SESSION['email']);
		
		// execute the sql statement
		$statement->execute();
	} // end try block
	// if SQL fails
	catch(PDOException $e) {
		// create an error message with the exception details
		echo "Error checking password: ".$e->getMessage();
		// stop script
		exit();
	} // end catch block
	
	// get number of matches from result set
	$nbrOfMatches = $statement->fetchColumn();
	
	// test if number of matches > 0
	if ($nbrOfMatches > 0) {
		// old password correct
		if ($newPassword == $newPasswordConfirm) {
			// new passwords match
			try {
				// create our SQL statement
				$sql = "UPDATE tbl_user SET password = :password WHERE email = :email;";
				
				// prepare the statement
				$statement = $pdo->prepare($sql);
				
				// bind the values
				$statement->bindValue(':password', $newPassword);
				$statement->bindValue(':email', $_SESSION['email']);
				
				// execute the SQL statement 
				$statement->execute();
				
				// display success message
				echo "<script type='text/javascript'>alert('Password Successfully Changed.')</script>"; 
			} // end of try block
			// catch exception
			catch(PDOException $e) {
				// create an error message with exception details
				echo "Error updating password: " .$e->getMessage();
				// stop script from continuing
				exit();
			} // end of catch block	
		} else {
			// new passwords don't match
			echo "<script type='text/javascript'>alert('New Password and Confirmation Password do not match.')</script>";
		}
	} else {
		// old password invalid 
		echo "<script type='text/javascript'>alert('Old password was entered incorrectly.')</script>";
	}
} // end of update details check
?>