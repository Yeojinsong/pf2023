<?php
// Donation Fact Delete
if (isset($_POST['donationFactDeleteSubmit'])) {
	
	include "../connect.php";

	$id = $_POST['id'];
	
	try {
		$sql = "DELETE FROM tbl_getInvolvedFact WHERE id = :id;";

		$statement = $pdo->prepare($sql);
		$statement->bindValue(":id", $id);
		$statement->execute();
		header("Location: ../../donationFacts.php");
	} catch (PDOException $e) {
		echo "Error deleting Donation Fact: " . $e->getMessage();
		exit();
	}
}
?>