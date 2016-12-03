<h1>Hunian Pribadi</h1>
<table class="table table-striped table-responsive">
  <thead>
    <td>ID</td>
    <td>Unit</td>
    <td>Status</td>
    <td>Harga</td>
    <td>Booking Fee</td>
    <td>Lama angsuran</td>
    <td>Angsuran tiap bulan</td>
    <td>Aksi</td>
  </thead>
  <tbody>
    <?php foreach ($orders as $order): ?>
        <tr>
          <td><?= $order->id?></td>
          <td><?= $order->unit->name?></td>
          <td><?= $order->status?></td>
          <td><?= $order->price?></td>
          <td><?= $order->bf?></td>
          <td><?= $order->lamaangsuran?></td>
          <td><?= $order->totalangsuran?></td>
          <td><?= $this->Html->link('detail',['controller'=>'orders','action'=>'mydetailorder',$order->id])?></td>
        </tr>
      <?php endforeach; ?>
  </tbody>
</table>
