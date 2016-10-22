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
				<div class="room" style="width:87%">
				<?php
					$fp = fopen('../../db/messages.txt', 'r');
	
					if($fp)
					{
						while(($line = fgets($fp)) !== false)
						{
							$liste = explode(',', $line);
							echo "<p>$liste[0][$liste[1]]: $liste[2]</p>";
						}
					}
				?>
				<form action="../send_messages.php" method="post">
					<p>Send message:
						<input type="text" name="message" style="border: 1px solid;font-size: 16px;padding: 5px;width: 800px;">
						<input type="submit" value="Envoyer" name="submit">
					</p>
				</form>
				</div>
			</center>
		</div>
		<script src="../../static/js/bootstrap.js" type="text/javascript"></script>
	</body>
</html>
