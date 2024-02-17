			<?php
			// Statistic Insert
			if (isset ($_POST['latest-news-AddSubmit'])) {

				include "../connect.php";
				include "../adminFunctions.php";


						$heading = cleanInput($_POST['heading']);
						$article = $_POST['article'];
						$summary = cleanInput($_POST['summary']);
						$mediaType = cleanInput($_POST['mediaType']);
						$featureOnHome = isset($_POST['featureOnHome']);
						$active = isset($_POST['active']);
				try {

					$sql = "INSERT INTO tbl_media (heading, article, mediaType, summary, dateCreated, featureOnHome, active) VALUES (:heading, :article, :mediaType, :summary, :dateCreated, :featureOnHome, :active);";

					$statement = $pdo->prepare($sql);

					$statement->bindValue(':heading', $heading);
					$statement->bindValue(':article', $article);
					$statement->bindValue(':mediaType', $mediaType);
					$statement->bindValue(':summary', $summary);
					$statement->bindValue(':dateCreated', date('Y-m-d'));
					$statement->bindValue(':featureOnHome', $featureOnHome);
					$statement->bindValue(':active', $active);


					$statement->execute();

					if ($featureOnHome && $active) {
						try {
							$id2 = $pdo->lastInsertId();

							$sql2 = "UPDATE tbl_media SET featureOnHome = 0 WHERE id != '$id2';";

							$statement = $pdo->prepare($sql2);

							$statement->execute();
						} catch (PDOException $e) {
							echo "Error updating featured article: " . $e->getMessage();
							exit();
						}

					}

					header("Location: ../../article.php");
				}
				catch(PDOException $e) {
					echo "Error adding article: " . $e->getMessage();
					exit();
				}
			}
			?>
