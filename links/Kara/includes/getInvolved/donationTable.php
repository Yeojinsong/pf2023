<?php if(session_id() == '') session_start();
/*
Filename: .php
Author: Harris salehi 
Date Created: 8/08/2018
Date Last updated: 8/08/2018
Last Updated By: Dahmon Bicheno

Version Number: 0.1
*/
?>
<table class="table">
<?php
try {
	include "includes/connect.php";
	
	$sql = "SELECT donationAmount, description FROM tbl_donationAmount WHERE active IS TRUE";
	
	$resultSet = $pdo->query($sql);
	
} catch (PDOException $e) {
	echo "Error fetching products:".$e->getMessage();

	exit();	
}
foreach ($resultSet as $row) {
	$donationAmount = $row['donationAmount'];
	$description = $row['description'];
?>
	<tr>
		<th><?php echo '$'.$donationAmount; ?></th>
		<td><?php echo $description; ?></td>
	</tr>
<?php
}
?>
</table>