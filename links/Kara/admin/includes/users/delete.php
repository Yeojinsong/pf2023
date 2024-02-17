<?php
// Client Story Delete
if (isset($_POST['userDeleteSubmit'])) {
	
	include "../connect.php";

	$email = $_POST['email'];
	
	try {
		$sql = "DELETE FROM tbl_user WHERE email = :email;";

		$statement = $pdo->prepare($sql);
		$statement->bindValue(":email", $email);
		$statement->execute();
		header("Location: ../../users.php");
	} catch (PDOException $e) {
		echo "Error deleting User: " . $e->getMessage();
		exit();
	}
}
?>