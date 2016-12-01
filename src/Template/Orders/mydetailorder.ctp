<h1>Hunian Pribadi</h1>
<blockquote>
  <p>Order <?= $order->id?> -  <?= $order->status?></p>
</blockquote>
<ul>
  <li><?= $order->id?></li>
  <li><?= $order->unit->name?></li>
  <li><?= $order->status?></li>
  <li><?= $order->price?></li>
  <li><?= $order->bf?></li>
  <li><?= $order->lamaangsuran?></li>
  <li><?= $order->totalangsuran?></li>
</ul>

<?php if($order->ispaidbf == 0):?>
<?= $this->Html->link('Bayar Booking Fee',['controller'=>'invoices','action'=>'payment',$order->id],['class'=>'btn btn-default'])?>
<?php endif;?>
