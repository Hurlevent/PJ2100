<?php
require('database.php');
$database = new DB();
if(!isset($_POST["booking"])){
    header("Location: ./index.php");
}
$bookingid = $_POST["booking"];
$database->deleteBooking($bookingid);
    header("Location: ./index.php");

