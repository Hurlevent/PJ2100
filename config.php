<?php

/* composer */

require 'vendor/autoload.php';

/* database config */

$user = 'eftoli14';
$password = 'eftoli14';
$db = 'eftoli14';
$host = 'mysql.nith.no';
$port = '3306';

$link = mysqli_init();
$connection = mysqli_real_connect(
   $link, 
   $host, 
   $user, 
   $password, 
   $db
);

/* page rendering config */

session_start();

function render_page($template_title, $template_values) {

  if (!isset($_SESSION["Username"])){
    $user = NULL;
  } else {
    $user = array(
      'username' => $_SESSION["Username"],
      'full_name' => $_SESSION["Fullname"]
    );
  }

  $template_values['user'] = $user;

  // Create new Plates instance
  $templates = new League\Plates\Engine('./views/');

  // Render a template
  echo $templates->render($template_title, $template_values);
}