<?php
    $username = $_POST['username'];
    $password = $_POST['password'];
    $filename = '../db/users.txt';
    $fp = fopen($filename, 'a+');
    fwrite ($fp, $username . "," . $password . "\n");
    $fclose ($fp);
    echo ("account created");
    header("Location: "login.html"); 
    die();
?>