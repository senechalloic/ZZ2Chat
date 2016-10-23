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
				<div class="room" id="zoneMessage">
					<?php
						$fp = fopen('../../db/messages.txt', 'r');
						$i = 0;
						if($fp)
						{
							$listimg = array("bird.png", "chick.png", "crab.png", "fox.png", "hippopotamus.png", "koala.png", "penguin.png", "piranha.png", "spider.png", "squirrel.png", "tiger.png", "whale.png");
							
							while(($line = fgets($fp)) !== false)
							{
								$liste = explode(',', $line);
								$randimg = $listimg[$liste[1]];
								
								if($i == 0){
									echo "<p class=\"left\" style=\"background-color:#AAAADD\">-<img src=\"../../static/img/animal/$randimg\" style=\"height:30px;width:auto;$\">-<b> $liste[0]</b><i>[$liste[2]]</i>: $liste[3]</p>"; 
									$i += 1;
								}
								else{
									echo "<p class=\"left\" style=\"background-color:#A0A0A0\">-<img src=\"../../static/img/animal/$randimg\" style=\"height:30px;width:auto;$\">-<b> $liste[0]<i></b>[$liste[2]]</i>: $liste[3]</p>"; 
									$i = 0;
								}
							}
						}
					?>
				</div>
				<script>
					var element = document.getElementById("zoneMessage");
					element.scrollTop = element.scrollHeight;
				</script>
				<div class="sendmessage">
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
