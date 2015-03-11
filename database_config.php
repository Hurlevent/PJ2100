<?php

$user = 'root';
$password = '';
$db = 'pj2100';
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