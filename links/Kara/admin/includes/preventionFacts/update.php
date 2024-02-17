<?php
// Family Violence Fact Update
if (isset ($_POST['preventionFactUpdateSubmit'])) {

	include "../connect.php";
	include "../adminFunctions.php";

	$id = $_POST['id'];
	$heading = cleanInput($_POST['heading']);
	$fact = $_POST['fact'];
	$active = isset($_POST['active']);

	try {
		
		$sql = "UPDATE tbl_beInformedFact SET heading = :heading, fact = :fact, active = :active WHERE id = :id;";
		$statement = $pdo->prepare($sql);

		$statement->bindValue(':id', $id);
		$statement->bindValue(':heading', $heading);
		$statement->bindValue(':fact', $fact);
		$statement->bindValue(':active', $active);

		$statement->execute();

		header("Location: ../../preventionFacts.php");
	}
	catch(PDOException $e) {
		echo "Error updating Prevention Fact: " . $e->getMessage();
		exit();
	}
}
?>