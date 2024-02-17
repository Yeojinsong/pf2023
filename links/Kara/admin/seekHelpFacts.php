<?php if(session_id() == '') session_start();
/*
Filename: seekHelpFacts.php
Author: Yeojin Song
Date Created: 9/11/2018
Date Last updated:
Last Updated By: Yeojin Song
Description: Seek Help Facts adding and removing
Version Number: 1
*/

// CHANGE PAGE TITLE
$pageTitle = "Seek Help Facts";

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
					<a href="#/" class="accordionButton" onclick="toggleAccordion('newSeekHelpFacts')">
						<div class="accordionHeading">
							<h3>New</h3>
							<img class="accordionArrow" src="../images/arrow.png" alt="arrow">
						</div>
					</a>

					<div class="accordionContent newSeekHelpFacts">
						<form action="includes/seekHelpFacts/insert.php" method="POST" enctype="multipart/form-data">
							<fieldset>
								<div class="form-group">
									<label>Image:</label>
									<input class="form-control-file" name="imgUpload" type="file" required>
									<p>Required Size: 455 x 360</p>
								</div>

								<div class="form-group">
									<label>Heading:</label>
									<input maxlength="75" class="form-control" type="text" name="heading" required>
								</div>

								<label>Fact:</label>
								<textarea id="newSeekHelpFacts" name="fact">
								</textarea>
								<script>
									CKEDITOR.replace("newSeekHelpFacts");
								</script>

								<div>
									<label>Active:</label>
									<input class="formButton" type="checkbox" name="active"><br>
								</div>
								<input class="formButton" name="violenceFactAddSubmit" type="submit" value="Add"/>
							</fieldset>
						</form>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<a href="#/" class="accordionButton" onclick="toggleAccordion('updateSeekHelpFact')">
						<div class="accordionHeading">
							<h3>Update</h3>
							<img class="accordionArrowOpen" src="../images/arrow.png" alt="arrow">
						</div>
					</a>

					<div class="accordionContentOpen updateSeekHelpFact row">

						<?php
						try {
							// write statement to get data from tbl_seekHelpFact table
							$sql = "SELECT id, heading, img, fact, active FROM tbl_seekHelpFact;";

							// prepare the statement
							$statement = $pdo->prepare($sql);

							// execute SQL statement
							$resultSet = $pdo->query($sql);

						} // end of try block
						catch (PDOException $e) {

							// create error message
							echo "Error fetching Seek Help Fact data: " .$e->getMessage();
							exit();

						} // end catch block

						foreach ($resultSet as $row) {
							// store row data in variables
							$id = $row['id'];
							$heading = $row['heading'];
							$img = $row['img'];
							$fact = $row['fact'];
							$active = $row['active'];
							?>

							<article class="col-12 col-md-6">
								<img class="img-fluid" src="../<?php echo $img; ?>">

								<form action="includes/seekHelpFacts/update.php" method="POST" enctype="multipart/form-data">
									<fieldset id="form<?php echo $id; ?>" disabled>
										<input type="hidden" name="id" value="<?php echo $id; ?>">

										<div class="form-group">
											<label>New Image:</label>
											<input class="form-control-file" name="imgUpload" type="file">
											<p>Required Size: 445 x 364</p>
										</div>

										<div class="form-group">
											<label>Heading:</label>
											<input maxlength="75" class="form-control" type="text" name="heading" value="<?php echo $heading; ?>" required>
										</div>

										<label>Fact:</label>
										<textarea id="seekHelpFacts<?php echo $id; ?>" name="fact">
											<?php echo $fact; ?>
										</textarea>
										<script>
											CKEDITOR.replace("seekHelpFacts<?php echo $id; ?>");
										</script>

										<div>
											<label>Active:</label>
											<input class="formButton" type="checkbox" name="active" <?php if ($active) echo "checked"; ?>><br>
										</div>
									</fieldset>
									<input id="edit<?php echo $id; ?>" class="formButton" type="button" onclick='enableForm(<?php echo $id; ?>)' value="Edit"/>
									<input id="submit<?php echo $id; ?>" class="formSubmit formButton" name="seekHelpFactsUpdateSubmit" type="submit" value="Submit"/>
									<input id="cancel<?php echo $id; ?>" class="formCancel cancelButton" type="button" onclick='disableForm(<?php echo $id; ?>)' value="Cancel"/>
								</form>

								<form action="includes/seekHelpFacts/delete.php" id="deleteForm<?php echo $id; ?>" class="deleteForm" onsubmit="return checkDelete();" method="POST">
									<input type="hidden" name="id" value="<?php echo $id; ?>">
									<input type="submit" class="cancelButton" name="seekHelpFactsDeleteSubmit" value="Delete"/>
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
