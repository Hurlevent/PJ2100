<?php
class DB {
    private $username = "eftoli14";
    private $password = "eftoli14";
    private $host = "mysql.nith.no";
    private $database = "eftoli14";
    private $connection = null;

    public function __construct(){
        $this->connection = mysqli_connect($this->host, $this->username, $this->password, $this->database);
    }

    public function logIn($user, $pass){

        $sql = "SELECT Navn, Passord FROM Brukere WHERE Navn = '$user' AND Passord = '$pass'";
        $result = $this->connection->query($sql);
        if(mysqli_num_rows($result)) {
            $_SESSION["Username"] = $user;
            $_SESSION["Password"] = $pass;

            return true;
        }
        return false;
    }

    public function hasConnection(){
        if($this->connection != null){
            return true;
        } else {
            return false;
        }
    }
    // this funtion is for testing only
    public function test($user){
        $sql = "SELECT * FROM Brukere WHERE Navn = '$user'";
        $result = $this->connection->query($sql);
        return $result;
    }


    public function getDatabase(){
       $result = $this->database;
        return $result;
    }
}



?>