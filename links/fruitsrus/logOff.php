<?php if (session_id() == '') session_start();
/*
Filename: logOff.php
Author: Yeojin Song 102060145
Date Created: 21 March 2018
Last Updated:
Description: logOff .
*/
// unset and destroy all session variables
$_SESSION = array();
session_destroy();
// return to displaySessionVariables file
header("Location: index.php");
// force the exit from this file if return fails
exit();
?>