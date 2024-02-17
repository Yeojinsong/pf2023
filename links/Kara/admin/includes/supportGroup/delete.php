<?php
// Client Story Delete
if (isset($_POST['supportGroupDeleteSubmit'])) {
	
	include "../connect.php";

	$id = $_POST['id'];
	
	try {
		$sql = "DELETE FROM tbl_supportGroup WHERE id = :id;";

		$statement = $pdo->prepare($sql);
		$statement->bindValue(":id", $id);
		$statement->execute();
		header("Location: ../../supportGroup.php");
	} catch (PDOException $e) {
		echo "Error deleting support Group: " . $e->getMessage();
		exit();
	}
}
?>