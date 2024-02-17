<?php if(session_id() == '') session_start();
/*
Filename: partnerWithUsLogo.php
Author: Harris salehi 
Date Created: 8/08/2018
Date Last updated: 20/11/2018
Last Updated By: Harris salehi

Version Number: 0.2
*/
?>
	<?php
	try {
		include "includes/connect.php";
		
		$sql = "SELECT name, logo FROM tbl_partner WHERE active AND displayLogo IS TRUE;";
		
		$resultSet = $pdo->query($sql);
		
	} catch (PDOException $e) {
		echo "Error fetching products:".$e->getMessage();

		exit();
	}
	foreach ($resultSet as $row) {
		$logo = $row['logo'];
		$name = $row['logo'];	
	?>
		<img src="<?php echo $logo; ?>" alt="<?php echo $name; ?>">
	<?php
	}
	?>