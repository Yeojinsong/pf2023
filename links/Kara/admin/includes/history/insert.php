<?php
// History Insert
if (isset ($_POST['historyAddSubmit'])) {
	
	include "../connect.php";
	include "../adminFunctions.php";
	
	$year = cleanInput($_POST['year']);
	$event = cleanInput($_POST['event']);
	$active = isset($_POST['active']);
	
	try {	
	
		$sql = "INSERT INTO tbl_history (year, event, active) VALUES (:year, :event, :active);";
		
		$statement = $pdo->prepare($sql);
		$statement->bindValue(':year', $year);
		$statement->bindValue(':event', $event);
		$statement->bindValue(':active', $active);
		
		$statement->execute();
		
		header("Location: ../../history.php");
	}
	catch(PDOException $e) {
		echo "Error adding history: " . $e->getMessage();
		exit();
	}
}
?>