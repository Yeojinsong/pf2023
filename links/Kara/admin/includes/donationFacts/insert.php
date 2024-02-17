<?php
// Donation Fact Insert
if (isset ($_POST['donationFactAddSubmit'])) {

	include "../connect.php";
	include "../adminFunctions.php";

	$heading = cleanInput($_POST['heading']);
	$fact = $_POST['fact'];
	$active = isset($_POST['active']);

	try {	
		$sql = "INSERT INTO tbl_getInvolvedFact (heading, fact, factType, active) VALUES (:heading, :fact, 1, :active);";

		$statement = $pdo->prepare($sql);

		$statement->bindValue(':heading', $heading);
		$statement->bindValue(':fact', $fact);
		$statement->bindValue(':active', $active);

		$statement->execute();

		header("Location: ../../donationFacts.php");
	}
	catch(PDOException $e) {
		echo "Error adding Donation Fact: " . $e->getMessage();
		exit();
	}
}
?>