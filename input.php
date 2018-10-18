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


$user_name = "root";
$password = "12345678";
$database = "school";
$server = "localhost";

$conn = new mysqli("$server","$user_name","$password","$database");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$firstname = $_POST['firstname'];
$lastname =  $_POST['lastname'];
$address = $_POST['adress'];
$postal_code = $_POST['postalcode'];
$residence = $_POST['residence'];
$birthdate = $_POST['birthdate'];
$phonenr = $_POST['phonenr'];
$e_mail = $_POST['email'];


$sql = "INSERT INTO tabel ( naam, achternaam, adres, postcode, woonplaats, geb_datum, phonenr, email ) VALUES ('$firstname','$lastname','$address','$postal_code','$residence','$birthdate',''$phonenr','$e_mail')";


if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>