<?php
// Client Story Insert
include "../adminFunctions.php";
include "../connect.php";

// Check if image file is a actual image or fake image
if(isset($_POST["supportGroupAddSubmit"])) {
	
		$start = cleanInput($_POST['start']);
		$time = cleanInput($_POST['time']);
		$location = cleanInput($_POST['location']);
		$children = cleanInput($_POST['children']);
		$refreshments = cleanInput($_POST['refreshments']);
		$transport = cleanInput($_POST['transport']);
		$active = isset($_POST['active']);

		try {
			$sql = "INSERT INTO tbl_supportGroup (start, time, location, children, refreshments, transport, active) VALUES (:start, :time, :location, :children, :refreshments, :transport, :active);";

			$statement = $pdo->prepare($sql);

			$statement->bindValue(':start', $start);
			$statement->bindValue(':time', $time);
			$statement->bindValue(':location', $location);
			$statement->bindValue(':children', $children);
			$statement->bindValue(':refreshments', $refreshments);
			$statement->bindValue(':transport', $transport);
			$statement->bindValue(':active', $active);

			$statement->execute();
		}
		catch(PDOException $e) {
			echo "Error adding support Group: " . $e->getMessage();
			exit();
		}
		header("Location: ../../supportGroup.php");
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

?>