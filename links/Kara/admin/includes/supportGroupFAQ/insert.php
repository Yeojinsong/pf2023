<?php
// Client Story Insert
include "../adminFunctions.php";
include "../connect.php";

// Check if image file is a actual image or fake image
if(isset($_POST["AddSubmit"])) {
	
		$question = cleanInput($_POST['question']);
		$answer = $_POST['answer'];
		$active = isset($_POST['active']);

		try {
			$sql = "INSERT INTO tbl_supportGroupFAQ (question, answer, active) VALUES (:question, :answer, :active);";

			$statement = $pdo->prepare($sql);

			$statement->bindValue(':question', $question);
			$statement->bindValue(':answer', $answer);
			$statement->bindValue(':active', $active);

			$statement->execute();
		}
		catch(PDOException $e) {
			echo "Error adding support Group FAQ: " . $e->getMessage();
			exit();
		}
		header("Location: ../../supportGroupFAQ.php");
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

?>