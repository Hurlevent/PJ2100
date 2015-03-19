<?php

require 'config.php';
if(!isset($_SESSION["Date"])){
    // default til dagens dato
    $date = new DateTime();
    $timestamp = $date->getTimestamp();
    $currentDate = date('Y-m-d', $timestamp); // dagens dato
    $_SESSION["Date"] = $currentDate;
}
if(!isset($_SESSION["Id"])) {
    $_SESSION["Id"] = 0;
}

if(isset($_COOKIE["Prosjektor"]) && $_COOKIE["Prosjektor"] != "Alle" || isset($_COOKIE["Capacity"]) && $_COOKIE["Capacity"] != "Alle"){
    if(isset($_COOKIE["Prosjektor"]) && isset($_COOKIE["Capacity"]) && $_COOKIE["Capacity"] == "Alle"){
        $free_rooms_query = "SELECT DISTINCT room.id AS rid, room.name AS rname, room.capacity AS capacity, room.projector AS projector FROM room LEFT JOIN booking ON room.id = booking.room_id WHERE room.id NOT IN( SELECT room.id FROM room JOIN booking ON room.id = booking.room_id WHERE DATE_FORMAT('" . $_SESSION["Date"] . "', '%Y/%m/%d') = DATE_FORMAT(booking.booked_from, '%Y/%m/%d')) AND projector = '" . $_COOKIE["Prosjektor"] . "';";
    } else if(isset($_COOKIE["Capacity"]) && isset($_COOKIE["Prosjektor"]) && $_COOKIE["Prosjektor"] == "Alle"){
        $free_rooms_query = "SELECT DISTINCT room.id AS rid, room.name AS rname, room.capacity AS capacity, room.projector AS projector FROM room LEFT JOIN booking ON room.id = booking.room_id WHERE room.id NOT IN( SELECT room.id FROM room JOIN booking ON room.id = booking.room_id WHERE DATE_FORMAT('" . $_SESSION["Date"] . "', '%Y/%m/%d') = DATE_FORMAT(booking.booked_from, '%Y/%m/%d')) AND capacity = '" . $_COOKIE["Capacity"] . "';";
    } else {
        $free_rooms_query = "SELECT DISTINCT room.id AS rid, room.name AS rname, room.capacity AS capacity, room.projector AS projector FROM room LEFT JOIN booking ON room.id = booking.room_id WHERE room.id NOT IN( SELECT room.id FROM room JOIN booking ON room.id = booking.room_id WHERE DATE_FORMAT('" . $_SESSION["Date"] . "', '%Y/%m/%d') = DATE_FORMAT(booking.booked_from, '%Y/%m/%d')) AND projector = '" . $_COOKIE["Prosjektor"] . "' AND capacity = '" . $_COOKIE["Capacity"] . "';";
    }

} else {
    $free_rooms_query = "SELECT DISTINCT room.id AS rid, room.name AS rname, room.capacity AS capacity, room.projector AS projector FROM room LEFT JOIN booking ON room.id = booking.room_id WHERE room.id NOT IN( SELECT room.id FROM room JOIN booking ON room.id = booking.room_id WHERE DATE_FORMAT('" . $_SESSION["Date"] . "', '%Y/%m/%d') = DATE_FORMAT(booking.booked_from, '%Y/%m/%d'));";
}

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

//$free_rooms = 'SELECT room.id, name, projector, capacity FROM room LEFT JOIN booking ON room.id = booking.room_id WHERE booking.booked_from NOT BETWEEN CURRENT_DATE() AND CURRENT_DATE() + INTERVAL 1 DAY OR booking.booked_from IS NULL';

    $bookings_query = "SELECT room_id, booked_from, room.name AS room_name, booking.id AS bid, room.projector AS projector, room.capacity AS capacity FROM booking LEFT JOIN room ON booking.room_id = room.id WHERE user_id = " . $_SESSION["Id"] . " AND booked_from >= CURRENT_DATE() ORDER BY booked_from ASC;";

    if ($result = mysqli_query($link, $bookings_query)) {
        $bookings = array();
        $bookings_count = mysqli_num_rows($result);
        for ($i = 0; $i < $bookings_count; $i++) {
            $row = $result->fetch_array(MYSQLI_ASSOC);
            array_push($bookings, $row);
        }
    } else {
        echo 'Database error: ' . mysqli_error($link);
    }


render_page('index', array(
    'password' => $password,
    'free_rooms' => $free_rooms,
    'bookings' => $bookings,
    'bookings_count' => $bookings_count
));