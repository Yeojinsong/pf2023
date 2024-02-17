<?php
// Client Story Delete
if (isset($_POST['heroDeleteSubmit'])) {
	
	include "../connect.php";

	$id = $_POST['id'];
	
	try {
		$sql = "DELETE FROM tbl_heroImage WHERE id = :id;";

		$statement = $pdo->prepare($sql);
		$statement->bindValue(":id", $id);
		$statement->execute();
		header("Location: ../../hero.php");
	} catch (PDOException $e) {
		echo "Error deleting Hero Image: " . $e->getMessage();
		exit();
	}
}
?>