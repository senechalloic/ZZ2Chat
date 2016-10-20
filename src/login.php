<?php
if(isset($_POST['submit']))
{
	#print_r($_POST);
	echo "<html><head><title>ZZchat - Erreur</title><link rel=\"stylesheet\" type=\"text/css\" href=\"../static/css/errstyle.css\"/></head><body>";
	#echo "<body><img src=\"../static/img/cross.png\"><h1 class=\"succes\">Erreur</h1>";
	
	$username = $_POST['username'];
	$password = $_POST['password'];	
	
	if(empty($username) || empty($password))
	{
		
		echo "<img src=\"../static/img/cross.png\"><h1 class=\"erreur\">Erreur</h1>";
		echo "<p>Tous les champs doivent être complétés.</p>";
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
				if($password == $liste[1])
				{
					echo "<img src=\"../static/img/ok.png\"><h1 class=\"succes\">Connecté</h1>";
					echo "<p>Vous êtes connectés, amusez-vous!</p>";
				}
				else
				{
					echo "<img src=\"../static/img/cross.png\"><h1 class=\"erreur\">Erreur</h1>";
					echo "<p>Le mot de passe est incorrect.</p>";
				}
			}
			else
			{
				echo "<img src=\"../static/img/cross.png\"><h1 class=\"erreur\">Erreur</h1>";
				echo "<p>Le login est incorrect.</p>";
				
				fclose($fp);
			}
		}
		else
		{
			#error opening the file
		}
	}
	echo "<a href=\"../static/html/connexion.html\">Retour connexion</a><br>";
	echo "<a href=\"../static/html/index.html\">Retour acceuil</a>";
	echo "</body></html>";
}
?>

