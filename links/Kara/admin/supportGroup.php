<?php if(session_id() == '') session_start();
/*
Filename: supportGroup.php
Author: Yeojin Song
Date Created: 9/11/2018
Date Last updated:
Last Updated By: Yeojin Song
Description: Support Group table adding and removing
Version Number: 1
*/

// CHANGE PAGE TITLE
$pageTitle = "Support Group";

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
					<a href="#/" class="accordionButton" onclick="toggleAccordion('newSupportGroup')">
						<div class="accordionHeading">
							<h3>New</h3>
							<img class="accordionArrow" src="../images/arrow.png" alt="arrow">
						</div>
					</a>

					<div class="accordionContent newSupportGroup">
						<form action="includes/supportGroup/insert.php" method="POST" enctype="multipart/form-data">
							<fieldset>
								<div class="form-group">
									<label>Start:</label>
									<input maxlength="255" class="form-control" type="text" name="start" required>
								</div>
								<div class="form-group">
									<label>Time:</label>
									<input maxlength="255" class="form-control" type="text" name="time" required>
								</div>
								<div class="form-group">
									<label>Location:</label>
									<input maxlength="255" class="form-control" type="text" name="location" required>
								</div>
								<div class="form-group">
									<label>Childcare:</label>
									<input maxlength="255" class="form-control" type="text" name="children" required>
								</div>
								<div class="form-group">
									<label>Refreshments:</label>
									<input maxlength="255" class="form-control" type="text" name="refreshments" required>
								</div>
								<div class="form-group">
									<label>Transport:</label>
									<input maxlength="255" class="form-control" type="text" name="transport" required>
								</div>
								<div>
									<label>Active:</label>
									<input class="formButton" type="checkbox" name="active"><br>
								</div>
								<input class="formButton" name="supportGroupAddSubmit" type="submit" value="Add"/>
							</fieldset>
						</form>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<a href="#/" class="accordionButton" onclick="toggleAccordion('updateSupportGroup')">
						<div class="accordionHeading">
							<h3>Update</h3>
							<img class="accordionArrowOpen" src="../images/arrow.png" alt="arrow">
						</div>
					</a>

					<div class="accordionContentOpen updateSupportGroup row">

						<?php
						try {
							// write statement to get data from tbl_supportGroup table
							$sql = "SELECT id, start, time, location, children, refreshments, transport, active FROM tbl_supportGroup;";

							// prepare the statement
							$statement = $pdo->prepare($sql);

							// execute SQL statement
							$resultSet = $pdo->query($sql);

						} // end of try block
						catch (PDOException $e) {

							// create error message
							echo "Error fetching support Group data: " .$e->getMessage();
							exit();

						} // end catch block

						foreach ($resultSet as $row) {
							// store row data in variables
							$id = $row['id'];
							$start = $row['start'];
							$time = $row['time'];
							$location = $row['location'];
							$children = $row['children'];
							$refreshments = $row['refreshments'];
							$transport = $row['transport'];
							$active = $row['active'];
							?>

							<article class="col-12 col-md-6">
								<form action="includes/supportGroup/update.php" method="POST" enctype="multipart/form-data">
									<fieldset id="form<?php echo $id; ?>" disabled>
										<input type="hidden" name="id" value="<?php echo $id; ?>">

										<div class="form-group">
											<label>Start:</label>
											<input maxlength="255" class="form-control" type="text" name="start" value="<?php echo $start; ?>" required>
										</div>

										<div class="form-group">
											<label>Time:</label>
											<input maxlength="255" class="form-control" type="text" name="time" value="<?php echo $time; ?>" required>
										</div>

										<div class="form-group">
											<label>Location:</label>
											<input maxlength="255" class="form-control" type="text" name="location" value="<?php echo $location; ?>" required>
										</div>

										<div class="form-group">
											<label>Childcare:</label>
											<input maxlength="255" class="form-control" type="text" name="children" value="<?php echo $children; ?>" required>
										</div>

										<div class="form-group">
											<label>Refreshments:</label>
											<input maxlength="255" class="form-control" type="text" name="refreshments" value="<?php echo $refreshments; ?>" required>
										</div>

										<div class="form-group">
											<label>Transport:</label>
											<input maxlength="255" class="form-control" type="text" name="transport" value="<?php echo $transport; ?>" required>
										</div>

										<div>
											<label>Active:</label>
											<input class="formButton" type="checkbox" name="active" <?php if ($active) echo "checked"; ?>><br>
										</div>
									</fieldset>
									<input id="edit<?php echo $id; ?>" class="formButton" type="button" onclick='enableForm(<?php echo $id; ?>)' value="Edit"/>
									<input id="submit<?php echo $id; ?>" class="formSubmit formButton" name="supportGroupUpdateSubmit" type="submit" value="Submit"/>
									<input id="cancel<?php echo $id; ?>" class="formCancel cancelButton" type="button" onclick='disableForm(<?php echo $id; ?>)' value="Cancel"/>
								</form>

								<form action="includes/supportGroup/delete.php" id="deleteForm<?php echo $id; ?>" class="deleteForm" onsubmit="return checkDelete();" method="POST">
									<input type="hidden" name="id" value="<?php echo $id; ?>">
									<input type="submit" class="cancelButton" name="supportGroupDeleteSubmit" value="Delete"/>
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
