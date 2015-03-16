<?php
class DB
{
    private $username = "eftoli14";
    private $password = "eftoli14";
    private $host = "mysql.nith.no";
    private $database = "eftoli14";
    public $connection = null;

    public $allRooms = array();

    public function __construct()
    {
        $this->connection = mysqli_connect($this->host, $this->username, $this->password, $this->database);
    }

    public function logIn($user, $pass)
    {

        $sql = "SELECT Navn, Passord FROM Brukere WHERE Navn = '$user' AND Passord = '$pass'";
        $result = $this->connection->query($sql);
        if (mysqli_num_rows($result)) {
            $_SESSION["Username"] = $user;
            $_SESSION["Password"] = $pass;

            return true;
        }
        return false;
    }

    public function hasConnection()
    {
        if ($this->connection != null) {
            return true;
        } else {
            return false;
        }
    }

    // this funtion is for testing only
    public function test($user)
    {
        $sql = "SELECT * FROM Brukere WHERE Navn = '$user'";
        $result = $this->connection->query($sql);
        return $result;
    }


    public function getDatabase()
    {
        $result = $this->database;
        return $result;
    }


    public function showRooms()
    {
        $sql = "SELECT * FROM Grupperom";
        $result = $this->connection->query($sql);
        for($i = 0; $i < mysqli_num_rows($result); $i++){
            $currentrow = $result->fetch_assoc();
            array_push($this->allRooms, $currentrow['RomNavn']);
        }
    }

    public function rentRoom($user, $room, $from, $to){
        $sql = "SELECT BrukerID FROM Brukere WHERE Navn = '$user'";
        $result = $this->connection->query($sql);
        $id = $result->fetch_assoc();
        $sql = "SELECT RomID FROM Grupperom WHERE RomNavn = '$room'";
        $result = $this->connection->query($sql);
        $roomID = $result->fetch_assoc();
        $sql = "INSERT INTO Booking VALUES (NULL, " . $id['BrukerID'] . ", STR_TO_DATE('" . $from . "', '%Y-%m-%d'), STR_TO_DATE('" . $to . "', '%Y-%m-%d'), " . $roomID['RomID'] . ");";
        $this->connection->query($sql);
    }
}


?>