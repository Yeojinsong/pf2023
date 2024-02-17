<?php
// Slider Delete
if (isset($_POST['sliderDeleteSubmit'])) {
	
	include "../connect.php";

	$id = $_POST['id'];
	
	try {
		$sql = "DELETE FROM tbl_slider WHERE id = :id;";

		$statement = $pdo->prepare($sql);
		$statement->bindValue(":id", $id);
		$statement->execute();
		header("Location: ../../carousel.php");
	} catch (PDOException $e) {
		echo "Error deleting carousel item: " . $e->getMessage();
		exit();
	}
}
?>