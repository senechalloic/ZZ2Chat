<!doctype html>
<?php include("set_lang.php"); ?> 

<html>
	<head>
		<title><?php echo $newaccount_titre ?></title>
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
	
	if(empty($username) || empty($password) || empty($cpassword) || empty($mail) || empty($captcha))
	{
		$succes = 0;
		$errmsg = $newaccount_err_champicomp;
	}
	else
	{
		if(strtoupper($captcha) != strtoupper($realcaptcha))
		{
			$succes = 0;
			$errmsg = $newaccount_err_wrongcaptcha;
		}
		else
		{
			if($password != $cpassword)
			{
				$succes = 0;
				$errmsg = $newaccount_err_wrongpassword;
			}
			else
			{
				if($username == $password)
				{
					$succes = 0;
					$errmsg = $newaccount_err_logdifpass;
				}
				elseif(strlen($password) < 8)
				{
					$succes = 0;
					$errmsg = $newaccount_err_minsize;
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
							$errmsg = $newaccount_err_loginexist;
						}
						else
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
					else
					{
						$succes = 0;
						$errmsg = $newaccount_err_accessfile;
					}
				}
			}
		}
	}
	
	session_destroy();
	
	if($succes == 1)
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