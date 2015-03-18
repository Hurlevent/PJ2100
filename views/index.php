<?php $this->layout('layout', [
  'page_title' => 'Rombooking CK45',
  'user' => $user
]) ?>

    <div id="finder">
        <div id="search_menu">
            <menu>
                <dl>
                    <li>
                        <form action="update.php" method="POST">
                        <h3>Sett filter</h3>
                    </li>
                    <li>
                        <input type="date" name="dato" />
                    </li>
                    <li>
                            <label for="checkbox">Prosjektor</label>
                            <input type="checkbox" id="checkbox" name="prosjektor" checked>
                    </li>
                    <li><p>Antall personer</p>
                        <select class="person_select" name="capacity">
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
        <div id="shedule_list">
            <table class="kalender">
              <tr>
                <td class='table_head'>Room name</td>
                <td class='table_head'>Capacity</td>
                <td class='table_head'>Prosjektor</td>
              </tr>
              <?php foreach($free_rooms as $item): ?>
                <tr>
                  <td><?php echo $item['rname'] ?></td>
                  <td><?php echo $item['capacity'] ?></td>
                  <td><?php echo $item['projector'] ?></td>
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