<!DOCTYPE html>
<html lang='no'>
  <head>
    <meta charset='UTF-8'>
    <title><?=$this->e($page_title)?></title>
    <link rel='stylesheet' type='text/css' href='./css/felles.css'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  </head>
  <body>
    <!-- Header Start -->
    <header>
        <!-- Logo Start -->
        
        <div class="logo">
            <a href='index.php'><img src="./bilder/WACT_Venstrejustert_svart_rgb_2.svg" alt="logo"/></a>
        </div>
    
        <ul class="navigation font_style_class">
            <?php
             if ($user){
                    echo "<li><a href='/minside.php'><img class='icon' src='./bilder/Person_Icon.svg' alt='icon'>" . $user["full_name"] . "</a></li><li><a href='/logout.php'>Logg ut</a></li>";
               } else {
                   echo "<li><a href='/logg-inn.php'>Logg inn</a></li>";
               }
            ?>
            <li><a href="/hjelp.php">Hjelp</a></li>
        </ul>
        
        <!-- About End -->
    </header>
    <!-- Header End -->
    <div class='content'>
      <?=$this->section('content')?>
    </div>
    <footer>
      <img src="./bilder/WACT_svart_rgb.svg" style="width:20%;">
      <br>
      <p><a href="http://www.westerdals.no/"> Westerdals Oslo ACT</a></p>
    </footer>
  </body>
</html>