<?php
// Media Type Update
if (isset ($_POST['mediaTypeUpdateSubmit'])) {

	include "../connect.php";
	include "../adminFunctions.php";

	$mediaType = $_POST['mediaType'];
	$printOrder = $_POST['printOrder'];
	$active = isset($_POST['active']);

	try {	
		$sql = "UPDATE tbl_mediaType SET printOrder = :printOrder, active = :active WHERE mediaType = :mediaType;";

		$statement = $pdo->prepare($sql);

		$statement->bindValue(':mediaType', $mediaType);
		$statement->bindValue(':printOrder', $printOrder);
		$statement->bindValue(':active', $active);

		$statement->execute();

		header("Location: ../../mediaType.php");
	}
	catch(PDOException $e) {
		echo "Error updating Media Type: " . $e->getMessage();
		exit();
	}
}
?>