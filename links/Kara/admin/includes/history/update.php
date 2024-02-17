<?php
// History Update
if (isset ($_POST['historyUpdateSubmit'])) {

	include "../connect.php";
	include "../adminFunctions.php";

	$id = $_POST['id'];
	$year = cleanInput($_POST['year']);
	$event = cleanInput($_POST['event']);
	$active = isset($_POST['active']);

	try {	
		$sql = "UPDATE tbl_history SET year = :year, event = :event, active = :active WHERE id = :id;";

		$statement = $pdo->prepare($sql);

		$statement->bindValue(':id', $id);
		$statement->bindValue(':year', $year);
		$statement->bindValue(':event', $event);
		$statement->bindValue(':active', $active);

		$statement->execute();

		header("Location: ../../history.php");
	}
	catch(PDOException $e) {
		echo "Error updating history: " . $e->getMessage();
		exit();
	}
}
?>