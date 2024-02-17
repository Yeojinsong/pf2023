<?php
// Slider Delete
if (isset($_POST['news-report-delete'])) {

	include "../connect.php";

	$id = $_POST['id'];

	try {
		$sql = "DELETE FROM tbl_media WHERE id = :id;";

		$statement = $pdo->prepare($sql);
		$statement->bindValue(":id", $id);
		$statement->execute();
		header("Location: ../../news-report.php");
	} catch (PDOException $e) {
		echo "Error deleting file from database: " . $e->getMessage();
		exit();
	}
}
?>
