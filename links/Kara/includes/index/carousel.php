<?php
		try {
		
		$sql = "SELECT name, img, heading, body FROM tbl_slider WHERE active IS TRUE";
		
		$resultSet = $pdo->query($sql);
		
		$resultCount = $resultSet->rowCount(); 
		
		} catch (PDOExeption $e) {
			//create an error message with the exception details
			echo "Error obtaining database information: ".$e->getMessage();

			//stop script from continuing
			exit();
		}
	?>


	<div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
		<ol class="carousel-indicators mb-0">
			
			<?php
			for ($i = 0; $i < $resultCount; $i++) {
			?>
			
			<li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>" <?php if ($i == 0) echo "class='active'"; ?> ></li>
		 	
		 	<?php
			}
			?>
		</ol>

		<div class="carousel-inner">
			<?php
				// active status for slider images
				$statusFlag = FALSE;

				foreach ($resultSet as $row) {
					$name = $row['name'];
					$img = $row['img'];
					$heading = $row['heading'];
					$body = $row['body'];
			?>

		  	<div class="carousel-item <?php if ($statusFlag == FALSE) echo 'active'; $statusFlag = TRUE;?>">
				<div class="carouselCircle"></div>
		    	<img class="d-block w-100 img-fluid" src="<?php echo $img; ?>" alt="<?php echo $name; ?>">
				<div class="carousel-caption">
					<h3 class="mb-0"><?php echo $heading; ?></h3>
					<p class="mb-0"><?php echo $body ?></p>
				</div>
		  	</div>

		  	<?php
		  	}
		  	?>

			<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon d-none d-sm-block" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon d-none d-sm-block" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
