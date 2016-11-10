<?php
	session_start();
	$_SESSION['lang'] = "fr";
	header("Location: page/index.php");
?>