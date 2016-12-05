<!doctype html>
<?php include("../set_lang.php");//This permit to display the chat with the good language ?> 
<!-- This page display to the user the page where he can enter his username and his password to log in. -->
<html>
	<head>
		<title><?php echo $connexion_titre ?></title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="../../static/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="../../static/css/style.css" />
	</head>
	<body>
		<?php 
			include("../html/header.php");//This permit to display the header with the connected users, the registered users, the flags which permits to choose the language...
			
			if(isset($_SESSION['pseudo']))/*If the user is already connected we will display : You are already connected*/ {
				echo "<br><br><center><p>$connexion_dejaco</p></center>";}
			else//The user is not already connected
			{
				include("../html/toconnect.php");}//He can enter his username and his password
		?>
		
		<script src="../../static/js/bootstrap.js" type="text/javascript"></script>
	</body>
</html>
