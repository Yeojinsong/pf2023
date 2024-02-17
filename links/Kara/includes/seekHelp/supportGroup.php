<?php
function supportGroup() {
	include "includes/connect.php";
	try {
		// write statement to get data from tbl_supportGroup table
		$sql = "SELECT * FROM tbl_supportGroup WHERE active is TRUE";
		
		// execute SQL statement
		$resultSet = $pdo->query($sql);

		foreach ($resultSet as $row) {
			$id = $row['id'];
			$start = $row['start'];
			$time = $row['time'];
			$location = $row['location'];
			$children = $row['children'];
			$refreshments = $row['refreshments'];
			$transport = $row['transport'];
		?>
		<table class="table-responsive-sm groupDetails">
			<tr>
				<th colspan="2">Details for the next group</th>
			</tr>
			<tr>
				<td class="groupDetailsLeft">Starts</td>
				<td><?php echo $start;?></td>
			</tr>
			<tr>
				<td>Times</td>
				<td><?php echo $time;?></td>
			</tr>
			<tr>
				<td>Location</td>
				<td><?php echo $location;?></td>
			</tr>
			<tr>
				<td>Childcare</td>
				<td><?php echo $children;?></td>
			</tr>
			<tr>
				<td>Refreshments</td>
				<td><?php echo $refreshments;?></td>
			</tr>
			<tr>
				<td>Transport</td>
				<td><?php echo $transport;?></td>
			</tr>
		</table>
		<?php

		}
	}// end of try block
	catch (PDOException $e) {
		// create error message
		echo "Error fetching SupportGroup:".$e->getMessage();
		exit();
	}// end catch block

}
?>