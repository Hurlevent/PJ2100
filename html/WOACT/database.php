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

        $sql = "SELECT username FROM user WHERE username = '$user' AND password = '$pass'";
        $result = $this->connection->query($sql);
        if (mysqli_num_rows($result)) {
            $_SESSION["Username"] = $user;
            $_SESSION["Password"] = $pass;

            $sql = "SELECT name FROM user WHERE username = '$user'";
            $fullname = $this->connection->query($sql);
            $_SESSION["Fullname"] = $fullname->fetch_assoc()["name"];

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
        $sql = "SELECT * FROM user WHERE name = '$user'";
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
        $sql = "SELECT * FROM room";
        $result = $this->connection->query($sql);
        for($i = 0; $i < mysqli_num_rows($result); $i++){
            $currentrow = $result->fetch_assoc();
            array_push($this->allRooms, $currentrow['name']);
        }
    }

    public function showAvailable($date){
        $sql = "SELECT DISTINCT room.id AS rid, room.name AS rname, room.capacity AS capacity, room.projector AS projector FROM room LEFT JOIN booking ON room.id = booking.room_id WHERE room.id NOT IN( SELECT room.id FROM room JOIN booking ON room.id = booking.room_id WHERE DATE_FORMAT('" . $date . "', '%Y/%m/%d') = DATE_FORMAT(booking.booked_from, '%Y/%m/%d'));";

        $result = $this->connection->query($sql);
        echo "<tr><td class='table_head'>Room ID</td><td class='table_head'>Room name</td><td class='table_head'>Capacity</td><td class='table_head'>Prosjektor</td><td class='table_head'></td></tr>";
        for($i = 0; $i < mysqli_num_rows($result); $i++) {
            $row = $result->fetch_assoc();
            echo "<tr>";
            echo "<form action='hurtigbooking.php' method='POST'><td class='table_content'>" . $row["rid"] . "</td><td class='table_content'>" . $row["rname"] . "</td><td class='table_content'>" . $row["capacity"] . "</td><td class='table_content'>" . $row["projector"] . "</td><td class='table_content'><input type='hidden' name='room' value='" . $row["rname"] . "' /><input type='hidden' name='date' value='" . $date . "' /><input type='hidden' name='projector' value='" . $row["projector"] . "' /><input type='hidden' name='capacity' value='" . $row["capacity"] . "' /><input type='submit' value='Reserver' class='reserve_room' /></form></td>";
            echo "</tr>";
        }
    }
        // parameter: username, room_name, date, date
    public function rentRoom($user, $room, $from, $to){
        $sql = "SELECT student_id FROM user WHERE username = '$user'";
        $result = $this->connection->query($sql);
        $id = $result->fetch_assoc();
        $sql = "SELECT id FROM room WHERE name = '$room'";
        $result = $this->connection->query($sql);
        $roomID = $result->fetch_assoc();
        $sql = "INSERT INTO booking VALUES (NULL, STR_TO_DATE('" . $from . "', '%Y/%m/%d'), STR_TO_DATE('" . $to . "', '%Y/%m/%d'), " . $roomID['id'] .  ", " . $id['student_id'] . ", NULL);";
        $this->connection->query($sql);
    }
}


?>