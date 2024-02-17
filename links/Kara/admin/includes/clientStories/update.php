<?php
// Client Story Update
if (isset ($_POST['clientStoryUpdateSubmit'])) {

	include "../connect.php";
	include "../adminFunctions.php";

	$id = $_POST['id'];
	$name = cleanInput($_POST['name']);
	$story = $_POST['story'];
	// $img = cleanInput($_POST['img']);
	$activeBeInformed = isset($_POST['activeBeInformed']);
	$activeSeekHelp = isset($_POST['activeSeekHelp']);
	$activeGetInvolved = isset($_POST['activeGetInvolved']);

	try {
		if (!$_FILES['imgUpload']['name']=='') {
			$target_dir = "../../../images/";
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
			if ($uploadOk == 0) {
			    echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
			    if (move_uploaded_file($_FILES["imgUpload"]["tmp_name"], $target_file)) {
			    	$sql = "UPDATE tbl_clientStory SET name = :name, story = :story, img = :img, activeBeInformed = :activeBeInformed, activeSeekHelp = :activeSeekHelp, activeGetInvolved = :activeGetInvolved WHERE id = :id;";
			    	
			    	$statement = $pdo->prepare($sql);
					$statement->bindValue(':img', 'images/' . $_FILES["imgUpload"]["name"]);	
			    } else {
			        echo "Sorry, there was an error uploading your file.";
			    }
			}
		} else {
			$sql = "UPDATE tbl_clientStory SET name = :name, story = :story, activeBeInformed = :activeBeInformed, activeSeekHelp = :activeSeekHelp, activeGetInvolved = :activeGetInvolved WHERE id = :id;";
			$statement = $pdo->prepare($sql);
		}

		$statement->bindValue(':id', $id);
		$statement->bindValue(':name', $name);
		$statement->bindValue(':story', $story);
		$statement->bindValue(':activeBeInformed', $activeBeInformed);
		$statement->bindValue(':activeSeekHelp', $activeSeekHelp);
		$statement->bindValue(':activeGetInvolved', $activeGetInvolved);

		$statement->execute();

		header("Location: ../../clientStories.php");
	}
	catch(PDOException $e) {
		echo "Error updating Client Stories: " . $e->getMessage();
		exit();
	}
}
?>