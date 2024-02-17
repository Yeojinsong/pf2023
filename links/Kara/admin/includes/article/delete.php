<?php
// Client Story Delete
if (isset($_POST['delete-news-Submit'])) {

	include "../connect.php";

	$id = $_POST['id'];

	$imageNull = 0;

	try {
		$sql = "UPDATE tbl_mediaImage SET mediaId = :mediaId WHERE mediaId = '$id'";

		$statement = $pdo->prepare($sql);

		$statement->bindValue(":mediaId", NULL);

		$statement->execute();

		$imageNull = 1;

		header("Location: ../../article.php");

	} catch (PDOException $e) {

		echo "Error updating mediaImage: " . $e->getMessage();

		exit();
	}

	if ($imageNull == 1) {

		try {
			$sql = "DELETE FROM tbl_media WHERE id = :id;";

			$statement = $pdo->prepare($sql);

			$statement->bindValue(":id", $id);

			$statement->execute();

			header("Location: ../../article.php");

		} catch (PDOException $e) {

			echo "Error deleting article: " . $e->getMessage();

			exit();
		}
	} else {
		echo "<script type='text/javascript'>alert('Article could not be deleted')</script>";
	}

}
?>
