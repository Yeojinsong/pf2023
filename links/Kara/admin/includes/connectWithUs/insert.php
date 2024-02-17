<?php
// Connect With Us Insert
if (isset ($_POST['connectWithUsAddSubmit'])) {

	include "../connect.php";
	include "../adminFunctions.php";

	$content = $_POST['content'];
	$active = isset($_POST['active']);


	try {	
		$sql = "INSERT INTO tbl_connectWithUs (content, active) VALUES (:content, :active);";

		$statement = $pdo->prepare($sql);

		$statement->bindValue(':content', $content);
		$statement->bindValue(':active', $active);

		$statement->execute();

		header("Location: ../../connectWithUs.php");
	}
	catch(PDOException $e) {
		echo "Error adding Connect With Us: " . $e->getMessage();
		exit();
	}
}
?>