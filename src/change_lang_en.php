<?php
    #This function permit to display the chat in english when the user click on the american flag
	session_start();
	$_SESSION['lang'] = "en"; // We put the language on english
	header("Location: page/index.php");
?>