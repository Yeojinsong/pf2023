<?php
// Statistic Update
if (isset ($_POST['Image-update-Submit'])) {

	include "../connect.php";
	include "../adminFunctions.php";

	$id = $_POST['id'];
	$name = cleanInput($_POST['name']);
	$mediaId = $_POST['mediaId'];
	$active = isset($_POST['active']);
	if ($mediaId == 'NULL') {
		try {
			$sql = "UPDATE tbl_mediaImage SET name = :name, mediaId = :mediaId, active = :active WHERE id = :id;";

			$statement = $pdo->prepare($sql);

			$statement->bindValue(':id', $id);
			$statement->bindValue(':name', $name);
			$statement->bindValue(':mediaId', NULL);
			$statement->bindValue(':active', $active);


			$statement->execute();

			header("Location: ../../articleImages.php");
		}
		catch(PDOException $e) {
			echo "Error updating article images: " . $e->getMessage();
			exit();
		}
	} else {
		try {
			$sql = "UPDATE tbl_mediaImage SET name = :name, mediaId = :mediaId, active = :active WHERE id = :id;";

			$statement = $pdo->prepare($sql);

			$statement->bindValue(':id', $id);
			$statement->bindValue(':name', $name);
			$statement->bindValue(':mediaId', $mediaId);
			$statement->bindValue(':active', $active);


			$statement->execute();

			header("Location: ../../articleImages.php");
		}
		catch(PDOException $e) {
			echo "Error updating article images: " . $e->getMessage();
			exit();
		}

	}

}
?>
