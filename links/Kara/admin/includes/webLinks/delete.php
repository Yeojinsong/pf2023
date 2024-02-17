<?php
// Web Link Delete
if (isset($_POST['webLinkDeleteSubmit'])) {
	
	include "../connect.php";

	$id = $_POST['id'];
	
	try {
		$sql = "DELETE FROM tbl_webLink WHERE id = :id;";

		$statement = $pdo->prepare($sql);
		$statement->bindValue(":id", $id);
		$statement->execute();
		header("Location: ../../webLinks.php");
	} catch (PDOException $e) {
		echo "Error deleting Web Link: " . $e->getMessage();
		exit();
	}
}
?>