<!doctype html>
<?php include("../set_lang.php"); ?> 

<html>
	<head>
		<title><?php echo $index_titre ?></title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="../../static/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="../../static/css/style.css" />
	</head>
	<body>
		<?php include("../html/header.php"); ?>
		<div>
			<center>
				<br>
				
				<p><?php echo $index_bienvenu1 ?></p>
				<p><?php echo $index_bienvenu2 ?></p>
				
				<br><br><br><br><br><br>
				
				<?php
				$last = file_get_contents("../../db/last.txt");
				if($last != '')
				{
					$liste = explode(',', $last);
					echo "<b><p>$index_derniermessage: </b><a href=\"profile.php?pseudo=$liste[0]\">$liste[0]</a> $index_a <i>$liste[1]</i></p>";
				}
				else
				{
					echo "<p>$index_pasmessages</p>";
				}
				?>
				
				<img src="../../static/img/isima.png" class="left" alt="logo de l'ISIMA" id="logoisima">
				<p class="credit"><?php echo $index_credit1 ?></p>
				<p class="credit"><?php echo $index_credit2 ?></p>
			</center>
		</div>
		<script src="../../static/js/bootstrap.js" type="text/javascript"></script>
	</body>
</html>
