<!doctype html>
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
		if(isset($_GET['pseudo']))
		{
			echo "pagepersodugar" . $_GET['pseudo'];
		}
		elseif(isset($_SESSION['pseudo']))
		{
			echo "page perso plus choix";
		}
		else
		{
			echo"co toi!";
		}
		
		
		
		?>
		<script src="../../static/js/bootstrap.js" type="text/javascript"></script>
	</body>
</html>
