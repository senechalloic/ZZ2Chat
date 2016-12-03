<?php
#This function permit to send a message
session_start();
if(isset($_POST['submit']))// We verify that the user has entered a message
{
	$message = $_POST['message'];
	if(isset($_SESSION['pseudo']))// A connected user send the message
	{
		$pseudo = $_SESSION['pseudo']; 
		$randimg = $_SESSION['randimg'];
	}
	else//An anonymous send the message
	{
		$pseudo = "Anonyme";
		include("../static/img/animal/listeimg.php");
		$randimg = count($listimg) -1;
	}
	
	$date = date("d/m/Y H:i");
	$fp = fopen('../db/messages.txt', 'a+');
	if($fp)//We update the last action and save the new message on the file messages.txt
	{
		$text = $pseudo . "," . $randimg . "," . $date . "," . $message . "\r\n";
		fwrite($fp, $text);
		file_put_contents('../db/last.txt', $pseudo . "," . $date);
		file_put_contents('../db/modif.txt', '1');
		fclose($fp);
	}
}
?>