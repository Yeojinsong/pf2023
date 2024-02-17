<?php
// Donation Fact Update
if (isset ($_POST['donationFactUpdateSubmit'])) {

	include "../connect.php";
	include "../adminFunctions.php";

	$id = $_POST['id'];
	$heading = cleanInput($_POST['heading']);
	$fact = $_POST['fact'];
	$active = isset($_POST['active']);

	try {
		
		$sql = "UPDATE tbl_getInvolvedFact SET heading = :heading, fact = :fact, active = :active WHERE id = :id;";
		$statement = $pdo->prepare($sql);

		$statement->bindValue(':id', $id);
		$statement->bindValue(':heading', $heading);
		$statement->bindValue(':fact', $fact);
		$statement->bindValue(':active', $active);

		$statement->execute();

		header("Location: ../../donationFacts.php");
	}
	catch(PDOException $e) {
		echo "Error updating Donation Fact: " . $e->getMessage();
		exit();
	}
}
?>