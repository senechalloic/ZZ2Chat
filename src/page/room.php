<!doctype html>
<!-- This page display the room. -->
<?php include("../set_lang.php"); ?> 

<html>
	<head>
		<title><?php echo $room_titre ?> </title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="../../static/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="../../static/css/style.css" />
	</head>
	<body>
		<?php include("../html/header.php"); $modif = 1?>
		<div>
			<center>
				<script src="../../static/js/jquery-2.1.1.min.js" type="text/javascript"></script>
				
				<script language="javascript">
				
				var doscroll = 1;
				
				//Function that scroll the bar to bottom
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
				
				//Function called when the submit button is pushed
				function myFunction()
				{
					var messageFormate = document.getElementById("messageTxt").value;
					
					//We test if the formating boxes are checked
					if(document.getElementById("boldinput").checked)
					{
						messageFormate = '<b>' + messageFormate + '</b>';
					}
					if(document.getElementById("italicinput").checked)
					{
						messageFormate = '<i>' + messageFormate + '</i>';
					}
					if(document.getElementById("underlineinput").checked)
					{
						messageFormate = '<u>' + messageFormate + '</u>';
					}
					
					$.ajax({
						data: 'submit=' + 'ok' +'&message=' + messageFormate,
						url: '../send_messages.php',
						method: 'POST',
					});
					document.getElementById('messageTxt').value='';
				}
				
				//If the user push the 'Entrer' submit
				function keymyFunction(e)
				{
					if (e.keyCode == 13) 
					{
						myFunction();
					}
				}
				
				var init = 1;
				
				$(document).ready(function(){
					setInterval(function(){
						//If the program is initialized. It put the content of modif.txt into modif var.
						if(init != 1)
						{
							xmlhttp = new XMLHttpRequest();
					        xmlhttp.open("GET","../../db/modif.txt",false);
							xmlhttp.send(null);
							modif = xmlhttp.responseText;
							
						}
						//Init the modif to 1 for the site to reload on first oppening
						else
						{
							var modif = 1;
							init = 0;
						}
						console.log(modif);
						if(modif == 1)
						{
							$("#zoneMessage").load('../zone_message.php');
							$("#script_modif_to_0").load('../set_modif_to_0.php');
						}
						else
						{
							console.log("no modif");
						}
					}, 2000);
				});
				
				
				</script>

				<div class="room" id="zoneMessage"></div>
				<div id="script_modif_to_0"></div>  <!-- style="display: none;" -->
				
				
				<div class="sendmessage">
					<p>
						<?php echo $room_envoyermess ?> :
						<input type="text" name="message" id="messageTxt" onkeypress="return keymyFunction(event)" style="border: 1px solid;font-size: 16px;padding: 5px;width: 600px;">
						<img src="../../static/img/bold.png" alt="bold icon">
						<input type="checkbox" id="boldinput" checked="checked">
						<img src="../../static/img/italic.png" alt="italic icon">
						<input type="checkbox" id="italicinput">
						<img src="../../static/img/underline.png" alt="underline icon">
						<input type="checkbox" id="underlineinput">
						<input type="button" value="<?php echo $room_submit ?> " name="submit" onclick="myFunction()">
					</p>
				</div>
			</center>
		</div>
		<script src="../../static/js/bootstrap.js" type="text/javascript"></script>
	</body>
</html>
