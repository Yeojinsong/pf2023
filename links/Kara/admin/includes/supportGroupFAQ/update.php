<?php
// Family Violence Fact Update
if (isset ($_POST['supportGroupUpdateFAQSubmit'])) {

	include "../connect.php";
	include "../adminFunctions.php";

	$id = $_POST['id'];
	$question = cleanInput($_POST['question']);
	$answer = $_POST['answer'];
	$active = isset($_POST['active']);

	try {
		
		$sql = "UPDATE tbl_supportGroupFAQ SET question = :question, answer = :answer, active = :active WHERE id = :id;";

			$statement = $pdo->prepare($sql);

			$statement->bindValue(':id', $id);
			$statement->bindValue(':question', $question);
			$statement->bindValue(':answer', $answer);
			$statement->bindValue(':active', $active);

			$statement->execute();
			
		header("Location: ../../supportGroupFAQ.php");
	}
	catch(PDOException $e) {
		echo "Error updating supportGroupFAQ: " . $e->getMessage();
		exit();
	}
}
?>