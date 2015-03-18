<?php
require("database.php");
$database = new DB();
session_start();
$dato;
$prosjektor;
$personer;

// setter default dato til dagens, om bruker ikke registrerte en spesifik dato
if(isset($_POST["dato"])){
    $dato = $_POST["dato"];
}

if(!$dato){
    $dato = $_SESSION["Date"];
}

$_SESSION["Date"] = $dato; // det er viktig at vi lagrer valgt dato som en $_SESSION variabel

// finner ut hvilken prosjektor-tilkobling som ble valgt
if(!isset($_POST["prosjektor"])){
    $prosjektor = null;
} else {
    $prosjektor = $_POST["prosjektor"];
    setcookie("Prosjektor", $prosjektor, time() + 3600);
}
// finner ut hvor mange personer det burde være plass til
if(!isset($_POST["capacity"])){
    $personer = null;
} else {
    $personer = $_POST["capacity"];
    setcookie("Capacity", $personer, time() + 3600);
}

    header("Location: index.php");

// kun for debugging
echo "<br />Prosjektor: " . $prosjektor;
echo "<br />Personer: " . $personer;
echo "<br />Dato: " . $dato;

?>