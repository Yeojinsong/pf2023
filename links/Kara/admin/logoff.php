<?php if (session_id() == '') session_start();
// unset and destroy all session variables
$_SESSION = array();
session_destroy();
// return to displaySessionVariables file
header("Location: index.php");
// force the exit from this file if return fails
exit();
?>