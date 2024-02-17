<?php
// Client Story Delete
if (isset($_POST['seekHelpFactsDeleteSubmit'])) {
	
	include "../connect.php";

	$id = $_POST['id'];
	
	try {
		$sql = "DELETE FROM tbl_seekHelpFact WHERE id = :id;";

		$statement = $pdo->prepare($sql);
		$statement->bindValue(":id", $id);
		$statement->execute();
		header("Location: ../../seekHelpFacts.php");
	} catch (PDOException $e) {
		echo "Error deleting SeekHelpfacts: " . $e->getMessage();
		exit();
	}
}
?>