<?php
require("../../database.php");
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
	<link type="html/css" rel="stylesheet" href="../../css/forside_css.css" />
	<link type="html/css" rel="stylesheet" href="../../css/felles.css" />
</head>

<body>
<div id="wrapper">
	<header>
		<img src="../../bilder/WACT_hvit_rgb.eps" alt="logo" height="100" width="100" />
	</header>
	<nav>
		<ul>
			<li class="navbar">Meny</li>
			<li class="navbar">Kalender</li>

            <?php
            if($database->logIn($username, $password)){
                echo "<li class='navbar'>Welcome back, " . $username . "</li>";
                echo "<li class='navbar'><form action='logOut.php' method='POST' />
                <input type='hidden' name='logOut' />
                <input type='submit' value='Log out' />
                </form></li>";

            } else {

                echo "<li class='navbar'><form action='login.php' method='POST'>
                <input type='username' name='username' required />
                <input type='password' name='password' required />
                <input type='submit' value='Log in'>
                </form></li>";
            }
            ?>
		</ul>
	</nav>
	<menu>
		<dl>
			<li>Start 
				<select>
				  <option value="8">08:00</option>
				  <option value="9">09:00</option>
				</select>
			</li>
			<li>Varighet
				<select>
				  <option value="1t">1</option>
				  <option value="2t">2</option>
				</select>
				timer
			</li>			
			<li>Prosjektor
				<form>
				<input type="checkbox" name="prosjektor" value="prosjektor" checked>
				Prosjektor
				</form>
			</li>
			<li>Antall personer
				<select>
				  <option value="2pers">2</option>
				  <option value="3pers">3</option>
				  <option value="4pers">4</option>
				</select>
			</li>
			
		</dl>
	</menu>
	<table class="kalender">
		<tr>
			<th>Rom</th>
			<th>07:00</th>
			<th>08</th>
			<th>09</th>
			<th>10</th>
			<th>11</th>
			<th>12</th>
			<th>13</th>
		</tr>
		<tr>
		  <td>Rom 81</td>
		  <td>Ledig</td>
		  <td>Ledig</td>
		  <td>Opptatt</td>
		  <td>Ledig</td>
		  <td>Opptatt</td>
		  <td>Opptatt</td>
		  <td>Opptatt</td>
		</tr>
	</table>
	<!-- <img class="kalender" src="../bilder/kalender.jpg" alt="kalender" /> -->
	<button type="knapp">Registrer tid
	</button>
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