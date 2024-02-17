<?php if (session_id() == '') session_start();

/*
Filename: Index.php
Author: Yeojin Song 102060145
Date: 27 April 2018
Last Updated:
Description: Index file for the Play Wool Website
*/

// set the page title
$pageTitle = "Home";

// import the head section
include "includes/head.php";
?>

	<body>
		<?php
		// import the nav section
		include "includes/nav.php";

		// import the head section
		include "includes/header.php";

		// import the login modal
		include "includes/loginModal.php";
		
		// import the top of page button
		include "includes/topofpagebutton.php";

		?>
		
		<!-- main content -->
		<div class="container">
			
			 <!-- Image slide show start-->
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
			  <!-- Indicators -->
			  <ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
			  </ol>
			  <div class="carousel-inner" role="listbox">
				<div class="item active">
				  <img class="first-slide" src="images/mainbanner03.jpg" alt="First slide">
				  <div class="container">
					<div class="carousel-caption">
					  <h1>Winter is just conner.</h1>
					  <p>Sheep’s wool breathes, it will wick moisture away from the skin, and it’s naturally insulating, making it ideal for keeping your hands warm.</p>
					  <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
					</div>
				  </div>
				</div>
				<div class="item">
				  <img class="second-slide" src="images/mainbanner02.jpg" alt="Second slide">
				  <div class="container">
					<div class="carousel-caption">
					  <h1>Warm up with Blanket</h1>
					  <p>A beautiful blanket warms the heart and may be cherished for years to come. Play Wool appealing range includes kids’ and baby blankets, adding that special element of comfort for all the family.</p>
					  <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
					</div>
				  </div>
				</div>
				<div class="item">
				  <img class="third-slide" src="images/mainbanner01.jpg" alt="Third slide">
				  <div class="container">
					<div class="carousel-caption">
					  <h1>Together Fun & Warm</h1>
					  <p>Some People arrive aand make such beautiful impact on yor life, you can barely remember what life was like without them. Let's prepare to warm winter for your friends.</p>
					  <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
					</div>
				  </div>
				</div>
			  </div>
			  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			  </a>
			  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			  </a>
			</div><!-- Image slide show start-->
			
			 <!-- Marketing messaging and featurettes -->
			<!-- Wrap the rest of the page in another container to center all the content. -->

			<div class="container marketing">
				<h2>VIDEO <strong>TUTORIAL</strong></h2>
				<hr>
				<br><br>
				
			  <!-- Three columns of text below the carousel -->
			  <div class="row">
				<div class="col-lg-4">
				  <img class="img-circle" src="images/videoImg01.jpg" alt="Generic placeholder image" width="240" height="240">
				  <h2>ADVANCED LEVEL<br><strong>SWEATER</strong></h2>
				  <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
				  <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
				</div><!-- /.col-lg-4 -->
				<div class="col-lg-4">
				  <img class="img-circle" src="images/videoImg02.jpg" alt="Generic placeholder image" width="240" height="240">
				  <h2>KIDS TO ADULT<br><strong>GLOVES</strong></h2>
				  <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
				  <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
				</div><!-- /.col-lg-4 -->
				<div class="col-lg-4">
				  <img class="img-circle" src="images/videoImg03.jpg" alt="Generic placeholder image" width="240" height="240">
				  <h2>HANDMADE WARM<br><strong>BLANKET</strong></h2>
				  <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
				  <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
				</div><!-- /.col-lg-4 -->
			  </div><!-- /.row -->
			
			</div>
			
		<?php  
		
			//import the social media
			include "includes/socialMedia.php"; 
			
		?>
		</div>
		<?php  
		
			//import the footer section 
			include "includes/footer.php";
			
		?>
  </body>
</html>