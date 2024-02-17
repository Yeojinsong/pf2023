<?php
// Slider Delete
if (isset($_POST['donationImageDeleteSubmit'])) {
	
	include "../connect.php";

	$id = $_POST['id'];
	
	try {
		$sql = "DELETE FROM tbl_donationImage WHERE id = :id;";

		$statement = $pdo->prepare($sql);
		$statement->bindValue(":id", $id);
		$statement->execute();
		header("Location: ../../donationImage.php");
	} catch (PDOException $e) {
		echo "Error deleting donation image item: " . $e->getMessage();
		exit();
	}
}
?>