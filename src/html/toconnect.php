		<div>
			<center>
				<br>
				<?php if (isset($_COOKIE['name']))
					{
						$sh=$_COOKIE['name'];

					}
					else
					{
						$sh="";
					}
				?>
				<form action="../login.php" method="post">
					<?php echo $toconnect_username ?>:<br>
					<input type="text" name="username" value="<?php echo $sh?>"/><br>
					<?php echo $toconnect_password ?>:<br>
					<input type="password" name="password">
					<br>
					<input type="submit" value=<?php echo $toconnect_submit ?> name="submit">
				</form>
				<a href="inscription.php"><?php echo $toconnect_lostpass ?></a>
				<br>
				<a href="inscription.php"><?php echo $toconnect_inscription ?></a>
				<br><br>
				<a href="index.php"><?php echo $toconnect_retacceuil ?></a>
			</center>
		</div>