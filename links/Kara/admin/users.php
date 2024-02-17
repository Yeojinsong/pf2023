<?php if(session_id() == '') session_start();
/*
Filename: users.php
Author: Harris salehi
Date Created: 12/09/2018
Date Last updated: 13/10/18
Last Updated By: Dahmon Bicheno
Description: Table for the roles of the users
Version Number: 0.3
*/

// set the page title
$pageTitle = "Users";

// import the head section
include "includes/adminHead.php";

if (isset($_SESSION['login']) && $_SESSION['login'] == "valid") {
	if(isset($_SESSION['userRole']) && $_SESSION['userRole'] == "Admin") {
?>
<body>
	<div class="container-fluid cmsContainer">
		<?php include "includes/cmsSidebar.php"; ?>

		<div class="cmsContent offset-2 col-md-10">
			<div class="row">
				<div class="col-12">
					<a href="#/" class="accordionButton" onclick="toggleAccordion('newUser')">
						<div class="accordionHeading">
							<h3>New</h3>
							<img class="accordionArrow" src="../images/arrow.png" alt="arrow">
						</div>
					</a>

					<div class="accordionContent newUser">
						<form action="includes/users/insert.php" method="post" onsubmit="return checkAddCustomer(this);">
							<fieldset>
								<div class="form-group">
									<label>Email Address:</label>
									<input maxlength="50" class="form-control" type="text" name="email" required>
								</div>
								<div class="form-group">
									<label>First Name:</label>
									<input maxlength="50" class="form-control" type="text" name="firstName" required>
								</div>
								<div class="form-group">
									<label>Last Name:</label>
									<input maxlength="50" class="form-control" type="text" name="lastName" required>
								</div>
								<div class="form-group">
									<label for="exampleFormControlSelect1">User Role:</label>
									<select class="form-control" name="userRole" size="1">
										<?php
										getUserRole();
										?>
									</select>
								</div>
								<input type="submit" class="formButton" name="addUserSubmit" value="Add"/>
							</fieldset>
						</form>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<a href="#/" class="accordionButton" onclick="toggleAccordion('updateUser')">
						<div class="accordionHeading">
							<h3>Update</h3>
							<img class="accordionArrowOpen" src="../images/arrow.png" alt="arrow">
						</div>
					</a>

					<div class="accordionContentOpen updateUser row">
						<?php
						try {
							// write statement to get data from tbl_partner table
							$sql = "SELECT email, firstName, lastName, userRole, active FROM tbl_user;";

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

						$i = 1;
						foreach ($resultSet as $row) {
							// store row data in variables
							$email = $row['email'];
							$firstName = $row['firstName'];
							$lastName = $row['lastName'];
							$userRole = $row['userRole'];
							$active = $row['active'];
							?>

							<article class="col-12 col-md-6 col-lg-4">
								<form action="includes/users/update.php" method="POST">
									<fieldset id="form<?php echo $i; ?>" disabled>
										<input type="hidden" name="email" value="<?php echo $email; ?>">

										<div class="form-group">
											<label>Email Address:</label>
											<p><?php echo $email; ?></p>
										</div>

										<div class="form-group">
											<label>First Name:</label>
											<input maxlength="50" class="form-control" type="text" name="firstName" value="<?php echo $firstName; ?>" required>
										</div>

										<div class="form-group">
											<label>Last Name:</label>
											<input maxlength="50" class="form-control" type="text" name="lastName" value="<?php echo $lastName; ?>" required>
										</div>

										<div class="form-group">
											<label for="exampleFormControlSelect1">User Role:</label>
											<select class="form-control" name="userRole" size="1">
												<?php
												getUserRoleWithSelection($userRole);
												?>
											</select>
										</div>

										<div>
											<label>Active:</label>
											<input class="formButton" type="checkbox" name="active" <?php if ($active) echo "checked"; ?>><br>
										</div>
									</fieldset>
									<input id="edit<?php echo $i; ?>" class="formButton" type="button" onclick='enableForm(<?php echo $i; ?>)' value="Edit"/>
									<input id="submit<?php echo $i; ?>" class="formSubmit formButton" name="userUpdateSubmit" type="submit" value="Submit"/>
									<input id="cancel<?php echo $i; ?>" class="formCancel cancelButton" type="button" onclick='disableForm(<?php echo $i; ?>)' value="Cancel"/>
								</form>

								<form action="includes/users/delete.php" id="deleteForm<?php echo $i; ?>" class="deleteForm" onsubmit="return checkDelete();" method="POST">
									<input type="hidden" name="email" value="<?php echo $email; ?>">
									<input type="submit" class="cancelButton" name="userDeleteSubmit" value="Delete"/>
								</form>
								<hr><br>
							</article>

							<?php
							$i++;
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<?php
	include "includes/adminJsLinks.php";
	} else {
		echo "You must be an Admin to visit this page.";
	}
} else {
	header("Location: index.php");
}
?>
</html>
