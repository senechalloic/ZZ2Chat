<?php
session_start ();
		$_SESSION['login'] = "david";
		$_POST['message'] = "test";
require_once ('send_messages.php');
use PHPUnit\Framework\TestCase;
class test extends PHPUnit_Framework_TestCase
{
	public function testWriteInFile()
	{
		require_once ('send_messages.php');
		$test = "david::4::11/12/2016 14:06::test";
		$tab = file('../db/messages.txt');
		$der_ligne = $tab[count($tab)-1];
		$this->assertContains($test, $der_ligne);
	}

}

?>