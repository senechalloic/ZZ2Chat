<!doctype html>
<?php include("set_lang.php");//This permit to display the chat with the good language ?> 

<html>
	<head>
		<title><?php echo $newaccount_titre ?></title>
		<link rel="stylesheet" type="text/css" href="../static/css/errstyle.css"/>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
	</head>
	<body>

<?php
/*This function permit to create a new account for a user, He will give a username, a password , a mail Address and enter a captcha.His username and his password will 
be stored in a text file , the password will be crypted.
/*
TO DO LIST:
-interdire caractère spéciaux pour le login
-interdire les virgules et plein de caractères suceptibles d'avoir un effet sur le code

BONUS:
-vérifier validité mail
*/

include("func/cipher.php");//This is the function which permit to encrypt the password to store it in the text file

if(isset($_POST['submit']))
{
	#print_r($_POST);
	#print_r($_SESSION);

	$succes = 1;
	$errmsg = '';
	
	$username = $_POST['username'];
	$password = $_POST['password'];	
	$cpassword = $_POST['cpassword'];	
	$mail = $_POST['mail'];
	$captcha = $_POST['captcha'];
	$realcaptcha = $_SESSION['captcha'];
	
	if(empty($username) || empty($password) || empty($cpassword) || empty($mail) || empty($captcha))//Situation when the user doesn't has entered a username or a password or the mail or the captcha We display an error message
	{
		$succes = 0;
		$errmsg = $newaccount_err_champicomp;
	}
	else//The user has entered a username , a password, a mail and a captcha
	{
		if(strtoupper($captcha) != strtoupper($realcaptcha))//The user has entered a wrong captcha so we display an error message
		{
			$succes = 0;
			$errmsg = $newaccount_err_wrongcaptcha;
		}
		else// The user has entered the good captcha
		{
			if($password != $cpassword)//The confirmation of the password is wrong, we display an error message
			{
				$succes = 0;
				$errmsg = $newaccount_err_wrongpassword;
			}
			else// The confirmation of the password is true
			{
				if($username == $password)//If the username is similar to the password we display an error message
				{
					$succes = 0;
					$errmsg = $newaccount_err_logdifpass;
				}
				elseif(strlen($password) < 8)//If the password has less than 8 charachters we display an error message 
				{
					$succes = 0;
					$errmsg = $newaccount_err_minsize;
				}
				else// All is correct, We will add the user on the registered users list
				{
					$exist = 0; #we suppose thah the login does not exist
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
						
						if($exist == 1)// If the username is already taken we will display an error message
						{
							$succes = 0;
							$errmsg = $newaccount_err_loginexist;
						}
						else//The username is not taken so we add the user on the registered users list
						{
							include("../static/img/animal/listeimg.php");
							$nbrimg = count($listimg)-1 -1;
							$randimg = rand(0,$nbrimg);
							$dateins = date("d/m/Y");
							$text = $username . "," . cipher($password) . "," . $mail . "," . $dateins . "," . $randimg . "," . $showmail . "\r\n";
							fwrite($fp, $text);
						}
					fclose($fp);
					}
					else// The list of registered users is unaccessible
					{
						$succes = 0;
						$errmsg = $newaccount_err_accessfile;
					}
				}
			}
		}
	}
	
	session_destroy();
	
	if($succes == 1)//If all went well we display a succes message
	{
		echo "<img src=\"../static/img/ok.png\"><h1 class=\"succes\">$newaccount_inscrit</h1>";
		echo "<p>$newaccount_bienvenu1 $username!</p><p>$newaccount_bienvenu2</p><br>";
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
		echo "<img src=\"../static/img/cross.png\"><h1 class=\"erreur\">$newaccount_err</h1>";
		echo "<p>$errmsg</p><br>";
		
		echo "<a href=\"page/inscription.php\">$newaccount_retinscript</a><br>";
	}
	
	
}


?>

		
		<a href="page/index.php"><?php echo $newaccount_retacceuil ?></a>
	</body>
</html>