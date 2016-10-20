<?php
/*
TO DO LIST:
-interdire caractère spéciaux pour le login
-interdire les virgules et plein de caractères suceptibles d'avoir un effet sur le code

BONUS:
-vérifier validité mail
-vérifier adresse IP ou ajouter un captcha
*/

if(isset($_POST['submit']))
{
	#print_r($_POST);
	echo "<html><head><title>ZZchat - Erreur</title><link rel=\"stylesheet\" type=\"text/css\" href=\"../static/css/errstyle.css\"/></head>";
	echo "<body><img src=\"../static/img/cross.png\"><h1 class=\"erreur\">Erreur</h1>";
	
	$username = $_POST['username'];
	$password = $_POST['password'];	
	$cpassword = $_POST['cpassword'];	
	$mail = $_POST['mail'];
	
	if(empty($username) || empty($password) || empty($cpassword) || empty($mail))
	{
		echo "<p>Tous les champs doivent être complétés.</p>";
	}
	else
	{
		if($password != $cpassword)
		{
			echo "<p>Les mots de passe que vous avez entrés sont différents.</p>";
		}
		else
		{
			if($username == $password)
			{
				echo "<p>Le login doit être différent du mot de passe.</p>";
			}
			elseif(strlen($password) < 8)
			{
				echo "<p>Le mot de passe doit contenir au moins 8 caractères</p>";
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
						echo "<p>$liste[0] et $username: $exist</p>";
					}
					
					if($exist == 1)
					{
						echo "<p>Ce login n'est pas disponible</p>";
					}
					else
					{
						$text = $username . "," . $password . "," . $mail . "\r\n";
						fwrite($fp, $text);
						fclose($fp);
						header("Location: ../static/html/index.html");
					}
				}
				else
				{
					#error opening the file
				}
			}
		}
	}
	echo "<a href=\"../static/html/inscription.html\">Retour inscription</a><br>";
	echo "<a href=\"../static/html/index.html\">Retour acceuil</a>";
	echo "</body></html>";
}
?>

