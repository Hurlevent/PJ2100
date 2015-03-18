<?php $this->layout('layout', [
  'page_title' => 'Rombooking CK45',
  'user' => $user]);
    require_once('database.php');
 ?>
    <div id="finder">
        <div id="search_menu" class="font_style_class">
            <menu>
                <dl>
                    <li>
                        <?php
                        echo "Dagens dato: " . $_SESSION["Date"];
                        if(isset($_COOKIE["Prosjektor"]) && $_COOKIE["Prosjektor"] != "null"){
                        echo "<br />Prosjektor: " . $_COOKIE["Prosjektor"];
                        }
                        if(isset($_COOKIE["Capacity"]) && $_COOKIE["Capacity"] != "null"){
                        echo "<br />Antall personer: " . $_COOKIE["Capacity"];
                        }
                        ?>
                    </li>
                    <li>
                        <form action="update.php" method="POST">
                        <h3>Sett filter</h3>
                    </li>
                    <li>
                        <input type="date" name="dato" />
                    </li>
                    <li>
                            <label for="checkbox">Prosjektor</label>
                            <select class="person_select" name="prosjektor">
                                <option value="null">All</option>
                                <option value="HDMI">HDMI</option>
                                <option value="VGA">VGA</option>
                            </select>
                    </li>
                    <li><p>Antall personer</p>
                        <select class="person_select" name="capacity">
                            <option value="null">All</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </li>
                </dl>
                <input type="submit" value="Søk" class="search_button" />
                </form>
            </menu>
        </div>
        <div id="shedule_list" class="font_style_class">
            <table class="kalender">
              <tr>
                <th class='table_head'>Room name</th>
                <th class='table_head'>Plasser</th>
                <th class='table_head'>Prosjektor</th>
                <th class='table_head'>Handlinger</th>
              </tr>
              <?php foreach($free_rooms as $item):
                  $currentroom = $item['rname'];
                  ?>
                <tr>
                  <td><?php echo $currentroom ?></td>
                  <td><?php echo $item['capacity'] ?></td>
                  <td><?php echo $item['projector'] ?></td>
                  <td><?php echo "<form action='hurtigbooking.php' method='POST'><input type='hidden' name='Room' value='" . $currentroom . "' />
                      <input type='submit' value='Reserver' class='reserve_room' /></form>"; ?> </td>
                </tr>
              <?php endforeach; ?>
            </table>
        </div>
    </div>
    <div id="reservation_list">
        <table>
                <tr>
                    <th class="table_head">Dato</th>
                    <th class="table_head">Romnavn</th>
                    <th class="table_head"></th>
                    <th class="table_head"></th>
                    <th class="table_head"></th>
                    <th class="table_head"></th>
                    <th class="table_head"></th>
                    <th class="table_head"></th>
                </tr>
                <tr>
                    <td class="table_content">19.Mars</td>
                    <td class="table_content">Rom 81</td>
                    <td><button class="reserve_room">Endre</button></td>
                </tr>
        </table>
    </div>