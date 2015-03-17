<?php

require 'config.php';

$all_rooms_query = 'SELECT * FROM room';
$bookings_query = 'SELECT * FROM booking';
$bookings_room_query = 'SELECT * FROM booking INNER JOIN room ON booking.room_id = room.id';
//$free_rooms = 'SELECT room.id, name, projector, capacity FROM room LEFT JOIN booking ON room.id = booking.room_id WHERE booking.booked_from NOT BETWEEN "2015-03-17" AND "2015-03-18" OR booking.booked_from IS NULL';
$free_rooms = 'SELECT room.id, name, projector, capacity FROM room LEFT JOIN booking ON room.id = booking.room_id WHERE booking.booked_from NOT BETWEEN CURRENT_DATE() AND CURRENT_DATE() + INTERVAL 1 DAY OR booking.booked_from IS NULL';

if ($result = mysqli_query($link, $free_rooms)) {
  $rooms = array();
  $room_count = mysqli_num_rows($result);
  for($i = 0;$i < $room_count;$i++){
    $row = $result->fetch_array(MYSQLI_ASSOC);
    array_push($rooms, $row);
  }
} else {
  echo 'Database error: ' . mysqli_error($link);
}

if ($result = mysqli_query($link, $all_rooms_query)) {
  $all_rooms = array();
  $all_room_count = mysqli_num_rows($result);
  for($i = 0;$i < $all_room_count;$i++){
    $row = $result->fetch_array(MYSQLI_ASSOC);
    array_push($all_rooms, $row);
  }
} else {
  echo 'Database error: ' . mysqli_error($link);
}

if ($result = mysqli_query($link, $bookings_query)) {
  $bookings = array();
  $bookings_count = mysqli_num_rows($result);
  for($i = 0;$i < $bookings_count;$i++){
    $row = $result->fetch_array(MYSQLI_ASSOC);
    array_push($bookings, $row);
  }
} else {
  echo 'Database error: ' . mysqli_error($link);
}

render_page('index', array(
  'rooms' => $rooms,
  'room_count' => $room_count,
  'all_rooms' => $all_rooms,
  'bookings' => $bookings
));