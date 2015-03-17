<?php

/* composer */

require 'vendor/autoload.php';

/* database config */

$user = 'eftoli14';
$password = 'eftoli14';
$db = 'eftoli14';
$host = 'mysql.nith.no';
<<<<<<< HEAD
$port = '3306';

=======
>>>>>>> origin/master

$link = mysqli_init();
$connection = mysqli_real_connect(
   $link, 
   $host, 
   $user, 
   $password, 
   $db
);

/* page rendering config */

function render_page($template_title, $template_values) {
  // Create new Plates instance
  $templates = new League\Plates\Engine('./views/');

  // Render a template
  echo $templates->render($template_title, $template_values);
}