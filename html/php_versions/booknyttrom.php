
<div id="bookrom">
        <h3>Book nytt rom</h3>
        <form action="bookrom.php" method="POST">
            <p>Velg rom</p>
            <?php
                $database->showRooms();
                echo "<select name='room'>";
            for($i = 0; $i < count($database->allRooms); $i++){
                $label = "<option value='" . $database->allRooms[$i] . "'> " . $database->allRooms[$i] . "</option> ";
                echo $label;
            }
            echo "</select>";
            ?>
<p>Når skal bookingen starte?</p>
<input type="date" name="from" />
<p>Når slutter bookingen?</p>
<input type="date" name="to" />
<p><input type="submit" value="Ferdig" /></p>
</form>
</div>
