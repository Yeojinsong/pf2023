<?php
// Connect With Us Delete
if (isset($_POST['connectWithUsDeleteSubmit'])) {
	
	include "../connect.php";

	$id = $_POST['id'];
	
	try {
		$sql = "DELETE FROM tbl_connectWithUs WHERE id = :id;";

		$statement = $pdo->prepare($sql);
		$statement->bindValue(":id", $id);
		$statement->execute();
		header("Location: ../../connectWithUs.php");
	} catch (PDOException $e) {
		echo "Error deleting Connect With Us: " . $e->getMessage();
		exit();
	}
}
?>