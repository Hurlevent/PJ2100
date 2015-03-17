<?php $this->layout('layout', ['page_title' => 'Rombooking CK45']) ?>

<div id="wrapper">  
    <nav>
    <ul>
      <li class="navbar">Meny</li>
            <li class="navbar">Kalender</li>
      <li class="navbar">"Logget inn som"</li>
    </ul>
  </nav>
    <menu>
    <dl>
      <li>Start 
        <select>
          <option value="8">08:00</option>
          <option value="9">09:00</option>
        </select>
      </li>
      <li>Varighet
        <select>
          <option value="1t">1</option>
          <option value="2t">2</option>
        </select>
        timer
      </li>     
      <li>Prosjektor
        <form>
        <input type="checkbox" name="prosjektor" value="prosjektor" checked>
        Prosjektor
        </form>
      </li>
      <li>Antall personer
        <select>
          <option value="2pers">2</option>
          <option value="3pers">3</option>
          <option value="4pers">4</option>
        </select>
      </li>
      
    </dl>
  </menu>
  <button type="knapp">Registrer tid
  </button>
</div>

<h1>Rombooking</h1>
<p>Det er <?=$this->e($room_count)?> ledige rom i dag</p>
<ul>
  <?php foreach($rooms as $item): ?>
    <li><p><?php echo $item['id'] . ' ' . $item['name']; ?></p></li>
  <?php endforeach; ?>
</ul>
<br>
<h1>Alle rom:</h1>
<ul>
  <?php foreach($all_rooms as $item): ?>
    <li><p><?php echo $item['id'] . ' ' . $item['name']; ?></p></li>
  <?php endforeach; ?>
</ul>

<h1>Alle bookinger:</h1>
<ul>
  <?php foreach($bookings as $item): ?>
    <li><p>Room id: <?php echo $item['room_id']; ?></p></li>
    <?php echo date('d/m', strtotime(str_replace('-','/', $item['booked_from']))); ?></li>
  <?php endforeach; ?>
</ul>