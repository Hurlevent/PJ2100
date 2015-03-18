<?php

require 'config.php';

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

render_page('index', array(
  'rooms' => $rooms,
  'room_count' => $room_count
));