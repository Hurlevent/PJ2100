<?php
require('database.php');
$database = new DB();

if(isset($_COOKIE['Username']) && isset($_COOKIE['Password'])) {
    if ($database->logIn($_COOKIE['Username'], $_COOKIE['Password'])) {
        echo "You're in!";
        header('Location: Welcome.php');
    } else {
        echo "Cookie represent incorrect values";
    }
}
if(isset($_POST['username'])){
    $username = $_POST['username'];
}
if(isset($_POST['username'])){
    $password = $_POST['password'];
}

if($username && $password){
    $result = $database->test($username);
  while($row = $result->fetch_assoc()){
    echo "Navn: " . $row['Navn'] . " Cookie: " . $row['Cookie'] . "<br />"; // for testing
  }
    if($database->logIn($username, $password)){
        echo "You're in!";
        echo "Cookies have been set";
        header('Location: Welcome.php');
    } else {
        echo "Incorrect username or password";
    }

}

?>