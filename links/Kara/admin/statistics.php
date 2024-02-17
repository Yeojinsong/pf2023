<?php if(session_id() == '') session_start();
/*
Filename: statistics.php
Author: Dahmon Bicheno
Date Created: 31/10/2018
Date Last updated:
Last Updated By: Dahmon Bicheno
Description: Statistics adding and removing
Version Number: 1
*/

// CHANGE PAGE TITLE
$pageTitle = "Statistics";

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
					<a href="#/" class="accordionButton" onclick="toggleAccordion('newStatistic')">
						<div class="accordionHeading">
							<h3>New</h3>
							<img class="accordionArrow" src="../images/arrow.png" alt="arrow">
						</div>
					</a>

					<div class="accordionContent newStatistic">
						<form action="includes/statistics/insert.php" method="POST">
							<fieldset>
								<div class="form-group">
									<label>Heading:</label>
									<input maxlength="40" class="form-control" type="text" name="heading" required>
								</div>

								<div class="form-group">
									<label>Body:</label>
									<input maxlength="100" class="form-control" type="text" name="body" required>
								</div>

								<div class="row">
									<label class="col-12">Active:</label>
									<div class="col-2">
										<label>Home:</label>
										<input class="formButton" type="checkbox" name="activeHome"><br>
									</div>

									<div class="col-2">
										<label>Be Informed:</label>
										<input class="formButton" type="checkbox" name="activeBeInformed"><br>
									</div>

									<div class="col-2">
										<label>About Us:</label>
										<input class="formButton" type="checkbox" name="activeAboutUs"><br>
									</div>
								</div>
								<input class="formButton" name="statisticAddSubmit" type="submit" value="Add"/>
							</fieldset>
						</form>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<a href="#/" class="accordionButton" onclick="toggleAccordion('updateStatistic')">
						<div class="accordionHeading">
							<h3>Update</h3>
							<img class="accordionArrowOpen" src="../images/arrow.png" alt="arrow">
						</div>
					</a>

					<div class="accordionContentOpen updateStatistic row">

						<?php
						try {
							// write statement to get data from tbl_slider table
							$sql = "SELECT id, heading, body, activeHome, activeBeInformed, activeAboutUs FROM tbl_statistic;";

							// prepare the statement
							$statement = $pdo->prepare($sql);

							// execute SQL statement
							$resultSet = $pdo->query($sql);

						} // end of try block
						catch (PDOException $e) {

							// create error message
							echo "Error fetching Statistic data: " .$e->getMessage();
							exit();

						} // end catch block

						foreach ($resultSet as $row) {
							// store row data in variables
							$id = $row['id'];
							$heading = $row['heading'];
							$body = $row['body'];
							$activeHome = $row['activeHome'];
							$activeBeInformed = $row['activeBeInformed'];
							$activeAboutUs = $row['activeAboutUs'];
							?>

							<article class="col-12 col-md-6">
								<form action="includes/statistics/update.php" method="POST">
									<fieldset id="form<?php echo $id; ?>" disabled>
										<input type="hidden" name="id" value="<?php echo $id; ?>">

										<div class="form-group">
											<label>Heading:</label>
											<input maxlength="40" class="form-control" type="text" name="heading" value="<?php echo $heading; ?>" required>
										</div>

										<div class="form-group">
											<label>Body:</label>
											<input maxlength="100" class="form-control" type="text" name="body" value="<?php echo $body; ?>" required>
										</div>

										<div class="row">
											<label class="col-12">Active:</label>
											<div class="col-4">
												<label>Home:</label>
												<input class="formButton" type="checkbox" name="activeHome" <?php if ($activeHome) echo "checked"; ?>><br>
											</div>

											<div class="col-4">
												<label>Be Informed:</label>
												<input class="formButton" type="checkbox" name="activeBeInformed" <?php if ($activeBeInformed) echo "checked"; ?>><br>
											</div>

											<div class="col-4">
												<label>About Us:</label>
												<input class="formButton" type="checkbox" name="activeAboutUs" <?php if ($activeAboutUs) echo "checked"; ?>><br>
											</div>
										</div>

									</fieldset>
									<input id="edit<?php echo $id; ?>" class="formButton" type="button" onclick='enableForm(<?php echo $id; ?>)' value="Edit"/>
									<input id="submit<?php echo $id; ?>" class="formSubmit formButton" name="statisticUpdateSubmit" type="submit" value="Submit"/>
									<input id="cancel<?php echo $id; ?>" class="formCancel cancelButton" type="button" onclick='disableForm(<?php echo $id; ?>)' value="Cancel"/>
								</form>

								<form action="includes/statistics/delete.php" id="deleteForm<?php echo $id; ?>" class="deleteForm" onsubmit="return checkDelete();" method="POST">
									<input type="hidden" name="id" value="<?php echo $id; ?>">
									<input type="submit" class="cancelButton" name="statisticDeleteSubmit" value="Delete"/>
								</form>
								<hr><br>
							</article>
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
