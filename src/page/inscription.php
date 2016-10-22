<!doctype html>
<html>
	<head>
		<title>Inscription - ZZchat</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="../../static/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="../../static/css/style.css" />
	</head>
	<body>
		<?php include("../html/header.php"); ?>
		<div>
			<center>
				<br>
				<form action="../new_account.php" method="post">
					Username:<br>
					<input type="text" name="username"><br>
					Password:<br>
					<input type="password" name="password"><br>
					Confirm password:<br>
					<input type="password" name="cpassword"><br>
					Mail adress:<br>
					<input type="text" name="mail"><br><br>
					<img src="../captcha.php" alt="captcha" id="captcha"/> <br>
					Type these letters:<br>
					<input type="text" name="captcha"><br>
					<input type="submit" value="Soumettre" name="submit">
				</form>
				<br>
				<a href="index.php">Retour à l'acceuil</a>
			</center>
		</div>
		<script src="../../static/js/bootstrap.js" type="text/javascript"></script>
	</body>
</html>
