<div class="block-header"><hr><h1>Hunian Pribadi</h1></div>
<h1> Order <?= $order->id?> -  <?= $order->status?></h1>
<table class="table table-striped table-responsive">
  <tbody>
    <tr>
      <td>Order ID</td>
      <td><?= $order->id?></td>
    </tr>
    <tr>
      <td>Order Name</td>
      <td><?= $order->unit->name?></td>
    </tr>
    <tr>
      <td>Order Status</td>
      <td><?= $order->status?></td>
    </tr>
    <tr>
      <td>Order Price</td>
      <td><?= $order->price?></td>
    </tr>
    <tr>
      <td>Booking Fee</td>
      <td><?= $order->bf?></td>
    </tr>
    <tr>
      <td>Lama Angsuran</td>
      <td><?= $order->lamaangsuran?></td>
    </tr>
    <tr>
      <td>Total Angsuran</td>
      <td><?= $order->totalangsuran?></td>
    </tr>
  </tbody>
</table>
<button>
<?php if($order->ispaidbf == 0):?>
<?= $this->Html->link('Bayar Booking Fee',['controller'=>'invoices','action'=>'payment',$order->id])?>
<?php endif;?>
</button>
