<?php
if (isset ($_POST['newsletterSubmit'])) {
		include "../functions.php";
		$footerFirstName = cleanInput($_POST['footerFirstName']);
		$footerLastName = cleanInput($_POST['footerLastName']);
		$footerEmail = cleanInput($_POST['footerEmail']);
		$footerPhone = cleanInput($_POST['footerPhone']);


	function sendEmail($footerFirstName, $footerLastName, $footerEmail, $footerPhone) {
		$email = "mobiusweb.swin@gmail.com";
		$to = $email;
		$subject = "New newsletter signup";
		$msg = "Name: ". $footerFirstName ." " . $footerLastName ."\r\n";
		$msg .= "Email:  $footerEmail \r\n";
		$msg .= "Phone:  $footerPhone \r\n";
		$headers = "From: karahouse.org.au";
		mail($to, $subject, $msg, $headers);
	}

	sendEmail($footerFirstName, $footerLastName, $footerEmail, $footerPhone);
}


echo "<script type='text/javascript'>
	alert('Thank you for registering for our newsletter')
	window.history.go(-1);
</script>";
?>
