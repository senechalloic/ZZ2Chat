<html>
	<head>
		<title>ZZchat</title>
		<link rel="stylesheet" type="text/css" href="../static/css/errstyle.css"/>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
	</head>
	<body>

<?php

#Redirection automatique au bout de 5sec?

include("func/decipher.php");

if(isset($_POST['submit']))
{
	#print_r($_POST);
	$succes = 1;
	$errmsg = '';
	
	$username = $_POST['username'];
	$password = $_POST['password'];	
	
	if(empty($username) || empty($password))
	{
		$succes = 0;
		$errmsg = "Tous les champs doivent être complétés.";
	}
	else
	{
		$exist = 0; #On suppose que le login n'existe pas
		$fp = fopen('../db/users.txt', 'r');
		if($fp)
		{
			while(($line = fgets($fp)) !== false && $exist == 0)
			{
				$liste = explode(',', $line);
				if($liste[0] == $username)
				{
					$exist = 1;
				}
				#echo "<p>$liste[0] et $username: $exist</p>";
			}
						
			if($exist == 1)
			{
				if($password != decipher($liste[1]))
				{
					$succes = 0;
					$errmsg = "Le mot de passe est incorrect.";
				}
			}
			else
			{
				$succes = 0;
				$errmsg = "Le login est incorrect.";
				
				fclose($fp);
			}
		}
		else
		{
			#error opening the file
		}
	}
	
	if($succes == 1)
	{
		echo "<img src=\"../static/img/ok.png\"><h1 class=\"succes\">Connecté</h1>";
		echo "<p>Vous êtes connectés, amusez-vous!</p><br>";
		session_start();
		$_SESSION['pseudo'] = $username;
		$_SESSION['mail'] = $liste[2];
		$_SESSION['dateins'] = $liste[3];
		$_SESSION['randimg'] = $liste[4];
		$_SESSION['showmail'] = $liste[5];
		
		$date = date("j/m/Y H:i");
		$_SESSION['lastaction'] = $date;
		
		$fp = fopen('../db/online.txt', 'a+');
		if($fp)
		{
			$text = $username . "\r\n";
			fwrite($fp, $text);
			fclose($fp);
		}
	}
	else
	{
		echo "<img src=\"../static/img/cross.png\"><h1 class=\"erreur\">Erreur</h1>";
		echo "<p>$errmsg</p><br>";
		echo "<a href=\"page/connexion.php\">Retour connexion</a><br>";
	}
}
?>

		
		<a href="page/index.php">Retour acceuil</a>
		
	
	</body>
</html>