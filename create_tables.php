<?php

require 'config.php';

$query = "CREATE TABLE room (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, name VARCHAR(30) NOT NULL, projector ENUM('HDMI', 'VGA'), capacity INT(1) NOT NULL)";

if (mysqli_query($link, $query)) {
  echo "things created";
} else {
  echo "mysql error: " . mysqli_error($link);
}