<?php $this->layout('layout', [
  'page_title' => 'Rombooking CK45',
  'user' => $user]);
    require_once('database.php');
 ?>
    <!-- Finder Start -->

    <div id="finder">
        <!-- Search Menu Start -->
        
        <div id="search_menu" class="font_style_class">
            <menu>
                <dl>
                    <li>
                        <form action="update.php" method="POST">
                        <h3>Sett filter</h3>
                    </li>
                    <li>
                        <input class="datepicker" type="date" name="dato" value="<?php echo date('Y-m-d'); ?>" />
                    </li>
                    <li>
                        <label for="checkbox">Prosjektor</label>
                        <select class="person_select" name="prosjektor">
                            <option value="null">Alle</option>
                            <option value="HDMI">HDMI</option>
                            <option value="VGA">VGA</option>
                        </select>
                    </li>
                    <li><p>Antall personer</p>
                        <select class="person_select" name="capacity">
                            <option value="null">Alle</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </li>
                </dl>
                <input type="submit" value="Søk" class="search_button" />
                </form>
            </menu>
        </div>

        <!-- Search Menu End -->
        <!-- Room Grid Start -->

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
        <!-- Room Grid End -->
    </div>
    <!-- Finder End -->
    <!-- Your Reservations Start -->
    <div id="reservation_list">
        <table>
                <tr>
                    <th class="table_head">Dato</th>
                    <th class="table_head">Romnavn</th>
                    <th class="table_head">Handlinger</th>
                </tr>
                <?php foreach($bookings as $item): ?>
                    <tr>
                        <td class="table_content"><?php echo date('d/m', strtotime(str_replace('-','/', $item['booked_from']))); ?></td>
                        <td class="table_content"><?php echo $item['room_name'] ?></td>
                        <td><form action="unbook.php" method="POST"><input type="hidden" name="booking" value="<?php echo $item['bid']; ?>" /><input type="submit" class="reserve_room" value="Slett" /></form></td>
                    </tr>
                <?php endforeach;  ?>
        </table>
    </div>
    <!-- Your Reservations End -->