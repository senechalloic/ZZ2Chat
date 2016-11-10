<!doctype html>
<?php include("../set_lang.php"); ?> 

<html>
	<head>
		<title><?php echo $room_titre ?> </title>
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
						$compt = 0;
						if($fp)
						{
							include("../../static/img/animal/listeimg.php");

							while(($line = fgets($fp)) !== false)
							{
								$liste = explode(',', $line);
								$randimg = $listimg[$liste[1]];
								
								if($i == 0){
									echo "<p class=\"left\" style=\"background-color:#AAAADD\">-<a href=\"profile.php?pseudo=$liste[0]\"><img src=\"../../static/img/animal/$randimg\" style=\"height:30px;width:auto;$\"></a>-<b> $liste[0]</b><i>[$liste[2]]</i>: $liste[3]</p>"; 
									$i += 1;
								}
								else{
									echo "<p class=\"left\" style=\"background-color:#A0A0A0\">-<a href=\"profile.php?pseudo=$liste[0]\"><img src=\"../../static/img/animal/$randimg\" style=\"height:30px;width:auto;$\"></a>-<b> $liste[0]</b><i>[$liste[2]]</i>: $liste[3]</p>"; 
									$i = 0; #A0A0A0
								}
								$compt += 1;
							}
							
							$maxmessages = 40;  #7 visibles
							$supprmessages = 20;
							
							if($compt > $maxmessages-1)
							{
								fclose($fp);
								$fp = fopen('../../db/messages.txt', 'r');
								$messages = file_get_contents("../../db/messages.txt");
								$messages = explode("\r\n", $messages);
								
								$messagefin = "";
								
								for ($j = $supprmessages; $j <= $maxmessages-1; $j++) {
									$messagefin .= $messages[$j] . "\r\n";
								}
								#echo "<h1>$messagefin</h1>";
								file_put_contents("../../db/messages.txt", $messagefin);
							}
							fclose($fp);
						}
					?>
				</div>
				<script>
					var element = document.getElementById("zoneMessage");
					element.scrollTop = element.scrollHeight;
				</script>
				<div class="sendmessage">
					<form action="../send_messages.php" method="post">
						<p><?php echo $room_envoyermess ?> :
							<input type="text" name="message" style="border: 1px solid;font-size: 16px;padding: 5px;width: 800px;">
							<input type="submit" value="<?php echo $room_submit ?> " name="submit">
						</p>
					</form>
				</div>
			</center>
		</div>
		<script src="../../static/js/bootstrap.js" type="text/javascript"></script>
	</body>
</html>
