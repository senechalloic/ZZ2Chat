<!doctype html>
<?php include("set_lang.php");//This permit to display the chat with the good language ?> 

<html>
	<head>
		<title><?php echo $login_titre ?></title>
		<link rel="stylesheet" type="text/css" href="../static/css/errstyle.css"/>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
	</head>
	<body>

<?php
#This function permit to a person who is registered to log in and use the chat
#Redirection automatique au bout de 5sec?

include("func/decipher.php");

if(isset($_POST['submit']))
{
	#print_r($_POST);
	$succes = 1;
	$errmsg = '';
	
	$username = $_POST['username'];
	$password = $_POST['password'];	
	
	if(empty($username) || empty($password))// Case when the user doesn't have entered the username or the password or both, We display an error message
	{
		$succes = 0;
		$errmsg = $login_err_champincomp;
	}
	else// The user have entered the username and the password, we will verify his identity
	{
		$exist = 0; #We suppose that the username does not exist
		$fp = fopen('../db/users.txt', 'r');
		if($fp)
		{
			while(($line = fgets($fp)) !== false && $exist == 0)
			{
				$liste = explode('::', $line);
				if($liste[0] == $username)//The user has entered a username which is registered 
				{
					$exist = 1;
				}
				#echo "<p>$liste[0] et $username: $exist</p>";
			}
						
			if($exist == 1)
			{
				if($password != decipher($liste[1]))// The password is wrong, We display an error message
				{
					$succes = 0;
					$errmsg = $login_err_wrongmdp;
				}
			}
			else
			{
				$succes = 0;
				$errmsg = $login_err_wronglogin;// The username is not registered, We display an error message
				
				fclose($fp);
			}
		}
		else
		{
			#error opening the file
		}
	}
	
	if($succes == 1)// The username and the password are correct, We display a favorable message and the user is connected
	{
		echo "<img src=\"../static/img/ok.png\"><h1 class=\"succes\">$login_connected</h1>";
		echo "<p>$login_connectedmessage</p><br>";

		$_SESSION['pseudo'] = $username;
		$_SESSION['mail'] = $liste[2];
		$_SESSION['dateins'] = $liste[3];
		$_SESSION['randimg'] = $liste[4];
		$_SESSION['showmail'] = $liste[5];
		
		$date = date("j/m/Y H:i");
		$_SESSION['lastaction'] = $date;
		
		$fp = fopen('../db/online.txt', 'a+');//We add the user on the online users list
		if($fp)
		{
			$text = $username . "\r\n";
			fwrite($fp, $text);
			fclose($fp);
		}
	}
	else
	{
		echo "<img src=\"../static/img/cross.png\"><h1 class=\"erreur\">$login_err</h1>";
		echo "<p>$errmsg</p><br>";
		echo "<a href=\"page/connexion.php\">$login_retcon</a><br>";
	}
}
?>

		
		<a href="page/index.php"><?php echo $login_retacceuil?></a>
		
	
	</body>
</html>