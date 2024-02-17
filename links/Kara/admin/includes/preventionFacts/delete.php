<?php
// Client Story Delete
if (isset($_POST['preventionFactDeleteSubmit'])) {
	
	include "../connect.php";

	$id = $_POST['id'];
	
	try {
		$sql = "DELETE FROM tbl_beInformedFact WHERE id = :id;";

		$statement = $pdo->prepare($sql);
		$statement->bindValue(":id", $id);
		$statement->execute();
		header("Location: ../../preventionFacts.php");
	} catch (PDOException $e) {
		echo "Error deleting Prevention Fact: " . $e->getMessage();
		exit();
	}
}
?>