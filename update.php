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
} else {
    $dato = $_SESSION["Date"];
}

$_SESSION["Date"] = $dato; // det er viktig at vi lagrer valgt dato som en $_SESSION variabel

if(!isset($_POST["prosjektor"])){
    $prosjektor = null;
} else {
    $prosjektor = $_POST["prosjektor"];
}
if(!isset($_POST["personer"])){
    $personer = null;
} else {
    $personer = $_POST["personer"];
}

   header("Location: index.php");

?>