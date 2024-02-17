<?php
function supportGroupFAQ() {
	include "includes/connect.php";
	try {
		// write statement to get data from tbl_supportGroupFAQ table
		$sql = "SELECT * FROM tbl_supportGroupFAQ WHERE active is TRUE";
		
		// execute SQL statement
		$resultSet = $pdo->query($sql);
		
		foreach ($resultSet as $row) {
			$id = $row['id'];
			$question = $row['question'];
			$answer = $row['answer'];
		?>
		<p>
		<span class="groupHeading"><?php echo $question;?></span><br>
		<?php echo $answer;?><br><br>
		<?php
		}
	}//end try block
	catch (PDOException $e) {
		// create error message
		echo "Error fetching SupportGroupFAQ:".$e->getMessage();
		exit();
	}// end catch block
}
?>