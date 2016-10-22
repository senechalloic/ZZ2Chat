<?php
session_start();
if(isset($_POST['submit']))
{
	$message = $_POST['message'];
	$pseudo = "Jackie";  #utiliser le $_SESSION['pseudo']
	$date = time();
	
	$fp = fopen('../db/messages.txt', 'a+');
	
	if($fp)
	{
		$text = $pseudo . "," . $date . "," . $message . "\r\n";
		fwrite($fp, $text);
	}
	header("Location: page/room.php");
}
?>