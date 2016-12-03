<?php
    #This function permit to dislplay the chat in french when the user click on the french flag
	session_start();
	$_SESSION['lang'] = "fr";//We put the language on french
	header("Location: page/index.php");
?>