		<p class="linebreak"></p>
		<div class="container">
			<center>
				<div class="row header">
					<div class="col-md-4">
						<br>
						
						<?php
							session_start();
							#print_r($_SESSION);  AFFICHER CA: pour comprendre le système de session et de connexion du site.
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
							echo "<p class=\"left\"> $nbrins inscrits: $strins</p>";
							echo "<p class=\"left\"> $nbrcon connectés: $strcon</p>";
						?>
						
					</div>
					<div class="col-md-4">
						<a href="index.php"><img src="../../static/img/chat.png" class="logo" alt="logo ZZchat"></a>
					</div>
					<div class="col-md-4">
						<br><br>
						<p>Bienvenue dans le grand chat</p>
						<p>Chat actif ouvert à tous.</p>
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