<?php
// Client Story Delete
if (isset($_POST['workingWithDeleteSubmit'])) {
	
	include "../connect.php";

	$id = $_POST['id'];
	
	try {
		$sql = "DELETE FROM tbl_workingWith WHERE id = :id;";

		$statement = $pdo->prepare($sql);
		$statement->bindValue(":id", $id);
		$statement->execute();
		header("Location: ../../workingWith.php");
	} catch (PDOException $e) {
		echo "Error deleting workingWith: " . $e->getMessage();
		exit();
	}
}
?>