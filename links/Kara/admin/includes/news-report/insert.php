<?php

include "../adminFunctions.php";
include "../connect.php";

$target_dir = "../../../docs/";
$target_file = $target_dir . basename($_FILES["docUpload"]["name"]);
$uploadOk = 1;
$docFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image

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
if ($_FILES["docUpload"]["size"] > 10000000) {
    echo "Sorry, your file is too large please make sure your file is 10mb";
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
		$mediaType = $_POST['mediaType'];
		$heading = cleanInput($_POST['heading']);
		$active = isset($_POST['active']);

		try {
			$sql = "INSERT INTO tbl_media (mediaType, heading, fileName, dateCreated, featureOnHome, active) VALUES (:mediaType, :heading, :fileName, :dateCreated, :featureOnHome, :active);";

			$statement = $pdo->prepare($sql);

			$statement->bindValue(':mediaType', $mediaType);
			$statement->bindValue(':heading', $heading);
			$statement->bindValue(':fileName', 'docs/' . $_FILES["docUpload"]["name"]);
			$statement->bindValue(':dateCreated', date('Y-m-d'));
			$statement->bindValue(':featureOnHome', FALSE);
			$statement->bindValue(':active', $active);

			$statement->execute();
		}
		catch(PDOException $e) {
			echo "Error adding file to database: " . $e->getMessage();
			exit();
		}
		header("Location: ../../news-report.php");
		header("Location: ../../news-report.php");
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
