<?php if(session_id() == '') session_start();
$pageTitle = "Welcome";

// import the head section
include "includes/adminHead.php";

if (isset($_SESSION['login']) && $_SESSION['login'] == "valid") {
?>
	<body>
		<div class="container-fluid cmsContainer">
				<?php include "includes/cmsSidebar.php"; ?>

			<div class="offset-2 col-md-10">
				<div class="row">
					<div class="col-12">
						<h1>Welcome</h1>
					</div>
				</div>
			</div>
		</div>
	</body>
<?php
} else {
	header("Location: index.php");
}
include "includes/adminJsLinks.php";
?>
</html>