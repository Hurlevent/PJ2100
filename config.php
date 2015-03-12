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

/* template rendering config */

function render_template($template_title, $template_values) {
  $haml = new MtHaml\Environment('php');
  $executor = new MtHaml\Support\Php\Executor($haml, array(
    'cache' => sys_get_temp_dir().'/haml',
  ));

  $template_file = file_get_contents('./views/' . $template_title . '.html');
  $template_values_with_content = array();
  $template_values_with_content['content'] = $template_file;

  foreach ($template_values as $key => $value) {
    $template_values_with_content[$key] = $value;
  }
  
  $executor->display('./views/layout.haml', $template_values_with_content);
}