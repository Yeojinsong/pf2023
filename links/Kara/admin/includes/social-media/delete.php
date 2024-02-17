<?php
// Slider Delete
if (isset($_POST['social-media-delete'])) {

	include "../connect.php";

	$id = $_POST['id'];
	$img = $_POST['img'];

	try {
		// unlink("../../" . $img);

		$sql = "DELETE FROM tbl_socialMedia WHERE id = :id;";

		$statement = $pdo->prepare($sql);
		$statement->bindValue(":id", $id);
		$statement->execute();
		header("Location: ../../social-media.php");
	} catch (PDOException $e) {
		echo "Error deleting social media item: " . $e->getMessage();
		exit();
	}
}
?>
