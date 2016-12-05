<!doctype html>
<?php include("../set_lang.php");//This permit to display the chat with the good language ?> 

<html><!--On this page the user can register. He can enter his username his password... -->
	<head>
		<title><?php echo $inscription_titre ?></title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="../../static/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="../../static/css/style.css" />
	</head>
	<body>
		<?php include("../html/header.php");//This permit to display the header with the connected users, the registered users, the flags which permits to choose the language... ?>
		<div>
			<center>
				<br>
				<form action="../new_account.php" method="post">
					<?php echo $inscription_username ?>:<br>
					<input type="text" name="username"><br>
					<?php echo $inscription_password ?>:<br>
					<input type="password" name="password"><br>
					<?php echo $inscription_confpassword ?>:<br>										<!--Fields where the user can enter his username, password ... -->
					<input type="password" name="cpassword"><br>
					<?php echo $inscription_mail ?>:<br>
					<input type="text" name="mail"><br><br>
					<img src="../captcha.php" alt="captcha" id="captcha"/><br>
					<?php echo $inscription_captchainstr ?>:<br>
					<input type="text" name="captcha"><br>
					<input type="submit" value=<?php echo $inscription_submit ?> name="submit">
				</form>
				<br>
				<a href="index.php"><?php echo $inscription_retacceuil ?></a>
			</center>
		</div>
		<script src="../../static/js/bootstrap.js" type="text/javascript"></script>
	</body>
</html>
