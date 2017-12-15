<?php
	session_start();
	session_unset();
	session_destroy(); // destroy all sessions to ensure User Account secure
	header('Location:../admin.php');
	exit();
?>