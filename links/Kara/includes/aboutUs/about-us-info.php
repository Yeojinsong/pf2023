<?php if(session_id() == '') session_start();
/*
Filename: about-us-info.php
Author: Aleksander Tudorin
Date Created: 8/08/2018
Date Last updated: 8/08/2018
Last Updated By: Aleksander Tudorin

Version Number: 0.1
*/
?>

<?php
	try {
		include "includes/connect.php";
		
		$sql = "SELECT content FROM tbl_aboutUs WHERE active IS TRUE;";
		
		$resultSet = $pdo->query($sql);
		
	} catch (PDOException $e) {
		echo "Error fetching database information".$e->getMessage();

		exit();	
	}
?>
	<?php
	
		foreach ($resultSet as $row) {
			$content = $row['content'];
			
			echo $content;
			
		}
	?>
	
	
