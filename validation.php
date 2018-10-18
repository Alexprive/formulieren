<?php

$firstname_error = $lastname_error = $adress_error = $postalcode_error = $residence_error = $birthdate_error = $email_error = $phone_error = "";
$firstname = $lastname = $adress = $postalcode = $residence = $birthdate =  $phonenr = $email = $success = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["firstname"])) {
        $firstname_error = "Firstname is required";
    } else {
        $firstname = test_input($_POST["firstname"]);
        // check if firstname only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $firstname)) {
            $firstname_error = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["lastname"])) {
        $lastname_error = "Lastname is required";
    } else {
        $lastname = test_input($_POST["lastname"]);
        // check if lastname only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $lastname)) {
            $lastname_error = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["adress"])) {
        $adress_error = "Adress is required";
    } else {
        $adress = test_input($_POST["adress"]);
        // check if adress only contains letters numbers and whitespace
        if (!preg_match("/^[a-zA-Z0-9]*$/", $adress)) {
            $adress_error = "Only letters numbers and white space allowed";
        }
    }

    if (empty($_POST["postalcode"])) {
        $postalcode_error = "Postalcode is required";
    } else {
        $postalcode = test_input($_POST["postalcode"]);
        // check if postalcode only contains letters numbers and whitespace
        if (!preg_match("/^[a-zA-Z0-9]*$/", $postalcode)) {
            $postalcode_error = "Only letters numbers and white space allowed";
        }
    }

    if (empty($_POST["residence"])) {
        $residence_error = "Residence is required";
    } else {
        $residence = test_input($_POST["residence"]);
        // check if residence only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $residence)) {
            $residence_error = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["birthdate"])) {
        $birthdate_error = "Birthdate is required";
    } else {
        $birthdate = test_input($_POST["birthdate"]);
        // check if birthdate only contains letters and whitespace
        if (!preg_match("%\A(0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])[- /.](19|20)\d\d\z%", $birthdate)) {
            $residence_error = "Date incorrectly formated";
        }
    }

    if (empty($_POST["phonenr"])) {
        $phone_error = "Phone is required";
    } else {
        $phone = test_input($_POST["phonenr"]);
        // check if phonenumbers address is well-formed
        if (!preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i",$phonenr)){
            $phone_error = "Invalid phone number";
        }
    }

    if (empty($_POST["email"])) {
        $email_error = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_error = "Invalid email format";
        }
    }

    if ($name_error == '' and $email_error == '' and $phone_error == ''){

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


        $sql = "INSERT INTO school ( naam, achternaam, adres, postcode, woonplaats, geb_datum, phonenr, email ) VALUES ('$firstname','$lastname','$address','$postal_code','$residence','$birthdate',''$phonenr','$e_mail')";


        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
