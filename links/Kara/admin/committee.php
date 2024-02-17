<?php if(session_id() == '') session_start();
/*
Filename: committee.php
Author: Aleksander Tudorin
Date Created: 31/10/2018
Date Last updated:
Last Updated By: Aleksander Tudorin
Description: committee adding and removing
Version Number: 1
*/

// CHANGE PAGE TITLE
$pageTitle = "Committee";

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
					<a href="#/" class="accordionButton" onclick="toggleAccordion('newCommittee')">
						<div class="accordionHeading">
							<h3>New</h3>
							<img class="accordionArrow" src="../images/arrow.png" alt="arrow">
						</div>
					</a>

					<div class="accordionContent newCommittee">
						<form action="includes/committee/insert.php" method="POST">
							<fieldset>
								<div class="form-group">
									<label>First Name:</label>
									<input maxlength="50" class="form-control" type="text" name="firstName" required>
								</div>

								<div class="form-group">
									<label>Last Name:</label>
									<input maxlength="50" class="form-control" type="text" name="lastName" required>
								</div>

								<div class="form-group">
									<label>Position:</label>
									<select class="form-control" type="text" name="committeePosition" required>
									<?php
									getPositionList();
									?>
									</select>
								</div>

								<div class="form-group">
									<label>Role:</label>
									<input class="form-control" type="text" name="role">
								</div>

								<div>
									<label>Active:</label>
									<input type="checkbox" name="active"><br>
								</div>
								<input class="formButton" name="committeeAddSubmit" type="submit" value="Add"/>
							</fieldset>
						</form>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<a href="#/" class="accordionButton" onclick="toggleAccordion('updateCommittee')">
						<div class="accordionHeading">
							<h3>Update</h3>
							<img class="accordionArrowOpen" src="../images/arrow.png" alt="arrow">
						</div>
					</a>

					<div class="accordionContentOpen updateCommittee row">

						<?php
						try {
							// write statement to get data from tbl_slider table
							$sql = "SELECT id, firstName, lastName, committeePosition, role, active FROM tbl_committee;";

							// prepare the statement
							$statement = $pdo->prepare($sql);

							// execute SQL statement
							$resultSet = $pdo->query($sql);

						} // end of try block
						catch (PDOException $e) {

							// create error message
							echo "Error fetching Committee data: " .$e->getMessage();
							exit();

						} // end catch block

						foreach ($resultSet as $row) {
							// store row data in variables
							$id = $row['id'];
							$firstName = $row['firstName'];
							$lastName = $row['lastName'];
							$committeePosition = $row['committeePosition'];
							$role = $row['role'];
							$active = $row['active'];
							?>

							<article class="col-12 col-md-6">
								<form action="includes/committee/update.php" method="POST">
									<fieldset id="form<?php echo $id; ?>" disabled>
										<input type="hidden" name="id" value="<?php echo $id; ?>">

										<div class="form-group">
											<label>First Name:</label>
											<input maxlength="50" class="form-control" type="text" name="firstName" value="<?php echo $firstName; ?>" required>
										</div>

										<div class="form-group">
											<label>Last Name:</label>
											<input maxlength="50" class="form-control" type="text" name="lastName" value="<?php echo $lastName; ?>" required>
										</div>

										<div class="form-group">
											<label>Position:</label>
											<select class="form-control" type="text" name="committeePosition" required>
											<?php
											getCommitteePosition($committeePosition);
											?>
											</select>
										</div>

										<div class="form-group">
											<label>Role:</label>
											<input class="form-control" type="text" name="role" value="<?php echo $role; ?>">
										</div>

										<div>
											<label>Active:</label>
											<input class="formButton" type="checkbox" name="active" <?php if ($active) echo "checked"; ?>><br>
										</div>

									</fieldset>
									<input id="edit<?php echo $id; ?>" class="formButton" type="button" onclick='enableForm(<?php echo $id; ?>)' value="Edit"/>
									<input id="submit<?php echo $id; ?>" class="formSubmit formButton" name="committeeUpdateSubmit" type="submit" value="Submit"/>
									<input id="cancel<?php echo $id; ?>" class="formCancel cancelButton" type="button" onclick='disableForm(<?php echo $id; ?>)' value="Cancel"/>
								</form>

								<form action="includes/committee/delete.php" id="deleteForm<?php echo $id; ?>" class="deleteForm" onsubmit="return checkDelete();" method="POST">
									<input type="hidden" name="id" value="<?php echo $id; ?>">
									<input type="submit" class="cancelButton" name="committeeDeleteSubmit" value="Delete"/>
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
