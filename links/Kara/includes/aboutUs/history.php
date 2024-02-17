<?php
	try {
		include "includes/connect.php";
		
		$sql = "SELECT year, event FROM tbl_history WHERE active IS TRUE ORDER BY year ";
		
		$resultSet = $pdo->query($sql);
		
	} catch (PDOException $e) {
		echo "Error fetching database information" . $e->getMessage();
		
		exit();
	}
?>
	<ul class="timeline paddingHistory">
		<?php
		
			$lastYear = null;
			foreach ($resultSet as $row) {
			$year = $row['year'];
			$event = $row['event'];
			
			if ($year !== $lastYear) {
			
		?>
			<li class="event timelineDate" data-date="<?php echo $year; ?>">
				<?php echo $event; ?>
			</li>
		<?php 
			} else {
		?>
			<li class="noCircle">
				<?php echo $event; ?>
			</li>
		<?php
			}
			
			$lastYear = $row['year'];
		}
		?>
	</ul>
