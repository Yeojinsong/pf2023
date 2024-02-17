<?php
// Family Violence Fact Update
if (isset ($_POST['userUpdateSubmit'])) {

	include "../connect.php";
	include "../adminFunctions.php";

	$email = $_POST['email'];
	$firstName = cleanInput($_POST['firstName']);
	$lastName = cleanInput($_POST['lastName']);
	$userRole = cleanInput($_POST['userRole']);
	$active = isset($_POST['active']);

	try {
		
		$sql = "UPDATE tbl_user SET firstName = :firstName, lastName = :lastName, userRole = :userRole, active = :active WHERE email = :email;";

			$statement = $pdo->prepare($sql);

			$statement->bindValue(':email', $email);
			$statement->bindValue(':firstName', $firstName);
			$statement->bindValue(':lastName', $lastName);
			$statement->bindValue(':userRole', $userRole);
			$statement->bindValue(':active', $active);

			$statement->execute();
			
		header("Location: ../../users.php");
	}
	catch(PDOException $e) {
		echo "Error updating User: " . $e->getMessage();
		exit();
	}
}
?>