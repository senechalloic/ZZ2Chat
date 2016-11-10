<!doctype html>
<?php include("set_lang.php"); ?> 

<html>
	<head>
		<title><?php echo $logout_titre ?></title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="../static/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="../static/css/errstyle.css"/>
	</head>
	<body>
	
		<?php
		
		
		file_put_contents("../db/online.txt", str_replace($_SESSION['pseudo'] . "\r\n", "", file_get_contents("../db/online.txt")));

		
		session_destroy();
		?>

		<p><?php echo $logout_aurevoir ?> <img src="../static/img/goodbye.png"></p>
		<br><br><br><br><br>
		<a href="page/index.php"><?php echo $logout_retacceuil ?></a>
	</body>
</html>