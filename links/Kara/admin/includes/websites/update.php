<?php
// Statistic Update
if (isset ($_POST['website-update'])) {

	include "../connect.php";
	include "../adminFunctions.php";

	$id = $_POST['id'];
	$mediaType = $_POST['mediaType'];
	$heading = cleanInput($_POST['heading']);
	$url = cleanInput($_POST['url']);
	$active = isset($_POST['active']);


	try {
		$sql = "UPDATE tbl_media SET heading = :heading, mediaType = :mediaType, url = :url, active = :active WHERE id = :id;";

		$statement = $pdo->prepare($sql);

		$statement->bindValue(':mediaType', $mediaType);
		$statement->bindValue(':id', $id);
		$statement->bindValue(':heading', $heading);
		$statement->bindValue(':url', $url);
		$statement->bindValue(':active', $active);


		$statement->execute();

		header("Location: ../../links.php");
	}
	catch(PDOException $e) {
		echo "Error updating links: " . $e->getMessage();
		exit();
	}
}
?>
