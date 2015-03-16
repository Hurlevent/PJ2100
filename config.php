<?php

/* composer */

require 'vendor/autoload.php';

/* database config */

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

/* page rendering config */

function render_page($template_title, $template_values) {
  // Create new Plates instance
  $templates = new League\Plates\Engine('./views/');

  // Render a template
  echo $templates->render($template_title, $template_values);
}