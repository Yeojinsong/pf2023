<?php
// Slider Delete
if (isset($_POST['partnerDisplayLogoDeleteSubmit'])) {
	
	include "../connect.php";

	$id = $_POST['id'];
	
	try {
		$sql = "DELETE FROM tbl_partner WHERE id = :id;";

		$statement = $pdo->prepare($sql);
		$statement->bindValue(":id", $id);
		$statement->execute();
		header("Location: ../../partnerDisplayLogo.php");
	} catch (PDOException $e) {
		echo "Error deleting partner item: " . $e->getMessage();
		exit();
	}
}
?>