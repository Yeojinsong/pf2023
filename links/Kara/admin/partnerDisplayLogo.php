<?php if(session_id() == '') session_start();
/*
Filename: partnerDisplayLogo.php
Author: Harris Salehi
Date Created: 19/10/2018
Date Last updated: 15/11/18
Last Updated By: Harris Salehi
Description: Partner table adding, updating and removing with logos
Version Number: 0.4
*/

// CHANGE PAGE TITLE
$pageTitle = "Partner With Us";

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
					<a href="#/" class="accordionButton" onclick="toggleAccordion('newSlider')">
						<div class="accordionHeading">
							<h3>New</h3>
							<img class="accordionArrow" src="../images/arrow.png" alt="arrow">
						</div>
					</a>

					<div class="accordionContent newSlider">
						<form action="includes/partnerDisplayLogo/insert.php" method="POST" enctype="multipart/form-data">
							<fieldset>
								<div class="form-group">
									<label>Logo:</label>
									<input class="form-control-file" name="imgUpload" type="file">
									<p>Required Size: 168 x 168</p>
								</div>

								<div class="form-group">
									<label>Name:</label>
									<input maxlength="100" class="form-control" type="text" name="name" required>
								</div>

								<div class="form-group">
									<label>URL:</label>
									<input maxlength="100" class="form-control" type="text" name="url">
									<p>Include https:// or http:// and the full domain name</p>
								</div>

								<div>
									<label>Display Logo:</label>
									<input type="checkbox" name="displayLogo"><br>
								</div>

								<input class="formButton" name="sliderAddSubmit" type="submit" value="Add"/>
							</fieldset>
						</form>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<a href="#/" class="accordionButton" onclick="toggleAccordion('updateSlider')">
						<div class="accordionHeading">
							<h3>Update</h3>
							<img class="accordionArrowOpen" src="../images/arrow.png" alt="arrow">
						</div>
					</a>

					<div class="accordionContentOpen updateSlider row">

						<?php
						try {
							// write statement to get data from tbl_partner table
							$sql = "SELECT id, name, logo, url, displayLogo, active FROM tbl_partner;";

							// prepare the statement
							$statement = $pdo->prepare($sql);

							// execute SQL statement
							$resultSet = $pdo->query($sql);

						} // end of try block
						catch (PDOException $e) {

							// create error message
							echo "Error fetching partner data: " .$e->getMessage();
							exit();

						} // end catch block

						foreach ($resultSet as $row) {
							// store row data in variables
							$id = $row['id'];
							$name = $row['name'];
							$logo = $row['logo'];
							$url = $row['url'];
							$displayLogo = $row['displayLogo'];
							$active = $row['active'];
							?>

							<article class="col-12 col-md-6">

								<?php if ($logo == NULL){
								$noImage = "<img src='../images/no-image.png' style='width: 30%;'/>";
									echo $noImage;

									} else {
								?>
								<img style="width: 30%;" src="../<?php echo $logo; ?>">

								<?php
									}
								?>

								<form action="includes/partnerDisplayLogo/update.php" method="POST" enctype="multipart/form-data">
									<fieldset id="form<?php echo $id; ?>" disabled>
										<input type="hidden" name="id" value="<?php echo $id; ?>">

										<div class="form-group">
											<label>Logo:</label>
											<input class="form-control-file" name="imgUpload" type="file" onchange="document.getElementById('logoDisplay<?php echo $id; ?>').removeAttribute('disabled');">
											<p>Required Size: 168 x 168</p>
										</div>

										<div class="form-group">
											<label>Name:</label>
											<input maxlength="100" class="form-control" type="text" name="name" value="<?php echo $name; ?>" required>
										</div>

										<div class="form-group">
											<label>URL:</label>
											<input maxlength="100" class="form-control" type="text" name="url" value="<?php echo $url; ?>">
											<p>Include https:// or http:// and the full domain name</p>
										</div>

										<div>
											<label>Display Logo:</label>
											<input id="logoDisplay<?php echo $id; ?>" class="formButton" type="checkbox" name="displayLogo" <?php if ($displayLogo) echo "checked"; if ($logo == NULL) echo "disabled"; ?>><br>
										</div>

										<div>
											<label>Active:</label>
											<input class="formButton" type="checkbox" name="active" <?php if ($active) echo "checked"; ?>><br>
										</div>
									</fieldset>
									<input id="edit<?php echo $id; ?>" class="formButton" type="button" onclick='enableForm(<?php echo $id; ?>)' value="Edit"/>
									<input id="submit<?php echo $id; ?>" class="formSubmit formButton" name="partnerDisplayLogoUpdateSubmit" type="submit" value="Submit"/>
									<input id="cancel<?php echo $id; ?>" class="formCancel cancelButton" type="button" onclick='disableForm(<?php echo $id; ?>)' value="Cancel"/>
								</form>

								<form action="includes/partnerDisplayLogo/delete.php" id="deleteForm<?php echo $id; ?>" class="deleteForm" onsubmit="return checkDelete();" method="POST">
									<input type="hidden" name="id" value="<?php echo $id; ?>">
									<input type="submit" class="cancelButton" name="partnerDisplayLogoDeleteSubmit" value="Delete"/>
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
