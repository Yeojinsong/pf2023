<?php

include "../adminFunctions.php";
include "../connect.php";

$target_dir = "../../../images/hero/";
$target_file = $target_dir . basename($_FILES["imgUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["imgUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file is empty
if ($_FILES["imgUpload"]["size"] == 0) {
	echo "Sorry, this file appears to be empty. Please choose another file to upload.";
	$uploadOk = 0;
}
// Check file size
if ($_FILES["imgUpload"]["size"] > 20000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    echo "Sorry, only JPG, JPEG & PNG files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["imgUpload"]["tmp_name"], $target_file)) {

		$name = cleanInput($_POST['name']);
		$activeBeInformed = isset($_POST['activeBeInformed']);
		$activeSeekHelp = isset($_POST['activeSeekHelp']);
		$activeGetInvolved = isset($_POST['activeGetInvolved']);
		$activeAboutUs = isset($_POST['activeAboutUs']);
		$activeWhatsNew = isset($_POST['activeWhatsNew']);
		$activeMedia = isset($_POST['activeMedia']);

		try {
			$sql = "INSERT INTO tbl_heroImage (name, img, activeBeInformed, activeSeekHelp, activeGetInvolved, activeAboutUs, activeWhatsNew, activeMedia) VALUES (:name, :img, :activeBeInformed, :activeSeekHelp, :activeGetInvolved, :activeAboutUs, :activeWhatsNew, :activeMedia);";

			$statement = $pdo->prepare($sql);

			$statement->bindValue(':name', $name);
			$statement->bindValue(':img', 'images/hero/' . $_FILES["imgUpload"]["name"]);
			$statement->bindValue(':activeBeInformed', $activeBeInformed);
			$statement->bindValue(':activeSeekHelp', $activeSeekHelp);
			$statement->bindValue(':activeGetInvolved', $activeGetInvolved);
			$statement->bindValue(':activeAboutUs', $activeAboutUs);
			$statement->bindValue(':activeWhatsNew', $activeWhatsNew);
			$statement->bindValue(':activeMedia', $activeMedia);

			$statement->execute();
		}
		catch(PDOException $e) {
			echo "Error adding Hero Image: " . $e->getMessage();
			exit();
		}
		header("Location: ../../hero.php");
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>