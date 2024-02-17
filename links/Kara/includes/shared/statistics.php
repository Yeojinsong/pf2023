<?php
function statistics($page) {
	include "includes/connect.php";
	try {
		// write statement to get data from tbl_slider table
		$sql = "SELECT id, heading, body  FROM tbl_statistic WHERE $page IS TRUE;";

		// prepare the statement 
		$statement = $pdo->prepare($sql);

		// execute SQL statement
		$resultSet = $pdo->query($sql);

		$rowCount = $resultSet->rowCount();

		if($rowCount > 0) {
			if ($rowCount == 4) {
				$cols = 6;
			} else if ($rowCount == 5 || $rowCount == 6) {
				$cols = 4;
			} else {
				$cols = 12/$rowCount;
			}
			
			$i = 1;
			foreach ($resultSet as $row) {
				$heading = $row['heading'];
				$body = $row['body'];
				?>
				<div class="col-12 col-lg-<?php echo $cols; ?> flex">
					<div class="statBox <?php if ($i % 2 == 0) {echo "statPurple";} else {echo "statBlue";} ?> white">
						<h1><?php echo $heading; ?></h1>

						<p><?php echo $body; ?></p>
					</div>
				</div>
				<?php
				$i++;
			}
		}
	} // end of try block
	catch (PDOException $e) {

		// create error message
		echo "Error fetching Statistics: " .$e->getMessage();
		exit();

	} // end catch block
}
?>