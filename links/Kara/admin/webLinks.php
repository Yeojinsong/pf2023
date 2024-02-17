<?php if(session_id() == '') session_start();
/*
Filename: webLinks.php
Author: Dahmon Bicheno
Date Created: 7/11/2018
Date Last updated:
Last Updated By: Dahmon Bicheno
Description: Web Links adding and removing
Version Number: 1
*/

// CHANGE PAGE TITLE
$pageTitle = "Web Links";

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
					<a href="#/" class="accordionButton" onclick="toggleAccordion('newWebLink')">
						<div class="accordionHeading">
							<h3>New</h3>
							<img class="accordionArrow" src="../images/arrow.png" alt="arrow">
						</div>
					</a>

					<div class="accordionContent newWebLink">
						<form action="includes/webLinks/insert.php" method="POST">
							<fieldset>
								<div class="form-group">
									<label>URL:</label>
									<input maxlength="100" class="form-control" type="text" name="url" required>
									<p>Include https:// or http:// and the full domain name</p>
								</div>

								<div class="form-group">
									<label>Description:</label>
									<textarea class="form-control" type="textarea" name="description" required></textarea>
								</div>

								<div>
									<label>Active:</label>
									<input class="formButton" type="checkbox" name="active"><br>
								</div>

								<input class="formButton" name="webLinkAddSubmit" type="submit" value="Add"/>
							</fieldset>
						</form>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<a href="#/" class="accordionButton" onclick="toggleAccordion('updateWebLink')">
						<div class="accordionHeading">
							<h3>Update</h3>
							<img class="accordionArrowOpen" src="../images/arrow.png" alt="arrow">
						</div>
					</a>

					<div class="accordionContentOpen updateWebLink row">

						<?php
						try {
							// write statement to get data from tbl_slider table
							$sql = "SELECT id, url, description, active FROM tbl_webLink;";

							// prepare the statement
							$statement = $pdo->prepare($sql);

							// execute SQL statement
							$resultSet = $pdo->query($sql);

						} // end of try block
						catch (PDOException $e) {

							// create error message
							echo "Error fetching Web Links: " .$e->getMessage();
							exit();

						} // end catch block

						foreach ($resultSet as $row) {
							// store row data in variables
							$id = $row['id'];
							$url = $row['url'];
							$description = $row['description'];
							$active = $row['active'];
							?>

							<article class="col-12 col-md-6">
								<form action="includes/webLinks/update.php" method="POST">
									<fieldset id="form<?php echo $id; ?>" disabled>
										<input type="hidden" name="id" value="<?php echo $id; ?>">

										<div class="form-group">
											<label>URL:</label>
											<input maxlength="100" class="form-control" type="text" name="url" value="<?php echo $url; ?>" required>
											<p>Inculde https:// or http:// and the full domain name</p>
										</div>

										<div class="form-group">
											<label>Description:</label>
											<textarea class="form-control" type="textarea" name="description" required><?php echo $description; ?></textarea>
										</div>

										<div>
											<label>Active:</label>
											<input class="formButton" type="checkbox" name="active" <?php if ($active) echo "checked"; ?>><br>
										</div>
									</fieldset>
									<input id="edit<?php echo $id; ?>" class="formButton" type="button" onclick='enableForm(<?php echo $id; ?>)' value="Edit"/>
									<input id="submit<?php echo $id; ?>" class="formSubmit formButton" name="webLinkUpdateSubmit" type="submit" value="Submit"/>
									<input id="cancel<?php echo $id; ?>" class="formCancel cancelButton" type="button" onclick='disableForm(<?php echo $id; ?>)' value="Cancel"/>
								</form>

								<form action="includes/webLinks/delete.php" id="deleteForm<?php echo $id; ?>" class="deleteForm" onsubmit="return checkDelete();" method="POST">
									<input type="hidden" name="id" value="<?php echo $id; ?>">
									<input type="submit" class="cancelButton" name="webLinkDeleteSubmit" value="Delete"/>
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
