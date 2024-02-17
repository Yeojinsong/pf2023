<?php
function workingWithLevel2n3() {
	include "includes/connect.php";
	try {																
		$sql = "SELECT * FROM tbl_workingWith where active IS TRUE";								
		$resultSet = $pdo->query($sql);								
	}

	catch (PDOException $e) {
		echo "Error fetching who we work with level2n3:".$e->getMessage();
		exit();	
	}
	
	foreach ($resultSet as $row) {
		$name = $row['name'];
		$level = $row['level'];
		$logo = $row['logo'];
		$url = $row['url'];
		$summary = $row['summary'];
		
		if($level==2){
?>
		<div class="col-12 col-sm-6 partnerWrapper">
			<div><a href="<?php echo $url;?>" target="_blank"><img class="partnerImage" alt="<?php echo $name;?>" src="<?php echo $logo;?>"></a></div>
								
		</div>
		<?php
			}
			else if ($level == 3){

				if ($url) {
		?>
					<div class="col-12 col-lg-6">
						<ul class="centerList">
							<li><a href="<?php echo $url;?>" target="_blank"><?php echo $name;?></a></li>
						</ul>							
					</div>
		<?php  
				} else {
		?>
					<div class="col-12 col-lg-6">
						<ul class="centerList">
							<li><?php echo $name;?></li>
						</ul>							
					</div>
		<?php
				}	

			}// if end
	}// foreach end
}//function end
?>
