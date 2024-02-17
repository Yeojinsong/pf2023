<?php if(session_id() == '') session_start();
/*
Filename: addingUser.php
Author: Harris salehi
Date Created: 12/10/2018
Date Last updated: 14/09/18
Last Updated By: Dahmon Bicheno
Description: Carousel adding and removing
Version Number: 1.1
*/
$pageTitle = "Job Vacancies";

// import the head section
include "includes/adminHead.php";

if (isset($_SESSION['login']) && $_SESSION['login'] == "valid") {
?>
<body>
	<div class="container-fluid cmsContainer">
		<?php include "includes/cmsSidebar.php"; ?>

		<div class="cmsContent offset-2 col-md-10">
			<div class="row">
				<div class="col-12">
					<a href="#/" class="accordionButton" onclick="toggleAccordion('newJobVacancy')">
						<div class="accordionHeading">
							<h3>New</h3>
							<img class="accordionArrow" src="../images/arrow.png" alt="arrow">
						</div>
					</a>

					<div class="accordionContent newJobVacancy">
						<form action="includes/jobVacancy/insert.php" method="POST" enctype="multipart/form-data">
							<fieldset>

								<div class="form-group">
									<label>Position Description:</label>
									<input class="form-control-file" name="docUpload" type="file" required>
								</div>

								<div class="form-group">
									<label>Position Name:</label>
									<input maxlength="100" class="form-control" type="text" name="position" required>
								</div>

								<div>
									<label>Active:</label>
									<input type="checkbox" name="active"><br>
								</div>
								<input class="formButton" name="jobVacancyAddSubmit" type="submit" value="Add"/>
							</fieldset>
						</form>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<a href="#/" class="accordionButton" onclick="toggleAccordion('updateJobVacancy')">
						<div class="accordionHeading">
							<h3>Update</h3>
							<img class="accordionArrowOpen" src="../images/arrow.png" alt="arrow">
						</div>
					</a>

					<div class="accordionContentOpen updateJobVacancy row">

							<?php
							try {
								// write statement to get data from tbl_slider table
								$sql = "SELECT id, position, fileName, active FROM tbl_jobVacancy;";

								// prepare the statement
								$statement = $pdo->prepare($sql);

								// execute SQL statement
								$resultSet = $pdo->query($sql);

							} // end of try block
							catch (PDOException $e) {

								// create error message
								echo "Error fetching newsletter data: " .$e->getMessage();
								exit();

							} // end catch block

							foreach ($resultSet as $row) {
								// store row data in variables
								$id = $row['id'];
								$position = $row['position'];
								$fileName = $row['fileName'];
								$active = $row['active'];
								?>

								<article class="col-12 col-md-6">
									<form action="includes/jobVacancy/update.php" method="POST"  enctype="multipart/form-data">
										<fieldset id="form<?php echo $id; ?>" disabled>
											<input type="hidden" name="id" value="<?php echo $id; ?>">

											<div class="form-group">
												<label>Position Description:</label>
												<p><?php echo $fileName; ?></p>
												<input class="form-control-file" name="docUpload" type="file">
											</div>

											<div class="form-group">
												<label>Position Name:</label>
												<input maxlength="100" class="form-control" type="text" name="position" value="<?php echo $position; ?>" required>
											</div>

											<div>
												<label>Active:</label>
												<input class="formButton" type="checkbox" name="active" <?php if ($active) echo "checked"; ?>><br>
											</div>
										</fieldset>
										<input id="edit<?php echo $id; ?>" class="formButton" type="button" onclick='enableForm(<?php echo $id; ?>)' value="Edit"/>
										<input id="submit<?php echo $id; ?>" class="formSubmit formButton" name="jobVacancyUpdateSubmit" type="submit" value="Submit"/>
										<input id="cancel<?php echo $id; ?>" class="formSubmit cancelButton" type="button" onclick='disableForm(<?php echo $id; ?>)' value="Cancel"/>
									</form>

									<form action="includes/jobVacancy/delete.php" id="deleteForm<?php echo $id; ?>" class="deleteForm" onsubmit="return checkDelete();" method="POST">
										<input type="hidden" name="id" value="<?php echo $id; ?>">
										<input type="hidden" name="img" value="<?php echo $fileName; ?>">
										<input type="submit" class="cancelButton" name="jobVacancyDeleteSubmit" value="Delete"/>
									</form>
									<hr><br>
								</article>
								<?php
							}
							?>
						</div>
					</div>
				</div>
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
