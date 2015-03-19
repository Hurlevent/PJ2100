<?php  $this->layout('layout', [
  'page_title' => 'Rombooking CK45 – Logg inn',
  'user' => $user
])  ?>

<div class="login-area">
  <h1>Logg inn</h1>

<?php
if (isset($_GET["error"]) && $_GET["error"] == "wronglogin"){
    echo "<p class='error'>Feil brukernavn eller passord!</p>";
}
if(isset($_GET["error"]) && $_GET["error"] == "nologin"){
    echo "<p class='error'>Vennligst skriv inn brukernavn og passord!</p>";
}
?>

<form class="login-form" action="login.php" method="POST">
    <p>
      <label for="username">Brukernavn</label>
      <input id="username" type="text" name="username" autocomplete="off" />
    </p>
    <p>
      <label for="password">Passord</label>
      <input id="password" type="password" name="password" />
    </p>
    <p>
      <button class="submit-button" type="submit">Logg inn</button>
    </p>
</form>