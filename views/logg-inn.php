<!-- DETTE FUNGERER IKKE!!!!!! PLIS FIX DET, og HUST AT DE MAMP INSTILLINGENE DU HAR PÅ DIN MASKIN IKKE FUNGERER PÅ HOME.NITH.NO -->
<?php /* $this->layout('layout', [
  'page_title' => 'Rombooking CK45 – Logg inn',
  'user' => $user
]) */ ?>


<form action="login.php" method="POST">
    <p>Brukernavn</p>
    <input type="username" name="username" />
    <p>Passord</p>
    <input type="password" name="password" />
    <input type="submit" value="Log in" />
</form>