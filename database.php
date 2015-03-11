<?php
class DB {
    private $username = "root";
    private $password = "";
    private $host = "127.0.0.1:3306";
    private $database = "woact";
    private $connection = null;

    public function __construct(){
        $this->connection = mysqli_connect($this->host, $this->username, $this->password, $this->database);
    }

    public function logIn($user, $pass){


        $sql = "SELECT Navn, Passord FROM Brukere WHERE Navn = '$user' AND Passord = '$pass'";
        $result = $this->connection->query($sql);
        if(mysqli_num_rows($result)) {
            $usercookie = "SELECT Navn FROM Brukere WHERE Navn = '$user'";
            $usercookieVal = $this->connection->query($usercookie)->fetch_assoc();
            $passcookie = "SELECT Passord FROM Brukere WHERE Navn = '$user'";
            $passcookieVal = $this->connection->query($passcookie)->fetch_assoc();
            setcookie("Username", $usercookieVal['Navn'], time() + (5 * 60));
            setcookie("Password", $passcookieVal['Passord'], time() + (5 * 60));
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


/*class DB {
	private $username = "root";
	private $password = "";
	private $host = "127.0.0.1:3306";
	private $database = "woact";
	private $db = null;
    public $cookieName = null;
    public $cookieValue = null;

	function __construct(){
        $this->$db = new PDO("mysql:host=$this->host;dbname=$this->database;charset=utf8",
            $this->username,
            $this->password);
		$this->$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}

	function logIn($user, $pass){

        if(isset($_COOKIE['$user'])){
            return true;
        }

		$sql = "SELECT Navn, Passord FROM Brukere WHERE Navn = '$user'";
		$result = $this->db->prepare($sql);
        $result->setFetchMode(PDO::FETCH_OBJ);
        $result->execute();
		if($user == $result['Navn'] && $pass == $result['Passord']){
            $cookieName = $user;
            $cookie = "SELECT Cookie FROM Brukere WHERE Navn = '$user'";
            $cookieValue = $cookie->prepare($cookie);
            setcookie($cookieName, $cookieValue, time() + (5 * 60));
			return true;
		} else {
			return false;
		}
	}

	function showRooms(){

	}

	function rentRoom(){

	}

	function redirect(){
		header("location: ./");
		exit();
	}
	
	}*/
?>