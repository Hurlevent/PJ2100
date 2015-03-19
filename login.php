<?php

// This file is only used for redirecting and handling varables
require('database.php');
$database = new DB();
session_start();

if (isset($_GET["error"]) && $_GET["error"] == "wronglogin"){
    header("Location: views/logg-inn.php?error=wronglogin");
}
if (isset($_GET["error"]) && $_GET["error"] == "nologin"){
    header("Location: views/logg-inn.php?error=nologin");
}

// checking if there already exist $_SESSION variables and if they can be used to log in
if(isset($_SESSION["Username"]) && isset($_SESSION["Password"])){
    if($database->logIn($_SESSION["Username"], $_SESSION["Password"])){
        header('Location: index.php');
    }
}
// for avoiding errors
if(!isset($_POST['username'])){
    $_POST["username"] = null;
}
// for avoiding errors
if(!isset($_POST['password'])){
    $_POST["password"] = null;
}
    $password = $_POST['password'];
    $username = $_POST['username'];

// attempting to log in with user input
if($username && $password){
    if($database->logIn($username, $password)){
        header('Location: index.php');
    } else {
        // wrong username or password
        header('Location: logg-inn.php?error=wronglogin');
    }
} else {
    // user didn't enter username or password
    header("Location: logg-inn.php?error=nologin");
}
?>