<?php

require 'database_config.php';

// composer
require 'vendor/autoload.php';

$haml = new MtHaml\Environment('php');
$executor = new MtHaml\Support\Php\Executor($haml, array(
    'cache' => sys_get_temp_dir().'/haml',
));

$home_content = file_get_contents('./views/home.html');

// Compiles and executes the HAML template, with variables given as second
// argument
$executor->display('./views/layout.haml', array(
    'page_title' => 'Rombooking',
    'content' => $home_content
));

?>