<!doctype html>
<?php include("../set_lang.php"); ?> 

<html>
	<head>
		<title><?php echo $connexion_titre ?></title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="../../static/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="../../static/css/style.css" />
	</head>
	<body>
		<?php 
			include("../html/header.php");
			
			if(isset($_SESSION['pseudo'])){
				echo "<br><br><center><p>$connexion_dejaco</p></center>";}
			else {
				include("../html/toconnect.php"); }
		?>
		
		<script src="../../static/js/bootstrap.js" type="text/javascript"></script>
	</body>
</html>
