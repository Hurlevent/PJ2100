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

if(!isset($_SESSION["Date"])){
    $date = new DateTime();
    $timestamp = $date->getTimestamp();
    $_SESSION["Date"] = date('Y/m/d', $timestamp);
}
if(!isset($_SESSION["Fullname"])){
    $_SESSION["Fullname"] = "You are not logged in";
}

$date = $_SESSION["Date"];
$username = $_SESSION["Username"];
$password = $_SESSION["Password"];
$fullname = $_SESSION["Fullname"];
?>

<DOCTYPE html>
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
	<link type="html/css" rel="stylesheet" href="../css/forside_css.css" />
	<link type="html/css" rel="stylesheet" href="../css/felles.css" />
</head>

<body>
<div id="wrapper">
	<header>
		<img src="bilder/WACT_hvit_rgb.png" alt="logo" height="99" width="100" />
	</header>
	<nav>
		<ul>
			<li class="navbar">Meny</li>
			<li class="navbar">Kalender</li>

            <?php
            if($database->logIn($username, $password)){
                echo "<li class='navbar'>Welcome back, " . $fullname . "</li>";
                echo "<form action='logOut.php' method='POST' class='navbar'/>
                <input type='hidden' name='logOut' />
                <input type='submit' value='Log out' />
                </form>";

            } else {

                echo "<form action='login.php' method='POST' class='navbar'>
                <input type='username' name='username' required />
                <input type='password' name='password' required />
                <input type='submit' value='Log in'>
                </form>";
            }
            ?>
		</ul>
        <ul>
            <li class="navbar"><a href="booknyttrom.php">Book et rom</a></li>
        </ul>
	</nav>
<div>
    <?php
    echo "Valgt dato: " . $date . ".";
    ?>
    <form action='update.php' method='POST'>
        <p>Velg en annen dato</p>
        <input type='date' name='dato' />
        <p>Velg et annet tidspunkt</p>
        <input type='time' name='tidspunkt' />
        <p>Antall timer</p>
        <input type='number' name='timer' />
        <p>Prosjektor</p>
        <input type='checkbox' name='prosjektor' />
        <p>Antall personer</p>
        <input type='number' name='personer' />
        <p><input type='submit' value='Endre' /></p>
    </form>
</div>
	<table class="kalender">
        <?php

       $database->showAvailable($date);
        ?>
	</table>
	<!-- <img class="kalender" src="../bilder/kalender.jpg" alt="kalender" /> -->
	<footer>
		<p>Mine møter:</p>
		<table>
			<tr>
				<th>Dato</th>
				<th>Romnavn</th>
				<th>Starttid</th>
				<th>Sluttid</th>
			</tr>
			<tr>
				<td>"Første booking"</td>
				<td>Rom 81</td>
				<td>10.15</td>
				<td>16.00</td>
				<td><button>Endre</button></td>
			</tr>
		<button>Ny booking</button>
	</footer>
</div>
</body>

</html>