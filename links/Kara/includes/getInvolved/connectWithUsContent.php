<?php if(session_id() == '') session_start();
/*
Filename: connectWithUsContent.php
Author: Harris salehi 
Date Created: 07/11/2018
Date Last updated: 20/11/2018
Last Updated By: Harris Salehi

Version Number: 0.1
*/
?>
	<?php
	try {
		include "includes/connect.php";
		
		$sql = "SELECT content FROM tbl_connectWithUs WHERE active IS TRUE";
		
		$statement = $pdo->prepare($sql);
		
		$resultSet = $pdo->query($sql);
		
	} catch (PDOException $e) {
		echo "Error fetching products:".$e->getMessage();

		exit();
	}
	foreach ($resultSet as $row) {
		$content = $row['content'];
	
	echo $content;
	}
	?>