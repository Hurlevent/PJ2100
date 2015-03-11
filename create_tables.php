<?php

require 'database_config.php';

$query = "CREATE TABLE MyGuests (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,firstname VARCHAR(30) NOT NULL,lastname VARCHAR(30) NOT NULL,email VARCHAR(50),reg_date TIMESTAMP)";

if (mysqli_query($link, $query)) {
  echo "things created";
} else {
  echo "mysql error: " . mysqli_error($link);
}