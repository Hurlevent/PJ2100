<!DOCTYPE html>
<html lang='no'>
  <head>
    <meta charset="UTF-8">
    <title><?=$this->e($page_title)?></title>
    <link rel='stylesheet' type='text/css' href='/assets/stylesheets/application.css'>
  </head>
  <body>
    <header>
      <nav>
        <ul>
          <li>
            <a href='/index_2.php'>Oversikt</a>
          </li>
          <li>
            <a href='/my_page.php'>Min side</a>
          </li>
          <li>
            <a href='/create_tables.php'>Databaseoppsett</a>
          </li>
        </ul>
      </nav>
    </header>
    <div class='content'>
      <?=$this->section('content')?>
    </div>
  </body>
</html>