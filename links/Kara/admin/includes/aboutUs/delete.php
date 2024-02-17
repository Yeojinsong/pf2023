<?php
// History Delete
if (isset($_POST['aboutUsDeleteSubmit'])) {
	
	include "../connect.php";

	$id = $_POST['id'];
	
	try {

		$sql = "DELETE FROM tbl_aboutUs WHERE id = :id;";

		$statement = $pdo->prepare($sql);
		$statement->bindValue(":id", $id);
		$statement->execute();
		
		header("Location: ../../aboutUs.php");
		
	} catch (PDOException $e) {
		echo "Error deleting about us item: " . $e->getMessage();
		exit();
	}
}
?>