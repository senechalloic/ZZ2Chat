<?php
Class cipherTest extends PHPUnit_Framework_TestCase
{

	public function setUp()
	{
		require_once 'cipher.php';
		require_once 'decipher.php';
    }

    public function test()
    {
    	$phrase = "ieufhjduhfkdhfhdfjjdenfjedhfbedhbfhjdehgfheuhfjenfheufhjuehfjehufheuh";
    	$phrasecryptee =cipher($phrase);
    	$phrasedecryptee = decipher($phrasecryptee);
    	$this-> assertEquals($phrasedecryptee,$phrase);

    }









}




?>