<!DOCTYPE html>
<html lang='no'>
  <head>
    <meta charset='UTF-8'>
    <title><?=$this->e($page_title)?></title>
    <link rel='stylesheet' type='text/css' href='html/css/felles.css'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  </head>
  <body>
    <header>
  
        <logo>
            <a href='/'><img src="../bilder/WACT_Venstrejustert_svart_rgb_2.svg" alt="logo"/></a>
        </logo>
  
        <nav>
            <ul>
                <li class="navbar" >
                    <a href="http://www.westerdals.no/"> Westerdals Oslo ACT</a></li>
            </ul>
        </nav>
    
        <div id="about">
            <img class="icon" src="bilder/Person_Icon.svg" alt="icon">
            <?php
             if ($user){
                    echo "<a href='/minside.php'>" . $user["full_name"] . "</a><a href='logout.php'><button>Log ut</button></a>";
               } else {
                   echo "<a href='logg-inn.php'>Trykk her for å logge inn</a>";
               }
            ?>
        </div>
    </header>
    <div class='content'>
      <?=$this->section('content')?>
    </div>
    <footer>
      <img src="../bilder/WACT_svart_rgb.svg" style="width:20%;">
    </footer>
  </body>
</html>