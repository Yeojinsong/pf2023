<?php
// Committee Update
if (isset ($_POST['committeeUpdateSubmit'])) {

	include "../connect.php";
	include "../adminFunctions.php";

	$id = $_POST['id'];
	$firstName = cleanInput($_POST['firstName']);
	$lastName = cleanInput($_POST['lastName']);
	$committeePosition = cleanInput($_POST['committeePosition']);
	$role = cleanInput($_POST['role']);
	$active = isset($_POST['active']);

	try {	
		$sql = "UPDATE tbl_committee SET firstName = :firstName, lastName = :lastName, committeePosition = :committeePosition, role = :role, active = :active WHERE id = :id;";

		$statement = $pdo->prepare($sql);

		$statement->bindValue(':id', $id);
		$statement->bindValue(':firstName', $firstName);
		$statement->bindValue(':lastName', $lastName);
		$statement->bindValue(':committeePosition', $committeePosition);
		$statement->bindValue(':role', $role);
		$statement->bindValue(':active', $active);

		$statement->execute();

		header("Location: ../../committee.php");
	}
	catch(PDOException $e) {
		echo "Error updating committee: " . $e->getMessage();
		exit();
	}
}
?>