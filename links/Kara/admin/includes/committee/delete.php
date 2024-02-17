<?php
// History Delete
if (isset($_POST['committeeDeleteSubmit'])) {
	
	include "../connect.php";

	$id = $_POST['id'];
	
	try {
		$sql = "DELETE FROM tbl_committee WHERE id = :id;";

		$statement = $pdo->prepare($sql);
		$statement->bindValue(":id", $id);
		$statement->execute();
		header("Location: ../../committee.php");
	} catch (PDOException $e) {
		echo "Error deleting committee item: " . $e->getMessage();
		exit();
	}
}
?>