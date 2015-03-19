# CK32 Roombooking

## Hvordan sette opp kjøring av nettsiden på egen maskin

- Installer [Composer](https://getcomposer.org/)
- Kjør følgende kommando for å installere bibliotekene i composer.json: composer install
- Installer MAMP (gratisversjonen)
- Gå til «Preferences» og «Web Server», endre «Document Root» til der GitHub repositoriet av siden er lagret
- Klikk «Start Servers»
- Klikk «Open WebStart page» og åpne «phpMyAdmin»
- Gå til «Databases» og opprett en ny database med navnet rombooking
- Siden er nå tilgjengelig på localhost:8888

Med mindre det er endringer i databasemodellen eller liknende, trenger du kun og åpne MAMP og starte serverene neste gang du vil kjøre siden.

## Vis feilmeldinger i MAMP

- Åpne /Applications/MAMP/bin/php/php5.6.2/conf/php.ini i et tekstredigeringsprogram
- Endre «display_errors = Off» til «display_errors = On»