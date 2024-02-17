<?php
// Media Type Insert
if (isset ($_POST['mediaTypeAddSubmit'])) {

	include "../connect.php";
	include "../adminFunctions.php";

	$mediaType = cleanInput($_POST['mediaType']);
	$displayType = cleanInput($_POST['displayType']);
	$printOrder = cleanInput($_POST['printOrder']);
	$active = isset($_POST['active']);

	try {	
		$sql = "INSERT INTO tbl_mediaType (mediaType, displayType, printOrder, active) VALUES (:mediaType, :displayType, :printOrder, :active);";

		$statement = $pdo->prepare($sql);

		$statement->bindValue(':mediaType', $mediaType);
		$statement->bindValue(':displayType', $displayType);
		$statement->bindValue(':printOrder', $printOrder);
		$statement->bindValue(':active', $active);

		$statement->execute();

		header("Location: ../../mediaType.php");
	}
	catch(PDOException $e) {
		echo "Error adding Media Type: " . $e->getMessage();
		exit();
	}
}
?>