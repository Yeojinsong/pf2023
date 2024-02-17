<?php if(session_id() == '') session_start();
/*
Filename: jobVacancyContent.php
Author: Harris Salehi 
Date Created: 8/08/2018
Date Last updated: 8/08/2018
Last Updated By: Dahmon Bicheno

Version Number: 0.1
*/
?>
	<?php
	try {
		include "includes/connect.php";
		
		$sql = "SELECT position, fileName FROM tbl_jobVacancy WHERE active IS TRUE";
		
		$statement = $pdo->prepare($sql);
		
		$resultSet = $pdo->query($sql);
		
	} catch (PDOException $e) {
		echo "Error fetching names:".$e->getMessage();

		exit();
	}
	
	$resultCount = $resultSet->rowCount();
	?>
	
	<?php
	if ($resultCount >= 1 ) {
	?>
	<p>See below for current positions available at Kara House.</p>
	<?php
		foreach ($resultSet as $row) {
			$position = $row['position'];
			$fileName = $row['fileName'];
?>			
			<div class="col-sm-12">
				<div class="row text-center darkSilver bgPadding bgMargin" >
					<div class="col-lg-4 col-sm-12 profPosition flex">
						<p class="mb-0"><?php echo $position; ?> </p>
					</div>
						
					<div class="col-lg-4 col-sm-12">
					</div>
					
					<div class="col-lg-4 col-sm-12">
						<a class="btn btn-primary groupBrochureButton btnColor" href="<?php echo $fileName; ?>" download>Download</a>	
					</div>
				</div>	
			</div>
<?php
		}
	} else {
?>
	<p> There are currently no positions avaliable at Kara House.</p>
	<?php
	}
	?>
