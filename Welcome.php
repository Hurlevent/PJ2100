<!DOCTYPE html>
    <html>
<head>
    <meta charset="UTF-8">
</head>
<body>
<?php
require('database.php');
$database = new DB();
if($database->logIn($_COOKIE['Username'], $_COOKIE['Password'])){
    echo "<h1>Welcome back, " . $_COOKIE['Username'] . "</h1>";
} else {
    echo "<h1>You are not logged in</h1>";
}
?>
</body>
</html>