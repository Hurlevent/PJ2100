# Tinder for rombooking – versjon 2.0

## Hvordan sette opp kjøring av nettsiden på egen maskin

- Installer [Composer](https://getcomposer.org/), det er lagt ut fremgangsmåte i PHP-forelesningen
- Kjør følgende kommando for å installere bibliotekene i composer.json: composer install
- Installer MAMP (gratisversjonen)
- Klikk «Start Servers»
- Gå til «Preferences» og «Web Server», endre «Document Root» til der GitHub repositoriet av siden er lagret
- Klikk «Open WebStart page» og åpne «phpMyAdmin»
- Gå til «Databases» og opprett en ny database med navnet pj2100
- Siden er nå tilgjengelig på localhost:8888
- Kjør «create_tables.php» for og etablere databasemodellen

Med mindre det er endringer i databasemodellen eller liknende, trenger du kun og åpne MAMP og starte serverene neste gang du vil kjøre siden.

## Vis feilmeldinger i MAMP

- Åpne /Applications/MAMP/bin/php/php5.6.2/conf/php.ini i et tekstredigeringsprogram
- Endre «display_errors = Off» til «display_errors = On»