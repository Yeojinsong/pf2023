<?php
// Client Story Delete
if (isset($_POST['supportGroupFAQDeleteSubmit'])) {
	
	include "../connect.php";

	$id = $_POST['id'];
	
	try {
		$sql = "DELETE FROM tbl_supportGroupFAQ WHERE id = :id;";

		$statement = $pdo->prepare($sql);
		$statement->bindValue(":id", $id);
		$statement->execute();
		header("Location: ../../supportGroupFAQ.php");
	} catch (PDOException $e) {
		echo "Error deleting support Group FAQ: " . $e->getMessage();
		exit();
	}
}
?>