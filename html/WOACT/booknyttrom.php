<?php
require("database.php");
$database = new DB();
session_start(); // session objekt
if(!isset($_SESSION["Username"])){
    $_SESSION["Username"] = null;
}
if(!isset($_SESSION["Password"])){
    $_SESSION["Password"] = null;
}
$username = $_SESSION["Username"];
$password = $_SESSION["Password"];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name = "viewport" content="width=device-width, initial-scale=1.0">
    <?php
    if($database->hasConnection()){
        echo "<title>Has connection with database: ";
        echo $database->getDatabase();
        echo "</title>";
    } else {
        echo "<title>No connection</title>";
    }

    ?>
    <link type="html/css" rel="stylesheet" href="css/forside_css.css" />
    <link type="html/css" rel="stylesheet" href="css/felles.css" />
</head>
<body>
<?php
if($database->logIn($username, $password)){
    echo "Bruker: $username";
} else {
    echo "Not logged in";
}
?>
<div id="bookrom">
    <h3>Book nytt rom</h3>
    <form action="bookrom.php" method="POST">
        <p>Velg rom</p>
        <?php
        $database->showRooms();
        echo "<select name='room'>";
        for($i = 0; $i < count($database->allRooms); $i++){
            $label = "<option value='" . $database->allRooms[$i] . "'> " . $database->allRooms[$i] . "</option> ";
            echo $label;
        }
        echo "</select>";
        ?>
        <p>Når skal bookingen starte?</p>
        <input type="date" name="from" />
        <!--<input type="time" name="fromtime" />-->
        <p>Når slutter bookingen?</p>
        <input type="date" name="to" />
        <!--<input type="time" name="totime" />-->
        <p><input type="submit" value="Ferdig" /></p>
    </form>
</div>
</body>
</html>


