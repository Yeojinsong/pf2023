<?php
// Statistic Delete
if (isset($_POST['statisticDeleteSubmit'])) {
	
	include "../connect.php";

	$id = $_POST['id'];
	
	try {
		$sql = "DELETE FROM tbl_statistic WHERE id = :id;";

		$statement = $pdo->prepare($sql);
		$statement->bindValue(":id", $id);
		$statement->execute();
		header("Location: ../../statistics.php");
	} catch (PDOException $e) {
		echo "Error deleting Statistic: " . $e->getMessage();
		exit();
	}
}
?>