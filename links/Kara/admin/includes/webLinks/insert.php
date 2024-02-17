<?php
// Statistic Insert
if (isset ($_POST['webLinkAddSubmit'])) {

	include "../connect.php";
	include "../adminFunctions.php";

	$url = cleanInput($_POST['url']);
	$description = cleanInput($_POST['description']);
	$active = isset($_POST['active']);

	try {	
		$sql = "INSERT INTO tbl_webLink (url, description, active) VALUES (:url, :description, :active);";

		$statement = $pdo->prepare($sql);

		$statement->bindValue(':url', $url);
		$statement->bindValue(':description', $description);
		$statement->bindValue(':active', $active);

		$statement->execute();

		header("Location: ../../webLinks.php");
	}
	catch(PDOException $e) {
		echo "Error adding Web Link: " . $e->getMessage();
		exit();
	}
}
?>