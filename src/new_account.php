<html>
	<head>
		<title>ZZchat</title>
		<link rel="stylesheet" type="text/css" href="../static/css/errstyle.css"/>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
	</head>
	<body>

<?php
/*
TO DO LIST:
-interdire caractère spéciaux pour le login
-interdire les virgules et plein de caractères suceptibles d'avoir un effet sur le code

BONUS:
-vérifier validité mail
*/

include("func/cipher.php");

if(isset($_POST['submit']))
{
	session_start();
	print_r($_POST);
	print_r($_SESSION);

	$succes = 1;
	$errmsg = '';
	
	$username = $_POST['username'];
	$password = $_POST['password'];	
	$cpassword = $_POST['cpassword'];	
	$mail = $_POST['mail'];
	$showmail = $_POST['showmail'];
	$captcha = $_POST['captcha'];
	$realcaptcha = $_SESSION['captcha'];
	
	if(empty($username) || empty($password) || empty($cpassword) || empty($mail) || empty($captcha))
	{
		$succes = 0;
		$errmsg = "Tous les champs doivent être complétés.";
	}
	else
	{
		if(strtoupper($captcha) != strtoupper($realcaptcha))
		{
			$succes = 0;
			$errmsg = "Le captcha est incorrect.";
		}
		else
		{
			if($password != $cpassword)
			{
				$succes = 0;
				$errmsg = "Les mots de passe que vous avez entrés sont différents.";
			}
			else
			{
				if($username == $password)
				{
					$succes = 0;
					$errmsg = "Le login doit être différent du mot de passe.";
				}
				elseif(strlen($password) < 8)
				{
					$succes = 0;
					$errmsg = "Le mot de passe doit contenir au moins 8 caractères";
				}
				else
				{
					$exist = 0; #On suppose que le login n'existe pas
					$fp = fopen('../db/users.txt', 'a+');
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
							$succes = 0;
							$errmsg = "Ce login n'est pas disponible";
						}
						else
						{
							$randimg = rand(0,11);
							$dateins = date("j/m/Y");
							$text = $username . "," . cipher($password) . "," . $mail . "," . $dateins . "," . $randimg . "," . $showmail . "\r\n";
							fwrite($fp, $text);
						}
					fclose($fp);
					}
					else
					{
						$succes = 0;
						$errmsg = "Impossible de créer de comptes pour le moment.";
					}
				}
			}
		}
	}
	
	session_destroy();
	
	if($succes == 1)
	{
		echo "<img src=\"../static/img/ok.png\"><h1 class=\"succes\">Inscrit</h1>";
		echo "<p>Bienvenue sur la ZZchat $username!</p><p>Votre compte a bien été créé</p><br>";
		session_start();
		$_SESSION['pseudo'] = $username;
		$_SESSION['mail'] = $mail;
		$_SESSION['dateins'] = $dateins;
		$_SESSION['randimg'] = $randimg;
		#$_SESSION['showmail'] = $showmail;
		
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
		
		echo "<a href=\"page/inscription.php\">Retour inscription</a><br>";
	}
	
	
}


?>

		
		<a href="page/index.php">Retour acceuil</a>
	</body>
</html>