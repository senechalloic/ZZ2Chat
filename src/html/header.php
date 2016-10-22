		<br>
		<div class="container">
			<center>
				<div class="row header">
					<div class="col-md-4">
						<br>
						
						<?php
						
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
									$strins .= "<a href=\"../page/connexion.php\">$liste[0]</a>, ";
									$nbrins += 1;
								}
								while(($line = fgets($fp2)) !== false)
								{
									$strcon .= "<a href=\"../page/connexion.php\">$line</a>, ";
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
							<img src="../../static/img/chat.png" style="background-image" alt="plus de chat">
						</div>
					<div class="col-md-4">
						<br><br>
						<p>Bienvenue dans le grand chat</p>
						<p>Chat actif ouvert à tous.</p>
						<a href="../page/room.php">Salle de discussion public</a>
					</div>
				</div>
				<br>
			</center>
		</div>