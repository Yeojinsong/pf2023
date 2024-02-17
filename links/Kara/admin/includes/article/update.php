		<?php
		// Statistic Update
		if (isset ($_POST['Update-news-Submit'])) {

			include "../connect.php";
			include "../adminFunctions.php";

			$id = $_POST['id'];
			$heading = cleanInput($_POST['heading']);
			$summary = cleanInput($_POST['summary']);
			$mediaType = cleanInput($_POST['mediaType']);
			$article = $_POST['article'];
			$feature = isset($_POST['featureOnHome']);
			$active = isset($_POST['active']);

			try {

				$sql = "UPDATE tbl_media SET heading = :heading, summary = :summary, mediaType = :mediaType, article = :article, featureOnHome = :featureOnHome, active = :active WHERE id = :id;";

				$statement = $pdo->prepare($sql);

				$statement->bindValue(':id', $id);
				$statement->bindValue(':heading', $heading);
				$statement->bindValue(':summary', $summary);
				$statement->bindValue(':mediaType', $mediaType);
				$statement->bindValue(':article', $article);
				$statement->bindValue(':featureOnHome', $feature);
				$statement->bindValue(':active', $active);

				$statement->execute();

				if ($feature) {

					$sql2 = "UPDATE tbl_media SET featureOnHome = 0 WHERE id != $id;";

					$statement2 = $pdo->prepare($sql2);

					$statement2->execute();

				}

				header("Location: ../../article.php");
			}
			catch(PDOException $e) {
				echo "Error updating article: " . $e->getMessage();
				exit();
			}
		}
		?>
