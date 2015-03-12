<?php

$user = 'root';
$password = 'root';
$db = 'rombooking';
$host = 'localhost';
$port = 8889;

$link = mysqli_init();
$connection = mysqli_real_connect(
   $link, 
   $host, 
   $user, 
   $password, 
   $db,
   $port
);