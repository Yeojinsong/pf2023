<?php if(session_id() == '') session_start();
/*
Filename: hero.php
Author: Dahmon Bicheno
Date Created: 31/10/18
Date Last updated: 2/11/18
Last Updated By: Dahmon Bicheno
Description: Hero adding and removing
Version Number: 1.3
*/

// CHANGE PAGE TITLE
$pageTitle = "Hero Images";

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
					<a href="#/" class="accordionButton" onclick="toggleAccordion('newHero')">
						<div class="accordionHeading">
							<h3>New</h3>
							<img class="accordionArrow" src="../images/arrow.png" alt="arrow">
						</div>
					</a>

					<div class="accordionContent newHero">
						<form action="includes/hero/insert.php" method="POST" enctype="multipart/form-data">
							<fieldset>
								<div class="form-group">
									<label>Image:</label>
									<input class="form-control-file" name="imgUpload" type="file" required>
									<p>Required Size: 1920 x 400</p>
								</div>

								<div class="form-group">
									<label>Name:</label>
									<input maxlength="100" class="form-control" type="text" name="name" required>
								</div>

								<div class="row">
									<label class="col-12">Active:</label>
									<div class="col-4 col-md-6 col-lg-4">
										<label>Be Informed:</label>
										<input class="formButton" type="checkbox" name="activeBeInformed"><br>
									</div>

									<div class="col-4 col-md-6 col-lg-4">
										<label>Seek Help:</label>
										<input class="formButton" type="checkbox" name="activeSeekHelp"><br>
									</div>

									<div class="col-4 col-md-6 col-lg-4">
										<label>Get Involved:</label>
										<input class="formButton" type="checkbox" name="activeGetInvolved"><br>
									</div>
									<div class="col-4 col-md-6 col-lg-4">
										<label>About Us:</label>
										<input class="formButton" type="checkbox" name="activeAboutUs"><br>
									</div>

									<div class="col-4 col-md-6 col-lg-4">
										<label>What's New:</label>
										<input class="formButton" type="checkbox" name="activeWhatsNew"><br>
									</div>

									<div class="col-4 col-md-6 col-lg-4">
										<label>Media:</label>
										<input class="formButton" type="checkbox" name="activeMedia"><br>
									</div>
								</div>

								<input class="formButton" name="heroAddSubmit" type="submit" value="Add"/>
							</fieldset>
						</form>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<a href="#/" class="accordionButton" onclick="toggleAccordion('updateHero')">
						<div class="accordionHeading">
							<h3>Update</h3>
							<img class="accordionArrowOpen" src="../images/arrow.png" alt="arrow">
						</div>
					</a>

					<div class="accordionContentOpen updateHero row">
						<?php
						try {
							// write statement to get data from tbl_slider table
							$sql = "SELECT id, name, img, activeBeInformed, activeSeekHelp, activeGetInvolved, activeAboutUs, activeWhatsNew, activeMedia FROM tbl_heroImage;";

							// prepare the statement
							$statement = $pdo->prepare($sql);

							// execute SQL statement
							$resultSet = $pdo->query($sql);

						} // end of try block
						catch (PDOException $e) {

							// create error message
							echo "Error fetching Hero Image data: " .$e->getMessage();
							exit();

						} // end catch block

						foreach ($resultSet as $row) {
							// store row data in variables
							$id = $row['id'];
							$name = $row['name'];
							$img = $row['img'];
							$activeBeInformed = $row['activeBeInformed'];
							$activeSeekHelp = $row['activeSeekHelp'];
							$activeGetInvolved = $row['activeGetInvolved'];
							$activeAboutUs = $row['activeAboutUs'];
							$activeWhatsNew = $row['activeWhatsNew'];
							$activeMedia = $row['activeMedia'];
							?>

							<article class="col-12 col-md-6">
								<img class="img-fluid" src="../<?php echo $img; ?>">

								<form action="includes/hero/update.php" method="POST" enctype="multipart/form-data">
									<fieldset id="form<?php echo $id; ?>" disabled>
										<input type="hidden" name="id" value="<?php echo $id; ?>">

										<div class="form-group">
											<label>New Image:</label>
											<input class="form-control-file" name="imgUpload" type="file">
											<p>Required Size: 1920 x 400</p>
										</div>

										<div class="form-group">
											<label>Name:</label>
											<input maxlength="100" class="form-control" type="text" name="name" value="<?php echo $name; ?>" required>
										</div>

										<div class="row">
											<label class="col-12">Active:</label>
											<div class="col-12 col-sm-4 col-md-6">
												<label>Be Informed:</label>
												<input class="formButton" type="checkbox" name="activeBeInformed" <?php if ($activeBeInformed) echo "checked"; ?>><br>
											</div>

											<div class="col-12 col-sm-4 col-md-6">
												<label>Seek Help:</label>
												<input class="formButton" type="checkbox" name="activeSeekHelp" <?php if ($activeSeekHelp) echo "checked"; ?>><br>
											</div>

											<div class="col-12 col-sm-4 col-md-6">
												<label>Get Involved:</label>
												<input class="formButton" type="checkbox" name="activeGetInvolved" <?php if ($activeGetInvolved) echo "checked"; ?>><br>
											</div>
											<div class="col-12 col-sm-4 col-md-6">
												<label>About Us:</label>
												<input class="formButton" type="checkbox" name="activeAboutUs" <?php if ($activeAboutUs) echo "checked"; ?>><br>
											</div>

											<div class="col-12 col-sm-4 col-md-6">
												<label>What's New:</label>
												<input class="formButton" type="checkbox" name="activeWhatsNew" <?php if ($activeWhatsNew) echo "checked"; ?>><br>
											</div>

											<div class="col-12 col-sm-4 col-md-6">
												<label>Media:</label>
												<input class="formButton" type="checkbox" name="activeMedia" <?php if ($activeMedia) echo "checked"; ?>><br>
											</div>
										</div>
									</fieldset>
									<input id="edit<?php echo $id; ?>" class="formButton" type="button" onclick='enableForm(<?php echo $id; ?>)' value="Edit"/>
									<input id="submit<?php echo $id; ?>" class="formSubmit formButton" name="heroUpdateSubmit" type="submit" value="Submit"/>
									<input id="cancel<?php echo $id; ?>" class="formCancel cancelButton" type="button" onclick='disableForm(<?php echo $id; ?>)' value="Cancel"/>
								</form>

								<form action="includes/hero/delete.php" id="deleteForm<?php echo $id; ?>" class="deleteForm" onsubmit="return checkDelete();" method="POST">
									<input type="hidden" name="id" value="<?php echo $id; ?>">
									<input type="submit" class="cancelButton" name="heroDeleteSubmit" value="Delete"/>
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
