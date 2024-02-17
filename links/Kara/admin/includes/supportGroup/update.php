<?php
// Family Violence Fact Update
if (isset ($_POST['supportGroupUpdateSubmit'])) {

	include "../connect.php";
	include "../adminFunctions.php";

	$id = $_POST['id'];
	$start = cleanInput($_POST['start']);
	$time = cleanInput($_POST['time']);
	$location = cleanInput($_POST['location']);
	$children = cleanInput($_POST['children']);
	$refreshments = cleanInput($_POST['refreshments']);
	$transport = cleanInput($_POST['transport']);
	$active = isset($_POST['active']);

	try {
		
		$sql = "UPDATE tbl_supportGroup SET start = :start, time = :time, location = :location, children = :children, refreshments = :refreshments, transport = :transport, active = :active WHERE id = :id;";

			$statement = $pdo->prepare($sql);

			$statement->bindValue(':id', $id);
			$statement->bindValue(':start', $start);
			$statement->bindValue(':time', $time);
			$statement->bindValue(':location', $location);
			$statement->bindValue(':children', $children);
			$statement->bindValue(':refreshments', $refreshments);
			$statement->bindValue(':transport', $transport);
			$statement->bindValue(':active', $active);

			$statement->execute();
			
		header("Location: ../../supportGroup.php");
	}
	catch(PDOException $e) {
		echo "Error updating supportGroup: " . $e->getMessage();
		exit();
	}
}
?>