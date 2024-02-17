<?php
// Statistic Update
if (isset ($_POST['statisticUpdateSubmit'])) {

	include "../connect.php";
	include "../adminFunctions.php";

	$id = $_POST['id'];
	$heading = cleanInput($_POST['heading']);
	$body = cleanInput($_POST['body']);
	$activeHome = isset($_POST['activeHome']);
	$activeBeInformed = isset($_POST['activeBeInformed']);
	$activeAboutUs = isset($_POST['activeAboutUs']);

	try {	
		$sql = "UPDATE tbl_statistic SET heading = :heading, body = :body, activeHome = :activeHome, activeBeInformed = :activeBeInformed, activeAboutUs = :activeAboutUs WHERE id = :id;";

		$statement = $pdo->prepare($sql);

		$statement->bindValue(':id', $id);
		$statement->bindValue(':heading', $heading);
		$statement->bindValue(':body', $body);
		$statement->bindValue(':activeHome', $activeHome);
		$statement->bindValue(':activeBeInformed', $activeBeInformed);
		$statement->bindValue(':activeAboutUs', $activeAboutUs);

		$statement->execute();

		header("Location: ../../statistics.php");
	}
	catch(PDOException $e) {
		echo "Error updating Statistics: " . $e->getMessage();
		exit();
	}
}
?>