<?php
session_start();
if(isset($_POST['submit']))
{
	$message = $_POST['message'];
	if(isset($_SESSION['pseudo']))
	{
		$pseudo = $_SESSION['pseudo']; 
		$randimg = $_SESSION['randimg'];
	}
	else
	{
		$pseudo = "Anonyme";
		include("../static/img/animal/listeimg.php");
		$randimg = count($listimg) -1;
	}
	
	$date = date("d/m/Y H:i");
	$fp = fopen('../db/messages.txt', 'a+');
	if($fp)
	{
		$text = $pseudo . "," . $randimg . "," . $date . "," . $message . "\r\n";
		fwrite($fp, $text);
		file_put_contents('../db/last.txt', $pseudo . "," . $date);
		fclose($fp);
	}
}
?>