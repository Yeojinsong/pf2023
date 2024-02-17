<?php
// Web Links Update
if (isset ($_POST['webLinkUpdateSubmit'])) {

	include "../connect.php";
	include "../adminFunctions.php";

	$id = $_POST['id'];
	$url = cleanInput($_POST['url']);
	$description = cleanInput($_POST['description']);
	$active = isset($_POST['active']);

	try {
		
		$sql = "UPDATE tbl_webLink SET url = :url, description = :description, active = :active WHERE id = :id;";
		$statement = $pdo->prepare($sql);

		$statement->bindValue(':id', $id);
		$statement->bindValue(':url', $url);
		$statement->bindValue(':description', $description);
		$statement->bindValue(':active', $active);

		$statement->execute();

		header("Location: ../../webLinks.php");
	}
	catch(PDOException $e) {
		echo "Error updating Web Links: " . $e->getMessage();
		exit();
	}
}
?>