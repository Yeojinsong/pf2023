<?php if(session_id() == '') session_start();
/*
Filename: carousel.php
Author: Dahmon Bicheno
Date Created: 19/10/2018
Date Last updated: 31/10/18
Last Updated By: Dahmon Bicheno
Description: Carousel adding and removing
Version Number: 1.9
*/

// CHANGE PAGE TITLE
$pageTitle = "Donations";

// import the head section
include "includes/adminHead.php";

if (isset($_SESSION['login']) && $_SESSION['login'] == "valid") {
?>
<body>
	<div class="container-fluid cmsContainer">
		<?php include "includes/cmsSidebar.php"; ?>

		<div class="cmsContent offset-2 col-md-10">
		<!-- EDIT WITHIN THIS TAG AND ... -->

			<div class="row">
				<div class="col-12">
					<a href="#/" class="accordionButton" onclick="toggleAccordion('newDonationArea')">
						<div class="accordionHeading">
							<h3>New</h3>
							<img class="accordionArrow" src="../images/arrow.png" alt="arrow">
						</div>
					</a>

					<div class="accordionContent newDonationArea">
						<form action="includes/donations/insert.php" method="POST">
							<fieldset>
								<div class="form-group">
									<label>Amount:</label>
									<input maxlength="10" class="form-control" type="number" name="donationAmount" required>
								</div>


								<label>Description:</label>
								<textarea class="form-control" id="addDescription" type="text" name="description" required></textarea>

								<script>
									CKEDITOR.replace("addDescription");
								</script>


								<div>
									<label>Display:</label>
									<input type="checkbox" name="display"><br>
								</div>

								<div>
									<label>Highlight:</label>
									<input type="checkbox" name="highlight"><br>
								</div>

								<div>
									<label>Active:</label>
									<input type="checkbox" name="active"><br>
								</div>
								<input class="formButton" name="donationAddSubmit" type="submit" value="Add"/>
							</fieldset>
						</form>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<a href="#/" class="accordionButton" onclick="toggleAccordion('updateDonationAmount')">
						<div class="accordionHeading">
							<h3>Update</h3>
							<img class="accordionArrowOpen" src="../images/arrow.png" alt="arrow">
						</div>
					</a>

					<div class="accordionContentOpen updateDonationAmount row">

						<?php
						try {
							// write statement to get data from tbl_donationAmount table
							$sql = "SELECT donationAmount, description, display, highlight, active FROM tbl_donationAmount;";

							// prepare the statement
							$statement = $pdo->prepare($sql);

							// execute SQL statement
							$resultSet = $pdo->query($sql);

						} // end of try block
						catch (PDOException $e) {

							// create error message
							echo "Error fetching carousel data: " .$e->getMessage();
							exit();

						} // end catch block

						foreach ($resultSet as $row) {
							// store row data in variables
							$donationAmount = $row['donationAmount'];
							$description = $row['description'];
							$display = $row['display'];
							$highlight = $row['highlight'];
							$active = $row['active'];
							?>

							<!-- beginning of display area -->

							<article class="col-12 col-md-6">
								<form action="includes/donations/update.php" method="POST">
									<fieldset id="form<?php echo $donationAmount; ?>" disabled>
										<input type="hidden" name="id" value="<?php echo $donationAmount; ?>">

										<input type="hidden" name="donationAmount" value="<?php echo $donationAmount; ?>">

										<h2 class="text-left">$<?php echo $donationAmount; ?></h2>

										<label>Description:</label>
										<textarea id="updateDonation-<?php echo $donationAmount; ?>" name="description" required><?php echo $description; ?></textarea>
										<script>
											CKEDITOR.replace("updateDonation-<?php echo $donationAmount; ?>");
										</script>

										<div>
											<label>Display:</label>
											<input class="formButton" type="checkbox" name="display" <?php if ($display) echo "checked"; ?>><br>
										</div>

										<div>
											<label>Highlight:</label>
											<input class="formButton" type="checkbox" name="highlight" <?php if ($highlight) echo "checked"; ?>><br>
										</div>

										<div>
											<label>Active:</label>
											<input class="formButton" type="checkbox" name="active" <?php if ($active) echo "checked"; ?>><br>
										</div>
									</fieldset>
									<input id="edit<?php echo $donationAmount; ?>" class="formButton" type="button" onclick='enableForm(<?php echo $donationAmount; ?>)' value="Edit"/>
									<input id="submit<?php echo $donationAmount; ?>" class="formSubmit formButton" name="donationUpdateSubmit" type="submit" value="Submit"/>
									<input id="cancel<?php echo $donationAmount; ?>" class="formCancel cancelButton" type="button" onclick='disableForm(<?php echo $donationAmount; ?>)' value="Cancel"/>
								</form>

								<form action="includes/donations/delete.php" id="deleteForm<?php echo $donationAmount; ?>" class="deleteForm" onsubmit="return checkDelete();" method="POST">
									<input type="hidden" name="id" value="<?php echo $donationAmount; ?>">
									<input type="hidden" name="donationAmount" value="<?php echo $donationAmount; ?>">
									<input type="submit" class="cancelButton" name="donationDeleteSubmit" value="Delete"/>
								</form>
								<hr><br>
							</article>

							<!-- End of database information display area -->

							<?php
						}
						?>
					</div>
				</div>
			</div>
		<!-- AND THIS TAG -->
		</div>
	</div>
</body>
<?php
include "includes/adminJsLinks.php";
} else {
	header("Location: index.php");
}
?>
</html>
