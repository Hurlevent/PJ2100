<?php $this->layout('layout', ['page_title' => 'Rombooking CK45']) ?>

<h1>Rombooking</h1>
<p>Du har <?=$this->e($bookings_count)?> booking</p>
<ul>
  <?php for($i = 0;$i < $bookings_count;$i++): ?>
    <li><p><?php echo $bookings['name']; ?></p></li>
    <li><?php echo date('d/m', strtotime(str_replace('-','/', $bookings['booked_from']))); ?></li>
    <li><?php echo date('H:i', strtotime(str_replace('-','/', $bookings['booked_from']))); ?></li>
    <li><?php echo date('H:i', strtotime(str_replace('-','/', $bookings['booked_to']))); ?></li>
  <?php endfor; ?>
</ul>