<?php
class DB
{
    private $username = "eftoli14";
    private $password = "eftoli14";
    private $host = "mysql.nith.no";
    private $database = "eftoli14";
    public $connection = null;

    public function __construct()
    {
        $this->connection = mysqli_connect($this->host, $this->username, $this->password, $this->database);
    }

    // vår logg inn funksjon. Denne oppretter også $_SESSION variabler som benyttes hver gang bruker laster inn siden på nytt for å sikre seg om at brukeren fortsatt er logget inn
     public function logIn($user, $pass)
    {

        $sql = "SELECT username FROM user WHERE username = '$user' AND password = '$pass'";
        $result = $this->connection->query($sql);
        if (mysqli_num_rows($result)) {
            $_SESSION["Username"] = $user;
            $_SESSION["Password"] = $pass;

            $sql = "SELECT name FROM user WHERE username = '$user'";
            $fullname = $this->connection->query($sql);
            $_SESSION["Fullname"] = $fullname->fetch_assoc()["name"];
            $sql = "SELECT student_id AS id FROM user WHERE username = '$user'";
            $studentnr = $this->connection->query($sql);
            $_SESSION["Id"] = $studentnr->fetch_assoc()["id"];

            return true;
        }
        return false;
    }

        // parameter: username, room_name, date, date
    public function rentRoom($user, $room, $from, $to)
    {
        $sql = "SELECT student_id FROM user WHERE username = '$user'";
        $result = $this->connection->query($sql);
        $id = $result->fetch_assoc();
        $sql = "SELECT id FROM room WHERE name = '$room'";
        $result = $this->connection->query($sql);
        $roomID = $result->fetch_assoc();
        $sql = "INSERT INTO booking VALUES (NULL, STR_TO_DATE('" . $from . "', '%Y-%m-%d'), STR_TO_DATE('" . $to . "', '%Y-%m-%d'), " . $roomID['id'] . ", " . $id['student_id'] . ", NULL);";
        $this->connection->query($sql);
    }
        // Sletter en booking med gitt id
    public function deleteBooking($bookingId){
    $sql = "DELETE FROM booking WHERE id = '" . $bookingId . "';";
        $this->connection->query($sql);
    }
}
?>