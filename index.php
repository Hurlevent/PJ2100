<?php

require 'config.php';
if(!isset($_SESSION["Date"])){
    // default til dagens dato
    $date = new DateTime();
    $timestamp = $date->getTimestamp();
    $currentDate = date('Y-m-d', $timestamp); // dagens dato
    $_SESSION["Date"] = $currentDate;
}

if(isset($_COOKIE["Prosjektor"]) && $_COOKIE["Prosjektor"] != "null" || isset($_COOKIE["Capacity"]) && $_COOKIE["Capacity"] != "null"){
    if(isset($_COOKIE["Prosjektor"]) && isset($_COOKIE["Capacity"]) && $_COOKIE["Capacity"] == "null"){
        $free_rooms_query = "SELECT DISTINCT room.id AS rid, room.name AS rname, room.capacity AS capacity, room.projector AS projector FROM room LEFT JOIN booking ON room.id = booking.room_id WHERE room.id NOT IN( SELECT room.id FROM room JOIN booking ON room.id = booking.room_id WHERE DATE_FORMAT('" . $_SESSION["Date"] . "', '%Y/%m/%d') = DATE_FORMAT(booking.booked_from, '%Y/%m/%d')) AND projector = '" . $_COOKIE["Prosjektor"] . "';";
    } else if(isset($_COOKIE["Capacity"]) && isset($_COOKIE["Prosjektor"]) && $_COOKIE["Prosjektor"] == "null"){
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

render_page('index', array(
    'password' => $password,
    'free_rooms' => $free_rooms
));