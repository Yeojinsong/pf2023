<?php
// Committee Insert
if (isset ($_POST['committeeAddSubmit'])) {
	
	include "../connect.php";
	include "../adminFunctions.php";
	
	$firstName = cleanInput($_POST['firstName']);
	$lastName = cleanInput($_POST['lastName']);
	$committeePosition = $_POST['committeePosition'];
	$role = cleanInput($_POST['role']);
	$active = isset($_POST['active']);
	
	try {	
	
		$sql = "INSERT INTO tbl_committee (firstName, lastName, committeePosition, role, active) VALUES (:firstName, :lastName, :committeePosition, :role, :active);";
		
		$statement = $pdo->prepare($sql);
		
		$statement->bindValue(':firstName', $firstName);
		$statement->bindValue(':lastName', $lastName);
		$statement->bindValue(':committeePosition', $committeePosition);
		$statement->bindValue(':role', $role);
		$statement->bindValue(':active', $active);
		
		$statement->execute();
		
		header("Location: ../../committee.php");
	}
	catch(PDOException $e) {
		echo "Error adding committee: " . $e->getMessage();
		exit();
	}
}
?>