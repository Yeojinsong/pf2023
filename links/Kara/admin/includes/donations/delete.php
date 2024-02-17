<?php
// Statistic Delete
if (isset($_POST['donationDeleteSubmit'])) {
	
	include "../connect.php";

	$donationAmount = $_POST['id'];
	
	try {

		$sql = "DELETE FROM tbl_donationAmount WHERE donationAmount = :donationAmount;";

		$statement = $pdo->prepare($sql);

		$statement->bindValue(":donationAmount", $donationAmount);

		$statement->execute();

		header("Location: ../../donations.php");

	} catch (PDOException $e) {

		echo "Error deleting Donation Amount: " . $e->getMessage();

		exit();
	}
}
?>