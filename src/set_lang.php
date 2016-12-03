<script type='text/javascript'>
var userLang = navigator.userLanguage || navigator.language; 
</script>

<?php
#This function permit to put the chat in french or in english, The user can click on the french flag to get the chat in french or on the american one to get the chat in english.
#The default language is french.

session_start();

#We put the default language in french
if(!isset($_SESSION['lang']))
{
	// $_COOKIE['lang'] =  "<script>document.writeln(userLang);</script>";
	$_SESSION['lang'] =  "fr";
}

#The user choose  french language
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
#The user choose english language
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