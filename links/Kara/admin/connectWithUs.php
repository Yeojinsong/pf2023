<?php if(session_id() == '') session_start();
/*
Filename: connectWithUs.php
Author: Harris Salehi
Date Created: 06/11/2018
Date Last updated:
Last Updated By: Harris Salehi
Description: Statistics adding and removing
Version Number: 1
*/

// CHANGE PAGE TITLE
$pageTitle = "Connect With Us";

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
						<form action="includes/connectWithUs/insert.php" method="POST" enctype="multipart/form-data">
							<fieldset>

								<label>Content:</label>
								<textarea id="newConnectWithUs" name="content" required>

								</textarea>

								<script>
									CKEDITOR.replace("newConnectWithUs");
								</script>

								<div>
									<label>Active:</label>
									<input type="checkbox" name="active"><br>
								</div>
								<input class="formButton" name="connectWithUsAddSubmit" type="submit" value="Add"/>
							</fieldset>
						</form>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<a href="#/" class="accordionButton" onclick="toggleAccordion('updateConnectWithUs')">
						<div class="accordionHeading">
							<h3>Update</h3>
							<img class="accordionArrowOpen" src="../images/arrow.png" alt="arrow">
						</div>
					</a>

					<div class="accordionContentOpen updateConnectWithUs row">

						<?php
						try {
							// write statement to get data from tbl_slider table
							$sql = "SELECT id, content, active FROM tbl_connectWithUs;";

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
							$content = $row['content'];
							$active = $row['active'];
							?>

							<article class="col-12">
								<form action="includes/connectWithUs/update.php" method="POST" enctype="multipart/form-data">
									<fieldset id="form<?php echo $id; ?>" disabled>
										<input type="hidden" name="id" value="<?php echo $id; ?>">

										<label>Content:</label>
										<textarea id="updateConnectWithUs<?php echo $id; ?>" name="content" required>
											<?php echo $content; ?>
										</textarea>

										<script>
											CKEDITOR.replace("updateConnectWithUs<?php echo $id; ?>");
										</script>

										<div>
											<label>Active:</label>
											<input class="formButton" type="checkbox" name="active" <?php if ($active) echo "checked"; ?>><br>
										</div>

									</fieldset>
									<input id="edit<?php echo $id; ?>" class="formButton" type="button" onclick='enableForm(<?php echo $id; ?>)' value="Edit"/>
									<input id="submit<?php echo $id; ?>" class="formSubmit formButton" name="connectWithUsUpdateSubmit" type="submit" value="Submit"/>
									<input id="cancel<?php echo $id; ?>" class="formCancel cancelButton" type="button" onclick='disableForm(<?php echo $id; ?>)' value="Cancel"/>
								</form>

								<form action="includes/connectWithUs/delete.php" id="deleteForm<?php echo $id; ?>" class="deleteForm" onsubmit="return checkDelete();" method="POST">
									<input type="hidden" name="id" value="<?php echo $id; ?>">
									<input type="submit" class="cancelButton" name="connectWithUsDeleteSubmit" value="Delete"/>
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
