<?php  if (session_id() =='') session_start();
/*
Filename: killSessionVariables.php
Author: Yeojin Song 102060145
Date Created: 21 March 2018
Last Updated:
Description: Kills the current session's variables (use
for development and testing purposes only).
*/
// unset and destroy all session variables
$_SESSION = array();
session_destroy();
// return to displaySessionVariables file
header("Location: displaySessionVariables.php");
// force the exit from this file if return fails
exit();
?>