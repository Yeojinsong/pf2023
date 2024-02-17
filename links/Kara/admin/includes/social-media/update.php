<?php
// Slider Update
if (isset ($_POST['social-media-update'])) {

	include "../connect.php";
	include "../adminFunctions.php";

	$id = $_POST['id'];
	$name = cleanInput($_POST['name']);
	$url = cleanInput($_POST['url']);
	$active = isset($_POST['active']);

	try {
		$sql = "UPDATE tbl_socialMedia SET name = :name, url = :url, active = :active WHERE id = :id;";

		$statement = $pdo->prepare($sql);

		$statement->bindValue(':id', $id);
		$statement->bindValue(':name', $name);
		$statement->bindValue(':url', $url);
		$statement->bindValue(':active', $active);

		$statement->execute();

		header("Location: ../../social-media.php");
	}
	catch(PDOException $e) {
		echo "Error updating socialm media item: " . $e->getMessage();
		exit();
	}
}
?>
