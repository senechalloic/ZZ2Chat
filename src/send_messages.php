<?php
session_start();
if(isset($_POST['submit']))
{
	$message = $_POST['message'];
	$pseudo = $_SESSION['pseudo']; 
	$randimg = $_SESSION['randimg'];
	
	$date = date("j/m/Y H:i");
	$fp = fopen('../db/messages.txt', 'a+');
	if($fp)
	{
		$text = $pseudo . "," . $randimg . "," . $date . "," . $message . "\r\n";
		fwrite($fp, $text);
		file_put_contents('../db/last.txt', $pseudo . "," . $date);
	}
	header("Location: page/room.php");
}
?>