<?php

require 'config.php';

$bookings_query = 'SELECT * FROM booking';
$bookings_room_query = 'SELECT * FROM booking LEFT JOIN room ON booking.room_id = room.id';

if ($result = mysqli_query($link, $bookings_room_query)) {
  $bookings_count = mysqli_num_rows($result);
  /*while ($row = $result->fetch_assoc()) {
    printf ("%s\n", $row["added"]);
  }*/
} else {
  echo 'Database error: ' . mysqli_error($link);
}

render_page('index', array(
  'bookings' => $result->fetch_assoc(),
  'bookings_count' => $bookings_count
));