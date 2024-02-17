<?php
// Donations Update
if (isset ($_POST['donationUpdateSubmit'])) {

	include "../connect.php";

	include "../adminFunctions.php";

	$donationAmount = cleanInput($_POST['donationAmount']);
	$description = $_POST['description'];
	$display = isset($_POST['display']);
	$highlight = isset($_POST['highlight']);
	$active = isset($_POST['active']);

	try {

		$sql = "UPDATE tbl_donationAmount SET description = :description, display = :display, highlight = :highlight, active = :active WHERE donationAmount = :donationAmount;";

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
	} catch (PDOException $e) {

		echo "Error updating Donation: " . $e->getMessage();

		exit();
	}
}
?>