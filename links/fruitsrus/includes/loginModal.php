<?php
/*
Filename: loginModal.php
Author: Yeojin Song
Date: 28 March 2018
Last Updated:
Description: Login modal for the Fruits 'R' Us Website
*/
?>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header" style="padding:35px 50px;">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
			</div>
			<div class="modal-body" style="padding:40px 50px;">
				<form role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" onsubmit="return checkLogin(this)">
					<div class="form-group">
						<label for="loginEmail"><span class="glyphicon glyphicon-user"></span> Email</label>
						<input type="text" class="form-control" id="loginEmail" name="loginEmail" placeholder="Enter email">
					</div>
					<div class="form-group">
						<label for="loginPassWord"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
						<input type="password" class="form-control" id="loginPassWord" name="loginPassWord" placeholder="Enter password">
					</div>
						<button type="submit" name="loginSubmit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
				</form>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
				<p>Not a customer? <a href="registration.php">Sign Up</a></p>
				<p>Forgot <a href="forgettenPassword.php">Password?</a></p>
			</div>
		</div>
	</div>
</div>
