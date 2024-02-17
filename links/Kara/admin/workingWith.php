<?php if(session_id() == '') session_start();
/*
Filename: workingWith.php
Author: Yeojin Song
Date Created: 13/11/2018
Date Last updated:
Last Updated By: Yeojin Song
Description: working with adding and removing
Version Number: 1
*/

// CHANGE PAGE TITLE
$pageTitle = "Working With Partners";

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
					<a href="#/" class="accordionButton" onclick="toggleAccordion('newworkingWith')">
						<div class="accordionHeading">
							<h3>New</h3>
							<img class="accordionArrow" src="../images/arrow.png" alt="arrow">
						</div>
					</a>

					<div class="accordionContent newworkingWith">
						<form action="includes/workingWith/insert.php" method="POST" enctype="multipart/form-data">
								<fieldset>
									<div class="form-group">
										<label>Image:</label>
										<input class="form-control-file" name="imgUpload" type="file">
										<p>Required Size: 268 x 85<br>
										(Level 1,2 require logo image file.)</p>
									</div>

									<div class="form-group">
										<label>Name:</label>
										<input maxlength="100" class="form-control" type="text" name="name" required>
									</div>

									<div class="form-group">
										<label>Level:</label>
										<select name="level" value="1" required>
										  <option value="1">1</option>
										  <option value="2">2</option>
										  <option value="3">3</option>
										</select>
									</div>


									<label>Summary:</label>
									<textarea id="newworkingWith" name="summary"></textarea>
									<script>
										CKEDITOR.replace("newworkingWith");
									</script>

									<div class="form-group">
										<label>URL:</label>
										<input maxlength="100" class="form-control" type="text" name="url" required>
										<p>Include https:// or http:// and the full domain name</p>
									</div>
									<input class="formButton" name="AddSubmit" type="submit" value="Add"/>
								</fieldset>
							</form>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<a href="#/" class="accordionButton" onclick="toggleAccordion('updateworkingWith')">
						<div class="accordionHeading">
							<h3>Update</h3>
							<img class="accordionArrowOpen" src="../images/arrow.png" alt="arrow">
						</div>
					</a>

					<div class="accordionContentOpen updateworkingWith row">

						<?php
						try {
							// write statement to get data from tbl_workingWith table
							$sql = "SELECT * FROM tbl_workingWith;";

							// prepare the statement
							$statement = $pdo->prepare($sql);

							// execute SQL statement
							$resultSet = $pdo->query($sql);

						} // end of try block
						catch (PDOException $e) {

							// create error message
							echo "Error fetching workingWith data: " .$e->getMessage();
							exit();

						} // end catch block

						foreach ($resultSet as $row) {
							// store row data in variables
							$id = $row['id'];
							$name = $row['name'];
							$level = $row['level'];
							$logo = $row['logo'];
							$summary = $row['summary'];
							$url = $row['url'];
							$active = $row['active'];
							?>

							<article class="col-12 col-md-6">
								<?php if ($logo == NULL){
									$noImage = "<img src='../images/no-image.png' style='width: 30%;'/>";
									echo $noImage;
									} else {
								?>
								<img class="img-fluid" src="../<?php echo $logo; ?>">

								<?php
									}
								?>


								<form action="includes/workingWith/update.php" method="POST" enctype="multipart/form-data">
									<fieldset id="form<?php echo $id; ?>" disabled>
										<input type="hidden" name="id" value="<?php echo $id; ?>">
										<div class="form-group">
											<label>New Image:</label>
											<input class="form-control-file" name="imgUpload" type="file">
											<p>Required Size: 268 x 85</p>
										</div>

										<div class="form-group">
											<label>Name:</label>
											<input maxlength="100" class="form-control" type="text" name="name" value="<?php echo $name; ?>" required>
										</div>

										<div class="form-group">
											<label>Level:</label>
											<select name="level" required>
												<option  value="<?php echo $level;?>"><?php echo $level;?></option>
												<?php
												if($level==1){
												?>
												<option  value="2">2</option>
												<option  value="3">3</option>
												<?php
												}else if($level==2){
												?>
												<option  value="1">1</option>
												<option  value="3">3</option>
												<?php
												}else if($level==3){
												?>
												<option  value="1">1</option>
												<option  value="2">2</option>
												<?php
												}
											  ?>
											</select>
										</div>


										<label>Summary:</label>
										<textarea id="workingWith<?php echo $id; ?>" name="summary">
											<?php echo $summary; ?>
										</textarea>
										<script>
											CKEDITOR.replace("workingWith<?php echo $id; ?>");
										</script>

										<div class="form-group">
											<label>URL:</label>
											<input maxlength="100" class="form-control" type="text" name="url" value="<?php echo $url; ?>" required>
											<p>Include https:// or http:// and the full domain name</p>
										</div>

										<div>
											<label>Active:</label>
											<input class="formButton" type="checkbox" name="active" <?php if ($active) echo "checked"; ?>><br>
										</div>
									</fieldset>
									<input id="edit<?php echo $id; ?>" class="formButton" type="button" onclick='enableForm(<?php echo $id; ?>)' value="Edit"/>
									<input id="submit<?php echo $id; ?>" class="formSubmit formButton" name="workingWithUpdateSubmit" type="submit" value="Submit"/>
									<input id="cancel<?php echo $id; ?>" class="formCancel cancelButton" type="button" onclick='disableForm(<?php echo $id; ?>)' value="Cancel"/>
								</form>

								<form action="includes/workingWith/delete.php" id="deleteForm<?php echo $id; ?>" class="deleteForm" onsubmit="return checkDelete();" method="POST">
									<input type="hidden" name="id" value="<?php echo $id; ?>">
									<input type="submit" class="cancelButton" name="workingWithDeleteSubmit" value="Delete"/>
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
