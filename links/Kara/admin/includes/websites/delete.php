<?php
// Statistic Delete
if (isset($_POST['website-delete'])) {

	include "../connect.php";

	$id = $_POST['id'];

	try {
		$sql = "DELETE FROM tbl_media WHERE id = :id;";

		$statement = $pdo->prepare($sql);
		$statement->bindValue(":id", $id);
		$statement->execute();
		header("Location: ../../links.php");
	} catch (PDOException $e) {
		echo "Error deleting link: " . $e->getMessage();
		exit();
	}
}
?>
