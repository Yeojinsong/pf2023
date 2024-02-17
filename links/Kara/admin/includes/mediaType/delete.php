<?php
// Media Type Delete
if (isset($_POST['mediaTypeDeleteSubmit'])) {
	
	include "../connect.php";

	$mediaType = $_POST['mediaType'];
	
	try {
		$sql = "DELETE FROM tbl_mediaType WHERE mediaType = :mediaType;";

		$statement = $pdo->prepare($sql);
		$statement->bindValue(":mediaType", $mediaType);
		$statement->execute();
		header("Location: ../../mediaType.php");
	} catch (PDOException $e) {
		echo "Error deleting Media Type: " . $e->getMessage();
		exit();
	}
}
?>