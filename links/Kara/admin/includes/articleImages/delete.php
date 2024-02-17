<?php
// Slider Delete
if (isset($_POST['image-Delete-Submit'])) {

	include "../connect.php";

	$id = $_POST['id'];

	try {
		$sql = "DELETE FROM tbl_mediaImage WHERE id = :id;";

		$statement = $pdo->prepare($sql);
		$statement->bindValue(":id", $id);
		$statement->execute();
		header("Location: ../../articleImages.php");
	} catch (PDOException $e) {
		echo "Error deleting carousel item: " . $e->getMessage();
		exit();
	}
}
?>
