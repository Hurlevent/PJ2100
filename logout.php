<?php
require('database.php'); // importerer classen som snakker med databasens
$database = new DB(); // Oppretter database-objekt
    session_start(); // Session objekt
    session_unset(); // fjern alle variabler
    header("Location: /"); // redirecter tilbake

?>