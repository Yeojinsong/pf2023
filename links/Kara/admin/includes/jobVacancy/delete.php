<?php
// Slider Delete
if (isset($_POST['jobVacancyDeleteSubmit'])) {

	include "../connect.php";

	$id = $_POST['id'];

	try {
		$sql = "DELETE FROM tbl_jobVacancy WHERE id = :id;";

		$statement = $pdo->prepare($sql);
		$statement->bindValue(":id", $id);
		$statement->execute();
		header("Location: ../../jobVacancy.php");
	} catch (PDOException $e) {
		echo "Error deleting Job Vacancy: " . $e->getMessage();
		exit();
	}
}
?>
