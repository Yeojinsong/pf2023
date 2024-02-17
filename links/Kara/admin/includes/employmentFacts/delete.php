<?php
// Employment Fact Delete
if (isset($_POST['employmentFactDeleteSubmit'])) {
	
	include "../connect.php";

	$id = $_POST['id'];
	
	try {
		$sql = "DELETE FROM tbl_getInvolvedFact WHERE id = :id;";

		$statement = $pdo->prepare($sql);
		$statement->bindValue(":id", $id);
		$statement->execute();
		header("Location: ../../employmentFacts.php");
	} catch (PDOException $e) {
		echo "Error deleting Employment Fact: " . $e->getMessage();
		exit();
	}
}
?>