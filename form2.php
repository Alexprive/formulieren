<?php include('validation.php'); ?>
<link rel="stylesheet" href="style.css" type="text/css">
<div class="container">
    <form id="contact" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <h3>Leerling invoeren</h3>
        <fieldset>
            <input placeholder="Naam" type="text" name="firstname" tabindex="1" autofocus>
            <span class="error"><?= $firstname_errror ?></span>
        </fieldset>
        <fieldset>
            <input placeholder="Achternaam" type="text"  name="lastname"tabindex="2">
            <span class="error"><?= $lastname_errror ?></span>
        </fieldset>
        <fieldset>
            <input placeholder="Adres" type="text"  name="adress" tabindex="3">
            <span class="error"><?= $adress_errror ?></span>
        </fieldset>
        <fieldset>
            <input placeholder="Postcode" type="text" name="postalcode" tabindex="4">
            <span class="error"><?= $postalcode_errror ?></span>
        </fieldset>
        <fieldset>
            <input placeholder="Woonplaats" type="text" name="residence" tabindex="5">
            <span class="error"><?= $residence_errror ?></span>
        </fieldset>
        <fieldset>
            <input placeholder="Geboortedatum" type="date" name="birthdate" tabindex="6">
            <span class="error"><?= $birthdate_errror ?></span>
        </fieldset>
        <fieldset>
            <input placeholder="Telefoon nummer" type="text" name="phonenr" tabindex="7">
            <span class="error"><?= $phone_errror ?></span>
        </fieldset>
        <fieldset>
            <input placeholder="Email" type="text" name="email" tabindex="8">
            <span class="error"><?= $email_errror ?></span>
        </fieldset>
        <fieldset>
            <input placeholder="Klas" type="text" name="klas" tabindex="9">
        </fieldset>
        <fieldset>
            <button name="submit" type="submit" id="contact-submit">Submit</button>
        </fieldset>
    </form>
    </div>
</body>
</html>