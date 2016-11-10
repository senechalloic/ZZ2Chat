<script type='text/javascript'>
var userLang = navigator.userLanguage || navigator.language; 
</script>

<?php

session_start();

if(!isset($_SESSION['lang']))
{
	// $_COOKIE['lang'] =  "<script>document.writeln(userLang);</script>";
	$_SESSION['lang'] =  "fr";
}

if(strcmp($_SESSION['lang'],"fr") == 0)
{
	if(file_exists("../lang/fr_lang.php"))
	{
		include("../lang/fr_lang.php");
	}
	if(file_exists("lang/fr_lang.php"))
	{
		include("lang/fr_lang.php");
	}
}

if(strcmp($_SESSION['lang'],"en") == 0)
{
	if(file_exists("../lang/en_lang.php"))
	{
		include("../lang/en_lang.php");
	}
	if(file_exists("lang/en_lang.php"))
	{
		include("lang/en_lang.php");
	}
}

?>