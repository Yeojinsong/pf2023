<?php
// Statistic Insert
if (isset ($_POST['statisticAddSubmit'])) {

	include "../connect.php";
	include "../adminFunctions.php";

	$heading = cleanInput($_POST['heading']);
	$body = cleanInput($_POST['body']);
	$activeHome = isset($_POST['activeHome']);
	$activeBeInformed = isset($_POST['activeBeInformed']);
	$activeAboutUs = isset($_POST['activeAboutUs']);

	try {	
		$sql = "INSERT INTO tbl_statistic (heading, body, activeHome, activeBeInformed, activeAboutUs) VALUES (:heading, :body, :activeHome, :activeBeInformed, :activeAboutUs);";

		$statement = $pdo->prepare($sql);

		$statement->bindValue(':heading', $heading);
		$statement->bindValue(':body', $body);
		$statement->bindValue(':activeHome', $activeHome);
		$statement->bindValue(':activeBeInformed', $activeBeInformed);
		$statement->bindValue(':activeAboutUs', $activeAboutUs);

		$statement->execute();

		header("Location: ../../statistics.php");
	}
	catch(PDOException $e) {
		echo "Error adding Statistics: " . $e->getMessage();
		exit();
	}
}
?>