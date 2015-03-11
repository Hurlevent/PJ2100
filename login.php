<?php
require('database.php');
$database = new DB();
$username = $_POST['username'];
$password = $_POST['password'];
if($username && $password){
    $result = $database->test($username);
  while($row = $result->fetch_assoc()){
    echo "Navn: " . $row['Navn'] . " Cookie: " . $row['Cookie'] . "<br />"; // for testing
  }
    if($database->logIn($username, $password)){
        echo "You're in!";
    } else {
        echo "Incorrect username or password";
    }

}

?>