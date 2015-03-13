<?php

require 'config.php';

$query = 'CREATE TABLE room (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, name VARCHAR(30) NOT NULL, projector ENUM("HDMI", "VGA"), capacity INT(1) NOT NULL);CREATE TABLE user (student_id INT(6) UNSIGNED PRIMARY KEY, name VARCHAR(150) NOT NULL, phone_number INT(8) UNSIGNED NOT NULL, email_address VARCHAR(150) NOT NULL);';//CREATE TABLE booking (id INT(12) UNSIGNED AUTO_INCREMENT PRIMARY KEY, booked_from DATETIME, booked_to DATETIME, FOREIGN KEY (room_id) REFERENCES room (id), FOREIGN KEY (student_id) REFERENCES user (student_id), added TIMESTAMP DEFAULT CURRENT_TIMESTAMP);';



if (mysqli_query($link, $query)) {
  $database_message = 'things created';
} else {
  $database_message = 'Database error: ' . mysqli_error($link);
}

render_page('create_tables', array(
  'page_title' => 'Oppsett av database',
  'database_message' => $database_message
));