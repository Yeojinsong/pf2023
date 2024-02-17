<?php if(session_id() == '') session_start();
/*
Filename: partnerWithUsContent.php
Author: Harris salehi 
Date Created: 8/08/2018
Date Last updated: 8/08/2018
Last Updated By: Harris Salehi

Version Number: 0.1
*/
?>
	<?php
	try {
		include "includes/connect.php";
		
		$sql = "SELECT name, url FROM tbl_partner WHERE active IS TRUE";
		
		$resultSet = $pdo->query($sql);
		
	} catch (PDOException $e) {
		echo "Error fetching names:".$e->getMessage();

		exit();
	}
	foreach ($resultSet as $row) {
		$name = $row['name'];
		$url = $row['url'];
		
		if  ($url == NULL) {
			echo "<ul>";
			echo "<li>" .$name ."</li>";
			echo "</ul>";
		} else {
			echo "<ul>";
			echo "<li>" ."<a href='" .$url ."' target='_blank'>" .$name ."</a></li>";
			echo "</ul>";
		}
	
	}
	?>
