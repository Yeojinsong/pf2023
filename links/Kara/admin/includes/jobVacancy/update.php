<?php
// Slider Update
if (isset ($_POST['jobVacancyUpdateSubmit'])) {

	include "../connect.php";
	include "../adminFunctions.php";

	$id = $_POST['id'];
	$position = $_POST['position'];
	$active = isset($_POST['active']);

	try {
		if (!$_FILES['docUpload']['name']=='') {
			$target_dir = "../../../docs/";
			$target_file = $target_dir . basename($_FILES["docUpload"]["name"]);
			$uploadOk = 1;
			$docFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

			// Check if file already exists
			if (file_exists($target_file)) {
			    echo "Sorry, file already exists.";
			    $uploadOk = 0;
			}
			// Check file is empty
			if ($_FILES["docUpload"]["size"] == 0) {
				echo "Sorry, this file appears to be empty. Please choose another file to upload.";
				$uploadOk = 0;
			}
			// Check file size
			if ($_FILES["docUpload"]["size"] > 20000000) {
			    echo "Sorry, your file is too large.";
			    $uploadOk = 0;
			}
			// Allow certain file formats
			if($docFileType != "pdf" && $docFileType != "doc" && $docFileType != "docx") {
			    echo "Sorry, only PDF, DOC & DOCX files are allowed.";
			    $uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			    echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
			    if (move_uploaded_file($_FILES["docUpload"]["tmp_name"], $target_file)) {
			    	$sql = "UPDATE tbl_jobVacancy SET position = :position, fileName = :fileName, active = :active WHERE id = :id;";

			    	$statement = $pdo->prepare($sql);
					$statement->bindValue(':fileName', 'docs/' . $_FILES["docUpload"]["name"]);
			    } else {
			        echo "Sorry, there was an error uploading your file.";
			    }
			}
		} else {
			$sql = "UPDATE tbl_jobVacancy SET position = :position, active = :active WHERE id = :id;";
			$statement = $pdo->prepare($sql);
		}

		$statement->bindValue(':id', $id);
		$statement->bindValue(':position', $position);
		$statement->bindValue(':active', $active);

		$statement->execute();

		header("Location: ../../jobVacancy.php");
	}
	catch(PDOException $e) {
		echo "Error updating Job Vacancy: " . $e->getMessage();
		exit();
	}
}
?>
