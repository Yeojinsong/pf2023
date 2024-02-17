<?php
		try {
		
			$sql = "SELECT donationAmount, description, highlight FROM tbl_donationAmount WHERE active IS TRUE AND display IS TRUE";
			
			$resultSet = $pdo->query($sql);
			
			
			} catch (PDOExeption $e) {
				//create an error message with the exception details
				echo "Error obtaining database information: ".$e->getMessage();

				//stop script from continuing
				exit();
			}

		?>

		<div class="row">
			<div class="col-12">
				<ul class="nav nav-tabs nav-fill" id="donationTabs">
					<?php					

					foreach ($resultSet as $row) {
						$donationAmount = $row['donationAmount'];
						$highlight = $row['highlight'];
					?>

					<li class="nav-item d-none d-sm-block">
						<a class="nav-link donationAmounts text-center <?php if ($highlight == TRUE) echo 'active';?>" id="<?php echo $donationAmount?>-tab" data-toggle="tab" href="#tab-<?php echo $donationAmount; ?>">$<?php echo $donationAmount ?></a>
					</li>

					<?php
					}					
					?>
					<li class="nav-item">
						<a class="nav-link donationTabButton text-center" id="sixth-tab" href="https://www.givenow.com.au/karahouse" target="_blank">Donate Now</a>
					</li>
				</ul>
			</div>

			<div class="col-12">
				<div class="donationBox">
					<div class="tab-content" id="myTabContent">
						<?php

						try {
			
							$sql = "SELECT donationAmount, description, highlight FROM tbl_donationAmount WHERE active IS TRUE AND display IS TRUE";
							
							$resultSet = $pdo->query($sql);
							
							} catch (PDOExeption $e) {
								//create an error message with the exception details
								echo "Error obtaining database information: ".$e->getMessage();

								//stop script from continuing
								exit();
						}

					foreach ($resultSet as $row) {
						$donationAmount = $row['donationAmount'];
						$description = $row['description'];
						$highlight = $row['highlight'];			

					?>
					  <div class="tab-pane fade <?php if ($highlight == TRUE) echo 'show '.'active';?>" id="tab-<?php echo $donationAmount; ?>" role="tabpanel" aria-labelledby="home-tab">
						<h1 class="mb-0">$<?php echo $donationAmount ?></h1>
						<div class="donationText"><?php echo $description ?></div>
					  </div>
					<?php
					}
					?>
					</div>

					<div class="donationImage">
						<img src="images/giveNow.png" class="donationGiveNow" alt="GiveNow" />
						<?php
						try {

							// select information from the database tbl_donationImage
							$sql = "SELECT name, img FROM tbl_donationImage WHERE active IS TRUE;";

							// prepare the statement 
							$statement = $pdo->prepare($sql);
							
							// execute SQL statement
							$resultSet = $pdo->query($sql);
										
						} catch (PDOException $e) {
							//create an error message with the exception details
							echo "Error obtaining database information: ".$e->getMessage();

							//stop script from continuing
							exit();		
						}

						foreach ($resultSet as $row) {
							$name = $row['name'];
							$img = $row['img'];
						
						?>
						<img src="<?php echo $img; ?>" alt="<?php echo $name; ?>" class="img-fluid">
						<?php
						}
						?>
					</div>
				</div>
			</div>
		</div>
