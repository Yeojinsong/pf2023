<?php
// Statistic Insert
if (isset ($_POST['preventionFactAddSubmit'])) {

	include "../connect.php";
	include "../adminFunctions.php";

	$heading = cleanInput($_POST['heading']);
	$fact = $_POST['fact'];
	$active = isset($_POST['active']);

	try {	
		$sql = "INSERT INTO tbl_beInformedFact (heading, fact, factType, active) VALUES (:heading, :fact, 2, :active);";

		$statement = $pdo->prepare($sql);

		$statement->bindValue(':heading', $heading);
		$statement->bindValue(':fact', $fact);
		$statement->bindValue(':active', $active);

		$statement->execute();

		header("Location: ../../preventionFacts.php");
	}
	catch(PDOException $e) {
		echo "Error adding Prevention Fact: " . $e->getMessage();
		exit();
	}
}
?>