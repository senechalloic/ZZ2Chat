		<p class="linebreak"></p>
		<div class="container">
			<center>
				<div class="row header">
					<div class="col-md-4">
						<br>
						
						
						
						<?php
							#print_r($_SESSION);  #AFFICHER CA: pour comprendre le système de session et de connexion du site.
							$nbrcon = 0;
							$strcon = '';
							$nbrins = 0;
							$strins = '';
							
							$fp = fopen('../../db/users.txt', 'r');
							$fp2 = fopen('../../db/online.txt', 'r');
							
							if($fp && $fp2) 
							{
								while(($line = fgets($fp)) !== false)
								{
									$liste = explode(',', $line);
									$strins .= "<a href=\"../page/profile.php?pseudo=$liste[0]\">$liste[0]</a>, ";
									$nbrins += 1;
								}
								while(($line = fgets($fp2)) !== false)
								{
									$strcon .= "<a href=\"../page/profile.php?pseudo=$line\">$line</a>, ";
									$nbrcon += 1;
								}
							}
							else {
								$strcon = "Erreur serveur";
								$strins = "Erreur serveur";
							}
							$strins = substr($strins, 0, -2);
							$strcon = substr($strcon, 0, -2);
							echo "<p class=\"left\"> $nbrins $header_registered: $strins</p>";
							echo "<p class=\"left\"> $nbrcon $header_connected: $strcon</p>";
						?>
						
					</div>
					<div class="col-md-4">
						<a href="../change_lang_fr.php"><img src="../../static/img/drap-fr.png" class="drap" alt="drap-fr"></a>
						<a href="../page/index.php"><img src="../../static/img/chat.png" class="logo" alt="logo ZZchat"></a>
						<a href="../change_lang_en.php"><img src="../../static/img/drap-en.png" class="drap" alt="drap-en"></a>
						
						<audio controls>  <!-- style="display:none" autoplay-->
						<?php
							include("../../static/music/listemp3.php");
							$nbrmp3 = count($listmp3)-1;
							$randmp3 = rand(0,$nbrmp3);
							echo "<source src=\"../../static/music/$listmp3[$randmp3]\" type=\"audio/mpeg\">";
						?>
						</audio>
					</div>
					<div class="col-md-4">
						<br><br>
						<p><?php echo $header_welcome1 ?></p>
						<p><?php echo $header_welcome2 ?></p>
					</div>
				</div>
				<?php 
				if(isset($_SESSION['pseudo'])){
					include("../html/menuCon.php"); }
				else{
					include("../html/menuDec.php"); }
				?>
			</center>
		</div>