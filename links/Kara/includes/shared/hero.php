<?php
function hero($page) {
	include "includes/connect.php";
	try {
		// write statement to get data from tbl_slider table
		$sql = "SELECT id, name, img FROM tbl_heroImage WHERE $page IS TRUE;";

		// prepare the statement 
		$statement = $pdo->prepare($sql);

		// execute SQL statement
		$resultSet = $pdo->query($sql);

		$rowCount = $resultSet->rowCount();

		if($rowCount > 0) {
		// Make the hero image
			foreach ($resultSet as $row) {
				// store row data in variables
				$id = $row['id'];
				$name = $row['name'];
				$img = $row['img'];
				?>
				<div class="heroWrap">
					<img class="heroImage" src="<?php echo $img; ?>" alt="<?php echo $name; ?>">
				</div>
			<?php
				break;
			}
		}
	} // end of try block
	catch (PDOException $e) {

		// create error message
		echo "Error fetching Hero Image: " .$e->getMessage();
		exit();

	} // end catch block

}
?>