<!doctype html>
<?php include("set_lang.php");//This permit to load the page in the good language ?> 

<html>
	<head>
		<title><?php echo $logout_titre ?></title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="../static/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="../static/css/errstyle.css"/>
	</head>
	<body>
	
		<?php
		#This Function permit to disconnect the user
		
		file_put_contents("../db/online.txt", str_replace($_SESSION['pseudo'] . "\r\n", "", file_get_contents("../db/online.txt"))); //The user will disappear of the online users list
        setcookie("name",$_SESSION['pseudo'],time() + 365*24*3600); //We save the username of the last user connected on the web browser thanks to a Cookie 
		
		session_unset();
		session_destroy();
		?>

		<p><?php echo $logout_aurevoir ?> <img src="../static/img/goodbye.png"></p>
		<br><br><br><br><br>
		<a href="page/index.php"><?php echo $logout_retacceuil ?></a>
	</body>
</html>