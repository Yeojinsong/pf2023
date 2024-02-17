<?php if(session_id() == '') session_start();
/*
Filename: history.php
Author: Aleksander Tudorin
Date Created: 31/10/2018
Date Last updated:
Last Updated By: Aleksander Tudorin
Description: history adding and removing
Version Number: 1
*/

// CHANGE PAGE TITLE
$pageTitle = "History";

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
					<a href="#/" class="accordionButton" onclick="toggleAccordion('newHistory')">
						<div class="accordionHeading">
							<h3>New</h3>
							<img class="accordionArrow" src="../images/arrow.png" alt="arrow">
						</div>
					</a>

					<div class="accordionContent newHistory">
						<form action="includes/history/insert.php" method="POST">
							<fieldset>
								<div class="form-group">
									<label>Year:</label>
									<input maxlength="4" class="form-control" type="text" name="year" required>
								</div>

								<div class="form-group">
									<label>Event:</label>
									<input maxlength="255" class="form-control" type="text" name="event" required>
								</div>

								<div>
									<label>Active:</label>
									<input type="checkbox" name="active"><br>
								</div>
								<input class="formButton" name="historyAddSubmit" type="submit" value="Add"/>
							</fieldset>
						</form>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<a href="#/" class="accordionButton" onclick="toggleAccordion('updateHistory')">
						<div class="accordionHeading">
							<h3>Update</h3>
							<img class="accordionArrowOpen" src="../images/arrow.png" alt="arrow">
						</div>
					</a>

					<div class="accordionContentOpen updateHistory row">

						<?php
						try {
							// write statement to get data from tbl_slider table
							$sql = "SELECT id, year, event, active FROM tbl_history;";

							// prepare the statement
							$statement = $pdo->prepare($sql);

							// execute SQL statement
							$resultSet = $pdo->query($sql);

						} // end of try block
						catch (PDOException $e) {

							// create error message
							echo "Error fetching History data: " .$e->getMessage();
							exit();

						} // end catch block

						foreach ($resultSet as $row) {
							// store row data in variables
							$id = $row['id'];
							$year = $row['year'];
							$event = $row['event'];
							$active = $row['active'];
							?>

							<article class="col-12 col-md-6">
								<form action="includes/history/update.php" method="POST">
									<fieldset id="form<?php echo $id; ?>" disabled>
										<input type="hidden" name="id" value="<?php echo $id; ?>">

										<div class="form-group">
											<label>Year:</label>
											<input maxlength="4" class="form-control" type="text" name="year" value="<?php echo $year; ?>" required>
										</div>

										<div class="form-group">
											<label>Event:</label>
											<textarea maxlength="255" class="form-control" type="textarea" name="event" required><?php echo $event; ?></textarea>
										</div>

										<div>
											<label>Active:</label>
											<input class="formButton" type="checkbox" name="active" <?php if ($active) echo "checked"; ?>><br>
										</div>

									</fieldset>
									<input id="edit<?php echo $id; ?>" class="formButton" type="button" onclick='enableForm(<?php echo $id; ?>)' value="Edit"/>
									<input id="submit<?php echo $id; ?>" class="formSubmit formButton" name="historyUpdateSubmit" type="submit" value="Submit"/>
									<input id="cancel<?php echo $id; ?>" class="formCancel cancelButton" type="button" onclick='disableForm(<?php echo $id; ?>)' value="Cancel"/>
								</form>

								<form action="includes/history/delete.php" id="deleteForm<?php echo $id; ?>" class="deleteForm" onsubmit="return checkDelete();" method="POST">
									<input type="hidden" name="id" value="<?php echo $id; ?>">
									<input type="submit" class="cancelButton" name="historyDeleteSubmit" value="Delete"/>
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
