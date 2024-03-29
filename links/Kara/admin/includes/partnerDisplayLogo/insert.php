<?php
// Client Story Insert
include "../adminFunctions.php";
include "../connect.php";

$target_dir = "../../../images/";
$target_file = $target_dir . basename($_FILES["imgUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


		$name = cleanInput($_POST['name']);
		$url = cleanInput($_POST['url']);
		$displayLogo = isset($_POST['displayLogo']);
		$active = 1;



if (!$_FILES['imgUpload']['name']=='') {

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
		try {
			$sql = "INSERT INTO tbl_partner (name, logo, url, displayLogo, active) VALUES (:name, :logo, :url, :displayLogo, :active);";

			$statement = $pdo->prepare($sql);

			$statement->bindValue(':name', $name);
			$statement->bindValue(':logo', 'images/' . $_FILES["imgUpload"]["name"]);			
			$statement->bindValue(':url', $url);
			$statement->bindValue(':displayLogo', $displayLogo);
			$statement->bindValue(':active', $active);

			$statement->execute();
		}
		catch(PDOException $e) {
			echo "Error adding workingWith: " . $e->getMessage();
			exit();
		}

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

}
else{
	
	try {
		$sql = "INSERT INTO tbl_partner (name, url, displayLogo, active) VALUES (:name, :url, :displayLogo, :active);";

		$statement = $pdo->prepare($sql);

		$statement->bindValue(':name', $name);		
		$statement->bindValue(':url', $url);
		$statement->bindValue(':displayLogo', $displayLogo);
		$statement->bindValue(':active', $active);

		$statement->execute();
	}
	catch(PDOException $e) {
		echo "Error adding partner: " . $e->getMessage();
		exit();
	}	
	
}
	 header("Location: ../../partnerDisplayLogo.php");

?>