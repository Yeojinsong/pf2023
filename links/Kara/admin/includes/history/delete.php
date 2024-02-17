<?php
// History Delete
if (isset($_POST['historyDeleteSubmit'])) {
	
	include "../connect.php";

	$id = $_POST['id'];
	
	try {
		// unlink("../../" . $img);

		$sql = "DELETE FROM tbl_history WHERE id = :id;";

		$statement = $pdo->prepare($sql);
		$statement->bindValue(":id", $id);
		$statement->execute();
		header("Location: ../../history.php");
	} catch (PDOException $e) {
		echo "Error deleting history item: " . $e->getMessage();
		exit();
	}
}
?>