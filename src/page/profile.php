<!doctype html>
<?php include("../set_lang.php");//This permit to display the chat with the good language ?>

<html><!--This Page permit to see the profile of a user on the chat. The profile of a user is composed by his username his address mail and his date of inscription-->
	<head>
		<title>ZZchat</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="../../static/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="../../static/css/style.css" />
	</head>
	<body>
		<?php 
		include("../html/header.php");//This permit to display the header with the connected users, the registered users, the flags which permits to choose the language...
		include("../../static/img/animal/listeimg.php");
		if(isset($_GET['pseudo']))// The user want to see the profile of an other user
		{
			$username = $_GET['pseudo'];
			$fp = fopen('../../db/users.txt', 'r');
			if($fp)
			{
				while(($line = fgets($fp)) !== false && $liste[0]!=$username)
				{
					$liste = explode(',', $line);

				}
				if($line!== false)
				{
					$pseudo1=$liste[0];
					$mail2=$liste[2];
					$dateins2=$liste[3];
					$rand2=$liste[4];
					$randimg2=$listimg[$rand2];
					echo  " <p class= \"imageprofile\"> <img src=\"../../static/img/animal/$randimg2\" style=\"height:120px;width:auto;$\"> </p> <p class=\"profile\">  </br> </br> $pseudoprofile : $pseudo1 </br> </br> $mailprofile : $mail2 </br> </br> $inscritprofile: $dateins2 </p> " ;//Display of the informations

				}
			}
		}
		elseif(isset($_SESSION['pseudo']))// The user want to see hiw own profile
		{

			$pseudo = $_SESSION['pseudo'];
			$rand = $_SESSION['randimg'];
			$mail = $_SESSION['mail'];
			$dateins = $_SESSION['dateins'];
			$lastaction = $_SESSION['lastaction'];
			$randimg = $listimg[$rand];

			

			echo  "<p class= \"imageprofile\"> <img src=\"../../static/img/animal/$randimg\" style=\"height:120px;width:auto;$\"> </p> <p class=\"profile\">  </br> </br> $pseudoprofile : $pseudo </br> </br> $mailprofile : $mail </br> </br> $inscritprofile : $dateins </br> </br> $lastactionprofile: $lastaction  </p> "  ;//Display of the informations
		}
		else//The user is not connected and he wants to see his profile so we display an error message
		{
			echo "<p class=\"profile\"> $nonprofile </p> ";
		}
		
		
		
		?>
		<script src="../../static/js/bootstrap.js" type="text/javascript"></script>
	</body>
</html>
