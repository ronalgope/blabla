<div>
  <h1 class="text-center">Booking Fee</h1>
  <table class="table">
    <tr>
      <td>Sudah Terima Dari</td>
      <td>:</td>
      <td><?= $user->first_name.' '.$user->last_name?></td>
    </tr>
    <tr>
      <td>Banyaknya Uang</td>
      <td>:</td>
      <td><?= $order->bf?></td>
    </tr>
    <tr>
      <td>Untuk Pembayaran</td>
      <td>:</td>
      <td>Booking Fee</td>
    </tr>
    <tr>
      <td>Perumahan</td>
      <td>:</td>
      <td><?= $project->name?></td>
    </tr>
    <tr>
      <td>Unit</td>
      <td>:</td>
      <td><?= $order->unit->name?></td>
    </tr>
    <tr>
      <td>Harga jual</td>
      <td>:</td>
      <td><?= $order->price?></td>
    </tr>
    <tr>
      <td>DP</td>
      <td>:</td>
      <td><?= $order->dp?></td>
    </tr>
    <tr>
      <td>No Telp/HP</td>
      <td>:</td>
      <td><?= $user->handphone?></td>
    </tr>
    <tr>
      <td>No Telp/HP keluarga</td>
      <td>:</td>
      <td><?= $user->otherhandphone?></td>
    </tr>
    <tr>
      <td>Jumlah</td>
      <td>:</td>
      <td><?= $order->bf?></td>
    </tr>
  </table>
  <blockquote>
    <p><b>Catatan :</b><br/>
PASAL - I : Setelah melakukan pembayaran booking fee /tanda jadi ,paling lambat 2 (dua) minggu kelender wajib mulai membayar uang angsuran (sesuai)pembayaran ,bial tidak maka,uang booking fee /tanda jadi tersebut hangus secara otomatis(tanpa  ada pemberitahuan sebelumnya)<br/>
PASAL-II : No Telp/HP WAJIB diisi dengan benar ,apabila No telp/ HP yang diberikan tidak dapat di hub(tidak active)dan juga tidak memberikan No telp/HP pengganti dan atau keluarga yang tidak serumah ,maka dalam hal ini di anggap LALAI maka sesuai dalam pasal I diatas.<br/>
</p>
  </blockquote>
  <div>

    <fieldset>
      <?= $this->Form->create(null,[
        'url' => ['controller'=>'Bookingfees','action'=>'add']
      ]); ?>
        <?php
            echo $this->Form->hidden('orders_id',['value'=> $order->id]);
            echo $this->Form->hidden('name',['value'=> $user->first_name.' '.$user->last_name]);
            echo $this->Form->hidden('statement',['value'=> 'pembayaran booking fee']);
            echo $this->Form->hidden('project',['value'=> $project->name]);
            echo $this->Form->hidden('type',['value'=> $order->unit->name]);
            echo $this->Form->hidden('price',['value'=> $order->bf]);
            echo $this->Form->hidden('dp',['value'=> $order->dp]);
            echo $this->Form->hidden('hp',['value'=> $user->handphone]);
            echo $this->Form->hidden('otherhp',['value'=> $user->handphone]);
            echo $this->Form->hidden('total',['value'=> $order->price]);
        ?>
        <?= $this->Form->button(__('Konfirmasi')) ?>
        <?= $this->Form->end() ?>
    </fieldset>

</div><!-- /.row -->
</div>
