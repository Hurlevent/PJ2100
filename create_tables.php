<?php

require 'config.php';

$query = file_get_contents('./create_tables.sql');

if (mysqli_query($link, $query)) {
  $database_message = 'Tables created';
} else {
  $database_message = 'Database error: ' . mysqli_error($link);
}

render_page('create_tables', array(
  'page_title' => 'Oppsett av database',
  'database_message' => $database_message
));