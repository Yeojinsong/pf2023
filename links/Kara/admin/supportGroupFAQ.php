<?php if(session_id() == '') session_start();
/*
Filename: supportGroupFAQ.php
Author: Yeojin Song
Date Created: 9/11/2018
Date Last updated:
Last Updated By: Yeojin Song
Description: Support Group FAQ adding and removing
Version Number: 1
*/

// CHANGE PAGE TITLE
$pageTitle = "Support Group FAQ";

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
					<a href="#/" class="accordionButton" onclick="toggleAccordion('newSupportGroupFAQ')">
						<div class="accordionHeading">
							<h3>New</h3>
							<img class="accordionArrow" src="../images/arrow.png" alt="arrow">
						</div>
					</a>

					<div class="accordionContent newSupportGroupFAQ">
						<form action="includes/supportGroupFAQ/insert.php" method="POST" enctype="multipart/form-data">
							<fieldset>
								<div class="form-group">
									<label>Heading:</label>
									<input maxlength="75" class="form-control" type="text" name="question" required>
								</div>
								<div class="form-group">
									<label>Text:</label>
									<textarea id="newAnswer" name="answer">
									</textarea>
									<script>
										CKEDITOR.replace("newAnswer");
									</script>
								</div>
								<div>
									<label>Active:</label>
									<input class="formButton" type="checkbox" name="active"><br>
								</div>
								<input class="formButton" name="AddSubmit" type="submit" value="Add"/>
							</fieldset>
						</form>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<a href="#/" class="accordionButton" onclick="toggleAccordion('updateSupportGroupFAQ')">
						<div class="accordionHeading">
							<h3>Update</h3>
							<img class="accordionArrowOpen" src="../images/arrow.png" alt="arrow">
						</div>
					</a>

					<div class="accordionContentOpen updateSupportGroupFAQ row">

						<?php
						try {
							// write statement to get data from tbl_supportGroup table
							$sql = "SELECT id, question, answer, active FROM tbl_supportGroupFAQ;";

							// prepare the statement
							$statement = $pdo->prepare($sql);

							// execute SQL statement
							$resultSet = $pdo->query($sql);

						} // end of try block
						catch (PDOException $e) {

							// create error message
							echo "Error fetching support Group FAQ data: " .$e->getMessage();
							exit();

						} // end catch block

						foreach ($resultSet as $row) {
							// store row data in variables
							$id = $row['id'];
							$question = $row['question'];
							$answer = $row['answer'];
							$active = $row['active'];
							?>

							<article class="col-12 col-md-6">
								<form action="includes/supportGroupFAQ/update.php" method="POST" enctype="multipart/form-data">
									<fieldset id="form<?php echo $id; ?>" disabled>
										<input type="hidden" name="id" value="<?php echo $id; ?>">

										<div class="form-group">
											<label>Heading:</label>
											<input maxlength="75" class="form-control" type="text" name="question" value="<?php echo $question; ?>" required>
										</div>

										<div class="form-group">
											<label>Text:</label>
											<textarea id="editAnswer<?php echo $id; ?>" name="answer">
											<?php echo $answer; ?>
											</textarea>
											<script>
												CKEDITOR.replace("editAnswer<?php echo $id; ?>");
											</script>
										</div>


										<div>
											<label>Active:</label>
											<input class="formButton" type="checkbox" name="active" <?php if ($active) echo "checked"; ?>><br>
										</div>
									</fieldset>
									<input id="edit<?php echo $id; ?>" class="formButton" type="button" onclick='enableForm(<?php echo $id; ?>)' value="Edit"/>
									<input id="submit<?php echo $id; ?>" class="formSubmit formButton" name="supportGroupUpdateFAQSubmit" type="submit" value="Submit"/>
									<input id="cancel<?php echo $id; ?>" class="formCancel cancelButton" type="button" onclick='disableForm(<?php echo $id; ?>)' value="Cancel"/>
								</form>

								<form action="includes/supportGroupFAQ/delete.php" id="deleteForm<?php echo $id; ?>" class="deleteForm" onsubmit="return checkDelete();" method="POST">
									<input type="hidden" name="id" value="<?php echo $id; ?>">
									<input type="submit" class="cancelButton" name="supportGroupFAQDeleteSubmit" value="Delete"/>
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
