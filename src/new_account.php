<?php
if(isset($_POST['submit']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	$text = $username . "," . $password . "\n";
	$fp = fopen('../db/users.txt', 'a+');
	fwrite ($fp, $text);
	

	echo 'saved';
	$fclose ($fp);
	
	header('../../static/html/index.html');
	exit;
}
?>