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
				<script src="../../static/js/jquery-2.1.1.min.js" type="text/javascript"></script>
				
				<script language="javascript">
				
				var doscroll = 1;
				
				function scrollToBot()
				{
					var element = document.getElementById("zoneMessage");
					// alert(element.scrollHeight);
					element.scrollTop = element.scrollHeight;
					
					
					// alert(element.scrollTop - element.scrollHeight);
					
					// if(element.scrollTop - element.scrollHeight < 50)
					// {
						// element.scrollTop = element.scrollHeight;
						// alert("Scroll bitch");
					// }
					// else
					// {alert("Don't scroll bitch");}
					
					
				}
				
				function myFunction()
				{
					$.ajax({
						data: 'submit=' + 'ok' +'&message=' + document.getElementById("messageTxt").value,
						url: '../send_messages.php',
						method: 'POST',
					});
					document.getElementById('messageTxt').value='';
				}
				
				function keymyFunction(e)
				{
					if (e.keyCode == 13) 
					{
						myFunction();
					}
				}
				
				
				
				$(document).ready(function(){
					setInterval(function(){
						$("#zoneMessage").load('../zone_message.php');
					}, 2000);
				});
				
				
				</script>

				<div class="room" id="zoneMessage"></div>
				
				<div class="sendmessage">
					<p>
						<?php echo $room_envoyermess ?> :
						<input type="text" name="message" id="messageTxt" onkeypress="return keymyFunction(event)" style="border: 1px solid;font-size: 16px;padding: 5px;width: 800px;">
						<input type="button" value="<?php echo $room_submit ?> " name="submit" onclick="myFunction()">
					</p>
				</div>
			</center>
		</div>
		<script src="../../static/js/bootstrap.js" type="text/javascript"></script>
	</body>
</html>
