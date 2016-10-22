<!doctype html>
<html>
	<head>
		<title>Connexion - ZZchat</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="../../static/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="../../static/css/style.css" />
	</head>
	<body>
		<?php include("../html/header.php"); ?>
		<div>
			<center>
				<br>
				<form action="../login.php" method="post">
					Username:<br>
					<input type="text" name="username"><br>
					Password:<br>
					<input type="password" name="password">
					<br>
					<input type="submit" value="Soumettre" name="submit">
				</form>
				<a href="inscription.php">Mot de passe perdu</a>
				<br>
				<a href="inscription.php">Inscription</a>
				<br><br>
				<a href="index.php">Retour à l'acceuil</a>
			</center>
		</div>
		<script src="../../static/js/bootstrap.js" type="text/javascript"></script>
	</body>
</html>
