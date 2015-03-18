<?php

require 'config.php';

$date = new DateTime();
$timestamp = $date->getTimestamp();
$currentDateTime = date('Y/m/d', $timestamp) . ' ' . date('00:00');

$free_rooms_query = "SELECT DISTINCT room.id AS rid, room.name AS rname, room.capacity AS capacity, room.projector AS projector FROM room LEFT JOIN booking ON room.id = booking.room_id WHERE room.id NOT IN( SELECT room.id FROM room JOIN booking ON room.id = booking.room_id WHERE DATE_FORMAT('" . $currentDateTime . "', '%Y/%m/%d') = DATE_FORMAT(booking.booked_from, '%Y/%m/%d'));";

if ($result = mysqli_query($link, $free_rooms_query)) {
  $free_rooms = array();
  $free_room_count = mysqli_num_rows($result);
  for($i = 0;$i < $free_room_count;$i++){
    $row = $result->fetch_array(MYSQLI_ASSOC);
    array_push($free_rooms, $row);
  }
} else {
  echo 'Database error: ' . mysqli_error($link);
}

render_page('index', array(
    'password' => $password,
    'date' => $date,
    'free_rooms' => $free_rooms
));