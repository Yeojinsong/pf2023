<?php
function workingWithLevel1() {

	include "includes/connect.php";
	try {																
		$sql = "SELECT * FROM tbl_workingWith where active IS TRUE";								
		$resultSet = $pdo->query($sql);								
	}

	catch (PDOException $e) {
		echo "Error fetching who we work with level1:".$e->getMessage();
		exit();	
	}
	
	foreach ($resultSet as $row) {
		$name = $row['name'];
		$level = $row['level'];
		$logo = $row['logo'];
		$url = $row['url'];
		$summary = $row['summary'];
		
		if($level==1){
?>
<div class="col-12 col-lg-4 paddingImage paddingText paddingVic">
	<a href="<?php echo $url;?>" target="_blank"><img class="partnerImage img-fluid" src="<?php echo $logo;?>" alt="<?php echo $name;?>"></a>
</div>
<div class="col-12 col-lg-8 paddingText">
	<p><?php echo $summary;?></p>
</div>
<?php
		}// if end
	}//foreach end
}//function end
?>
