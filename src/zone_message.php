<?php
$fp = fopen('../db/messages.txt', 'r');
$i = 0;
$compt = 0;
if($fp)
{
	include("../static/img/animal/listeimg.php");

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
		$fp = fopen('../db/messages.txt', 'r');
		$messages = file_get_contents("../db/messages.txt");
		$messages = explode("\r\n", $messages);
		
		$messagefin = "";
		
		for ($j = $supprmessages; $j <= $maxmessages-1; $j++) {
			$messagefin .= $messages[$j] . "\r\n";
		}
		#echo "<h1>$messagefin</h1>";
		file_put_contents("../db/messages.txt", $messagefin);
	}
	fclose($fp);
}
?>

<script LANGUAGE="javascript">
scrollToBot();
</script>