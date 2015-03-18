<?php
// Checking for $_SESSION Variables and instanciating connection with db
require("database.php");
$database = new DB();
session_start();
if(!isset($_SESSION["Username"])){
    $_SESSION["Username"] = null;
}
if(!isset($_SESSION["Password"])){
    $_SESSION["Password"] = null;
}

if(!isset($_SESSION["Date"])){
    //$datetimeobject = new DateTime();
    //$timestamp = $datetimeobject->getTimestamp();
    //$_SESSION["Date"] = date('Y/m/d', $timestamp);
    //$date = $_SESSION["Date"];
    $_SESSION["Date"] = getdate();
    $date = $_SESSION["Date"];
} else {
    $date = $_SESSION["Date"];
}

if(!isset($_SESSION["Fullname"])){
    $_SESSION["Fullname"] = "You are not logged in";
}

$username = $_SESSION["Username"];
$password = $_SESSION["Password"];
$fullname = $_SESSION["Fullname"];
?>

<DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name = "viewport" content="width=device-width, initial-scale=1.0">
	<title>Bestill grupperom</title>
	<link type="html/css" rel="stylesheet" href="../css/felles.css" />
</head>

<body>
    
<!-------------------------------------------------------->
<!-- Wrapper Start --------------------------------------->
<div id="wrapper">
    
    <!---------------------------------------------------->
    <!-- Header Start ------------------------------------>
    <header>
    <!---------------------------------------------------->
    <!-- Logo Start -------------------------------------->
	
        <logo>
            <img src="../../bilder/Venstrejustert_svart_Oslo_ACT.svg" alt="logo"/>
        </logo>

    <!-- Logo End ---------------------------------------->
    <!---------------------------------------------------->
    <!-- Navigation Menu --------------------------------->
	
        <nav>
            <ul>
                <li class="navbar" >
                    <a href="http://www.westerdals.no/"> Westerdals Oslo ACT</a></li>
            </ul>
        </nav>
    
    
    <!-- Navigeringsmeny End ----------------------------->
    <!---------------------------------------------------->
    <!-- About Start ------------------------------------->
        <div id="about">
            <img class="icon" src="../../bilder/Person_Icon.svg" alt="icon">
            <!--
             Logger inn med login funksjonen i database.php, tar utgangspunkt i $_SESSION variablene
             -->
            <?php
            if($database->logIn($username, $password)){
                echo "<a href='#'>" . $fullname . "</a>";
            } else {
                echo "<a href='loginportal.php'>Trykk her for å logge inn</a>";
            }
            ?>
        </div>
    <!-- About End --------------------------------------->     <!---------------------------------------------------->
    </header>
    <!-- Header End -------------------------------------->
    <!---------------------------------------------------->
    <!-- Finder Start ------------------------------------>
    <div id="finder">
    <!---------------------------------------------------->
    <!-- Search Menu Start ------------------------------->
	
        <div id="search_menu">
            <menu>
                <dl>
                    <li>
                        <?php
                        echo "<p>Valgt dato: " . $date . "</p>";
                        ?>
                    </li>
                    <li>
                        <form action="update.php" method="POST">
                        <h3>Sett filter</h3>
                    </li>
                    <li>
                        <input type="date" name="dato" />
                    </li>
                    <li>
                            <label for="checkbox">Prosjektor</label>
                            <input type="checkbox" id="checkbox" name="prosjektor" checked>
                    </li>
                    <li><p>Antall personer</p>
                        <select class="person_select" name="capacity">
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                        </select>
                    </li>
                </dl>
                <input type="submit" value="Søk" class="search_button" />
                </form>
            </menu>
        </div>
    
    <!-- Search Menu End --------------------------------->
    <!---------------------------------------------------->
    <!-- Room Grid Start --------------------------------->
	<!-- Her skal det gå en for loop som skriver ut html-en -->
        <div id="shedule_list">
            <table class="kalender">
                <!-- VIKTIG, dette er tabellen som viser alle ledige rom for en viss dato. Metoden som blir kalt på ligger i database.php -->
                <?php
                $database->showAvailable($date);
                ?>
            </table>
            
        </div>
    <!-- Room Grid End ----------------------------------->
    <!---------------------------------------------------->
    </div>
    <!-- Finder End -------------------------------------->
    <!---------------------------------------------------->
    <!-- Your Reservations Start ------------------------->
    <div id="reservation_list">
        <table>
                <tr>
                    <th class="table_head">Dato</th>
                    <th class="table_head">Romnavn</th>
                    <th class="table_head"></th>
                    <th class="table_head"></th>
                    <th class="table_head"></th>
                    <th class="table_head"></th>
                    <th class="table_head"></th>
                    <th class="table_head"></th>
                </tr>
                <tr>
                    <td class="table_content">19.Mars</td>
                    <td class="table_content">Rom 81</td>
                    <td><button class="reserve_room">Endre</button></td>
                </tr>
        </table>
    </div>
    <!-- Your Reservations End --------------------------->
    <!---------------------------------------------------->
    <!-- Footer start ------------------------------------>
    
	<footer>
		
	</footer>
        
    <!-- Footer End -------------------------------------->
    <!---------------------------------------------------->
</div>
<!-- Wrapper End -----------------------------------------> <!-------------------------------------------------------->
</body>
<!-- Body End -------------------------------------------->
<!-------------------------------------------------------->
</html>
<!-- Document End ---------------------------------------->
<!-------------------------------------------------------->