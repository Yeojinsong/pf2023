<?php if(session_id() == '') session_start();
/*
Filename: committeePosition.php
Author: Aleksander Tudorin
Date Created: 8/08/2018
Date Last updated: 8/08/2018
Last Updated By: Aleksander Tudorin

Version Number: 0.1
*/
?>


<table class="table" style="width:100%">
	<?php
	try {
		include "includes/connect.php";
		
		// $sql = "SELECT committeePosition, firstName, lastName FROM tbl_committee WHERE active IS TRUE ORDER BY id, committeePosition;";
		$sql = "SELECT committeePosition, firstName, lastName FROM tbl_committee WHERE active IS TRUE AND committeePosition NOT LIKE 'Member';";
		
		$resultSet = $pdo->query($sql);
		
	} catch (PDOException $e) {
		echo "Error fetching database information".$e->getMessage();

		exit();	
	}
	foreach ($resultSet as $row) {
		$committeePosition = $row['committeePosition'];
		$firstName = $row['firstName'];
		$lastName = $row['lastName'];
		
	?>
		<tr>
			<th><?php echo $committeePosition; ?></th>
			<td> <?php echo $firstName . " " . $lastName ?> </td>
		</tr>
	<?php
	}
	
	$sql = "SELECT committeePosition, firstName, lastName FROM tbl_committee WHERE active IS TRUE AND committeePosition LIKE 'Member';";
	
	$resultSet = $pdo->query($sql);
	
	?>
	<tr>
		<th>Member</th>
		<td>
		<?php
		foreach ($resultSet as $row) {
			$firstName = $row['firstName'];
			$lastName = $row['lastName'];
			?>
			<?php echo $firstName . " " . $lastName ?><br>
			<?php
		}
		?>
		</td>
	</tr>
</table>
