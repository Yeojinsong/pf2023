<?php
// History Update
if (isset ($_POST['aboutUsUpdateSubmit'])) {

	include "../connect.php";
	include "../adminFunctions.php";

	$id = $_POST['id'];
	$content = $_POST['content'];
	$active = isset($_POST['active']);

	try {	
		$sql = "UPDATE tbl_aboutUs SET content = :content, active = :active WHERE id = :id;";

		$statement = $pdo->prepare($sql);

		$statement->bindValue(':id', $id);
		$statement->bindValue(':content', $content);
		$statement->bindValue(':active', $active);

		$statement->execute();

		header("Location: ../../aboutUs.php");
	}
	catch(PDOException $e) {
		echo "Error updating history: " . $e->getMessage();
		exit();
	}
}
?>