<?php
// aboutUs Insert
if (isset ($_POST['aboutUsAddSubmit'])) {
	
	include "../connect.php";
	include "../adminFunctions.php";
	
	$content = $_POST['content'];
	$active = isset($_POST['active']);
	
	try {	
	
		$sql = "INSERT INTO tbl_aboutUs (content, active) VALUES (:content, :active);";
		
		$statement = $pdo->prepare($sql);
		$statement->bindValue(':content', $content);
		$statement->bindValue(':active', $active);
		
		$statement->execute();
		
		header("Location: ../../aboutUs.php");
	}
	catch(PDOException $e) {
		echo "Error adding about us: " . $e->getMessage();
		exit();
	}
}
?>