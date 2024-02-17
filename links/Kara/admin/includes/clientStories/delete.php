<?php
// Client Story Delete
if (isset($_POST['clientStoryDeleteSubmit'])) {
	
	include "../connect.php";

	$id = $_POST['id'];
	
	try {
		$sql = "DELETE FROM tbl_clientStory WHERE id = :id;";

		$statement = $pdo->prepare($sql);
		$statement->bindValue(":id", $id);
		$statement->execute();
		header("Location: ../../clientStories.php");
	} catch (PDOException $e) {
		echo "Error deleting Client Story: " . $e->getMessage();
		exit();
	}
}
?>