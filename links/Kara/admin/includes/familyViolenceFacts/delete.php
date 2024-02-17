<?php
// Client Story Delete
if (isset($_POST['violenceFactDeleteSubmit'])) {
	
	include "../connect.php";

	$id = $_POST['id'];
	
	try {
		$sql = "DELETE FROM tbl_beInformedFact WHERE id = :id;";

		$statement = $pdo->prepare($sql);
		$statement->bindValue(":id", $id);
		$statement->execute();
		header("Location: ../../familyViolenceFacts.php");
	} catch (PDOException $e) {
		echo "Error deleting Family Violence Fact: " . $e->getMessage();
		exit();
	}
}
?>