<?php
// Statistic Insert
if (isset ($_POST['websubmit'])) {

	include "../connect.php";
	include "../adminFunctions.php";
	
	$mediaType = $_POST['mediaType'];
	$heading = cleanInput($_POST['heading']);
	$url = cleanInput($_POST['url']);
	$active = isset($_POST['active']);


	try {
		$sql = "INSERT INTO tbl_media (mediaType, heading, url, dateCreated, active ) VALUES (:mediaType, :heading, :url, :dateCreated, :active);";

		$statement = $pdo->prepare($sql);

		$statement->bindValue(':mediaType', $mediaType);
		$statement->bindValue(':heading', $heading);
		$statement->bindValue(':url', $url);
		$statement->bindValue(':dateCreated', date('Y-m-d'));
		$statement->bindValue(':active', $active);

		$statement->execute();

		header("Location: ../../links.php");
	}
	catch(PDOException $e) {
		echo "Error adding links: " . $e->getMessage();
		exit();
	}
}
?>
