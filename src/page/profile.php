<!doctype html>
<?php include("../set_lang.php"); ?>

<html>
	<head>
		<title>ZZchat</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="../../static/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="../../static/css/style.css" />
	</head>
	<body>
		<?php 
		
		/*
		Mail visible:
					<input type="checkbox" name="showmail"><br>
		*/
		
		
		include("../html/header.php");
		$listimg = array("bird.png", "chick.png", "crab.png", "fox.png", "hippopotamus.png", "koala.png", "penguin.png", "piranha.png", "spider.png", "squirrel.png", "tiger.png", "whale.png");
		if(isset($_GET['pseudo']))
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
					echo  " <p class= \"imageprofile\"> <img src=\"../../static/img/animal/$randimg2\" style=\"height:120px;width:auto;$\"> </p> <p class=\"profile\">  </br> </br> $pseudoprofile : $pseudo1 </br> </br> $mailprofile : $mail2 </br> </br> $inscritprofile: $dateins2 </p> " ;

				}
			}
		}
		elseif(isset($_SESSION['pseudo']))
		{

			$pseudo = $_SESSION['pseudo'];
			$rand = $_SESSION['randimg'];
			$mail = $_SESSION['mail'];
			$dateins = $_SESSION['dateins'];
			$lastaction = $_SESSION['lastaction'];
			$randimg = $listimg[$rand];

			

			echo  "<p class= \"imageprofile\"> <img src=\"../../static/img/animal/$randimg\" style=\"height:120px;width:auto;$\"> </p> <p class=\"profile\">  </br> </br> $pseudoprofile : $pseudo </br> </br> $mailprofile : $mail </br> </br> $inscritprofile : $dateins </br> </br> $lastactionprofile: $lastaction  </p> "  ;
		}
		else
		{
			echo"Connectez Vous";
		}
		
		
		
		?>
		<script src="../../static/js/bootstrap.js" type="text/javascript"></script>
	</body>
</html>
