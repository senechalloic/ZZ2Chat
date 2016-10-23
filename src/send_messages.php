<?php
session_start();
if(isset($_POST['submit']))
{
	$message = $_POST['message'];
	$pseudo = "Jackie";  #utiliser le $_SESSION['pseudo']
	#$date = date(DATE_RFC2822);
	$date = date("j/m/Y H:i");
	$randimg = rand(0,11);
	$fp = fopen('../db/messages.txt', 'a+');
	
	if($fp)
	{
		$text = $pseudo . "," . $randimg . "," . $date . "," . $message . "\r\n";
		fwrite($fp, $text);
	}
	header("Location: page/room.php");
}
?>