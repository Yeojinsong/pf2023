<?php if(session_id() == '') session_start();
/*
Filename: employmentFacts.php
Author: Harris Salehi
Date Created: 20/11/2018
Date Last updated: 20/11/2018
Last Updated By: Harris Salehi
Description: Employment Facts adding and removing
Version Number: 1
*/

// CHANGE PAGE TITLE
$pageTitle = "Employment Facts";

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
					<a href="#/" class="accordionButton" onclick="toggleAccordion('newEmploymentFact')">
						<div class="accordionHeading">
							<h3>New</h3>
							<img class="accordionArrow" src="../images/arrow.png" alt="arrow">
						</div>
					</a>

					<div class="accordionContent newEmploymentFact">
						<form action="includes/employmentFacts/insert.php" method="POST">
							<fieldset>
								<div class="form-group">
									<label>Heading:</label>
									<input maxlength="75" class="form-control" type="text" name="heading" required>
								</div>

								<label>Fact:</label>
								<textarea id="newEmploymentFact" name="fact">
								</textarea>
								<script>
									CKEDITOR.replace("newEmploymentFact");
								</script>

								<div>
									<label>Active:</label>
									<input class="formButton" type="checkbox" name="active"><br>
								</div>

								<input class="formButton" name="employmentFactAddSubmit" type="submit" value="Add"/>
							</fieldset>
						</form>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<a href="#/" class="accordionButton" onclick="toggleAccordion('updateEmploymentFact')">
						<div class="accordionHeading">
							<h3>Update</h3>
							<img class="accordionArrowOpen" src="../images/arrow.png" alt="arrow">
						</div>
					</a>

					<div class="accordionContentOpen updateEmploymentFact row">

						<?php
						try {
							// write statement to get data from tbl_slider table
							$sql = "SELECT id, heading, fact, active FROM tbl_getInvolvedFact WHERE factType = 2;";

							// prepare the statement
							$statement = $pdo->prepare($sql);

							// execute SQL statement
							$resultSet = $pdo->query($sql);

						} // end of try block
						catch (PDOException $e) {

							// create error message
							echo "Error fetching Employment data: " .$e->getMessage();
							exit();

						} // end catch block

						foreach ($resultSet as $row) {
							// store row data in variables
							$id = $row['id'];
							$heading = $row['heading'];
							$fact = $row['fact'];
							$active = $row['active'];
							?>

							<article class="col-12 col-lg-6">
								<form action="includes/employmentFacts/update.php" method="POST">
									<fieldset id="form<?php echo $id; ?>" disabled>
										<input type="hidden" name="id" value="<?php echo $id; ?>">

										<div class="form-group">
											<label>Heading:</label>
											<input maxlength="75" class="form-control" type="text" name="heading" value="<?php echo $heading; ?>" required>
										</div>

										<label>Fact:</label>
										<textarea id="employmentFact<?php echo $id; ?>" name="fact">
											<?php echo $fact; ?>
										</textarea>
										<script>
											CKEDITOR.replace("employmentFact<?php echo $id; ?>");
										</script>

										<div>
											<label>Active:</label>
											<input class="formButton" type="checkbox" name="active" <?php if ($active) echo "checked"; ?>><br>
										</div>
									</fieldset>
									<input id="edit<?php echo $id; ?>" class="formButton" type="button" onclick='enableForm(<?php echo $id; ?>)' value="Edit"/>
									<input id="submit<?php echo $id; ?>" class="formSubmit formButton" name="employmentFactUpdateSubmit" type="submit" value="Submit"/>
									<input id="cancel<?php echo $id; ?>" class="formCancel cancelButton" type="button" onclick='disableForm(<?php echo $id; ?>)' value="Cancel"/>
								</form>

								<form action="includes/employmentFacts/delete.php" id="deleteForm<?php echo $id; ?>" class="deleteForm" onsubmit="return checkDelete();" method="POST">
									<input type="hidden" name="id" value="<?php echo $id; ?>">
									<input type="submit" class="cancelButton" name="employmentFactDeleteSubmit" value="Delete"/>
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
