<?php

// Report simple running errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Reporting E_NOTICE can be good too (to report uninitialized
// variables or catch variable name misspellings ...)
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);

// Report all PHP errors (see changelog)
error_reporting(E_ALL);

// Report all PHP errors
error_reporting(-1);

// Same as error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);

if(isset($_POST['submit'])) {
    $name = $_POST['naam'];
    $lastname = $_POST['achternaam'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $mailto = "prive4071@gmail.com";
    $header = "From: ".$email;
    $text = "U heeft een bericht ontvangen van:".$name;

    mail($mailto, $subject, $text, $header);
    header("Location: index.html");

    /*echo $text . "<br />";
    echo $name . "<br />";
    echo $lastname . "<br />";
    echo $email . "<br />";
    echo $subject . "<br />";
    echo $message . "<br />";
    echo $mailto . "<br />";
    echo $header . "<br />";*/

}