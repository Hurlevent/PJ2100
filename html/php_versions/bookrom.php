<?php
require("database.php");
$database = new DB();
session_start();
$user = $_SESSION["Username"];
$room = $_POST["room"];
$from = $_POST["from"];
$to = $_POST["to"];
$totime = $_POST["totime"];
$fromtime = $_POST["fromtime"];

$database->rentRoom($user, $room, $from, $fromtime, $to, $totime);
header("Location: desktop_home.php");
/*
$sql = "SELECT BrukerID FROM Brukere WHERE Navn = '$user'";
$result = $database->connection->query($sql);
$id = $result->fetch_assoc();
$sql = "SELECT RomID FROM Grupperom WHERE RomNavn = '$room'";
$result = $database->connection->query($sql);
$roomID = $result->fetch_assoc();
echo "INSERT INTO Booking VALUES (NULL, " . $id['BrukerID'] . ", STR_TO_DATE('" . $from . "', '%Y-%m-%d'), STR_TO_DATE('" . $to . "', '%Y-%m-%d'), " . $roomID['RomID'] . ");";
?>
<br />
<a href="/~eftoli14/PJ2100/desktop_home.php">Tilbake til hovedsiden</a>
*/