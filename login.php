<?php
require('database.php');
$database = new DB();
session_start(); // session objekt
/*
if(isset($_COOKIE['Username']) && isset($_COOKIE['Password'])) {
    if ($database->logIn($_COOKIE['Username'], $_COOKIE['Password'])) {
        echo "You're in!";
        header('Location: Welcome.php');
    } else {
        echo "Cookie represent incorrect values";
    }
}
*/
if(isset($_SESSION["Username"]) && isset($_SESSION["Password"])){
    if($database->logIn($_SESSION["Username"], $_SESSION["Password"])){
        echo "You're in!";
        header('Location: Welcome.php');
    } else {
        echo "Session contains incorrect values";
    }
}

if(!isset($_POST['username'])){
    $_POST["username"] = null;
}
if(!isset($_POST['password'])){
    $_POST["password"] = null;
}
    $password = $_POST['password'];
    $username = $_POST['username'];

if($username && $password){
    $result = $database->test($username);
  while($row = $result->fetch_assoc()){
    //echo "Navn: " . $row['Navn'] . " Cookie: " . $row['Cookie'] . "<br />"; // for testing
  }
    if($database->logIn($username, $password)){
        echo "You're in!";
        echo "Cookies have been set";
        header('Location: Welcome.php');
    } else {
        echo "Incorrect username or password";
    }
} else {
    header("Location: index.php");
}
?>