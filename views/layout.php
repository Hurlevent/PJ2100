<!DOCTYPE html>
<html lang='no'>
  <head>
    <meta charset='UTF-8'>
    <title><?=$this->e($page_title)?></title>
    <link rel='stylesheet' type='text/css' href='./html/css/felles.css'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  </head>
  <body>
    <!---------------------------------------------------->
    <!-- Header Start ------------------------------------>
    <header>
        <!---------------------------------------------------->
        <!-- Logo Start -------------------------------------->
        
        <logo>
            <a href='index.php'><img src="./bilder/WACT_Venstrejustert_svart_rgb_2.svg" alt="logo"/></a>
        </logo>
        
        <!-- Logo End ---------------------------------------->
        <!---------------------------------------------------->
        <!-- Navigation Menu --------------------------------->
        
        <nav class="font_style_class">
            <ul>
                <li class="navbar" >
                    <a href="http://www.westerdals.no/"> Westerdals Oslo ACT</a></li>
                <li class="navbar" >
                    <a href="http://www.westerdals.no/"> Hjelp</a></li>
            </ul>
        </nav>
        
        <!-- Navigeringsmeny End ----------------------------->
        <!---------------------------------------------------->
        <!-- About Start ------------------------------------->
    
        <div id="about" class="font_style_class">
            <ul class="navigation">
                
                <?php
                 if ($user){
                        echo "<li><img class='icon' src='./bilder/Person_Icon.svg' alt='icon'><a href='/minside.php'>" . $user["full_name"] . "</a></li><li><a href='/logout.php'>Logg ut</a></li>";
                   } else {
                       echo "<li><a href='/logg-inn.php'>Logg inn</a></li>";
                   }
                ?>
            </ul>
        </div>
        
        <!-- About End --------------------------------------->
        <!---------------------------------------------------->
    </header>
    <!-- Header End -------------------------------------->
    <!---------------------------------------------------->
    <div class='content'>
      <?=$this->section('content')?>
    </div>
    <footer>
      <img src="./bilder/WACT_svart_rgb.svg" style="width:20%;">
    </footer>
  </body>
</html>