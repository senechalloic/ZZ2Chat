<!doctype html>
<html>
	<head>
		<title>ZZchat</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="../../static/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="../../static/css/style.css" />
	</head>
	<body>
		<?php include("../html/header.php"); ?>
		<div>
			<center>
				<br>
				
				<p>Bienvenue dans le grand chat</p>
				<p>Chat actif ouvert à tous.</p>
				
				<br><br><br><br><br><br>
				
				<?php
				$last = file_get_contents("../../db/last.txt");
				if($last != '')
				{
					$liste = explode(',', $last);
					echo "<b><p>Dernier message de: </b><a href=\"profile.php?pseudo=$liste[0]\">$liste[0]</a> à <i>$liste[1]</i></p>";
				}
				else
				{
					echo "<p>Pas encore de messages</p>";
				}
				?>
				
				<img src="../../static/img/isima.png" class="left" alt="logo de l'ISIMA" id="logoisima">
				<p class="credit">Par Nassim Rahmani(narahmani@fc.isima.fr) & Loïc Sénéchal(losenecha@fc.isima.fr)</p>
				<p class="credit">Projet de 2ème année: 2016 - 2017</p>
			</center>
		</div>
		<script src="../../static/js/bootstrap.js" type="text/javascript"></script>
	</body>
</html>
