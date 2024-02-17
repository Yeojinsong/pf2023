<?php
// Statistic Insert
if (isset ($_POST['donationAddSubmit'])) {

	include "../connect.php";

	include "../adminFunctions.php";

	$donationAmount = cleanInput($_POST['donationAmount']);
	$description = $_POST['description'];
	$display = isset($_POST['display']);
	$highlight = isset($_POST['highlight']);
	$active = isset($_POST['active']);

	try {

		$sql = "INSERT INTO tbl_donationAmount (donationAmount, description, display, highlight, active) VALUES (:donationAmount, :description, :display, :highlight, :active);";

		$statement = $pdo->prepare($sql);
		$statement->bindValue(':donationAmount', $donationAmount);
		$statement->bindValue(':description', $description);
		$statement->bindValue(':display', $display);
		$statement->bindValue(':highlight', $highlight);
		$statement->bindValue(':active', $active);

		$statement->execute();

		// Only one donation should be highlighted at a time, so we'll test to see if the updated donation is going to be set as highlighted and, if it is, remove the highlight from any other donation.
		if ($highlight != "") {

			$sql2 = "UPDATE tbl_donationAmount SET highlight = 0 WHERE donationAmount != $donationAmount;";

			$statement = $pdo->prepare($sql2);

			$statement->execute();
		}

		header("Location: ../../donations.php");
	}
	catch(PDOException $e) {
		echo "Error adding Statistics: " . $e->getMessage();
		exit();
	}
}
?>