<h1>Project Terbaru</h1>
<ul class="newest-list">

<?php foreach ($orders as $order): ?>
    <li>
      <?= $order->id ?>
    </li>
  <?php endforeach; ?>
</ul>
