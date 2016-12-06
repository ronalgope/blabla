<div class="cart-page">
  <div class="block-header"><hr><h1>Konfirmasi Pembelian</h1></div>
  <div class="unit-name">
    <?php
      $unit = '';
      foreach($project->_matchingData as $unt):
        $unit = $unt;
      endforeach;
    ?>
    <h1><?= $project->name.' '.$unit->name ?></h1>
    <h1 class="cart-price">Harga: <?= $unit->price ?></h1>
  </div>

  <div class="unit-detail row">
    <div class="cara-pembayaran row col-sm-12">
      <div class="block-header"><hr><h1>Cara Pembayaran</h1></div>

      <div class="table-responsive info-pembayaran">
        <table class="table table-bordered table-striped">
          <colgroup>
            <col class="col-xs-1">
            <col class="col-xs-7">
          </colgroup>
          <tbody>
            <tr>
            <tr>
              <th scope="row">KPR</th>
              <td>12 SAMPAI 42 BULAN</td>
            </tr>
            <tr>
              <th scope="row">HARD CASH</th>
              <td>3X PEMBAYARAN SELAMA 3 BULAN</td>
            </tr>
            <tr>
              <th scope="row">CASH BERTAHAP</th>
              <td>6 SAMPAI 24 BULAN</td>
            </tr>
            <tr>
              <th scope="row">CASH DP</th>
              <td>3X PEMBAYARAN MAKSIMAL 3 BULAN</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="pilih-pembayaran row col-sm-12">
      <div class="block-header"><hr><h1>Pilih Cara Pembayaran</h1></div>
      <?= $this->Form->create($order, ['url' => ['action' => 'createorder']]); ?>
      <?= $this->Form->hidden('units_id',['value'=> $unit->id]); ?>
      <?= $this->Form->hidden('price',['value'=> $unit->price]); ?>
      <!--Pilihan KPR -->
      <div class="pilih-list row">
        <div class="col-sm-12 pilih-top">
          <div class="radio">
            <label>
              <input type="radio" name="optradio" id="optionsRadios1" value="0" checked>
              KPR
            </label>
          </div>
        </div>
        <div class="col-sm-7 row pilih-desc">
          <div class="col-sm-5 col-xs-6">Booking Fee</div>
          <div class="col-sm-5 col-xs-6 col-sm-offset-2 text-right"><input type="hidden" name="0bf" value="<?= $unit->bookingfee ?>"/><?= $unit->bookingfee ?></div>

          <div class="col-sm-5 col-xs-6">Discount (%)</div>
          <div class="col-sm-2 col-xs-6"> 50% </div>
          <div class="col-sm-5 col-xs-12 text-right">
            <?php
              $totaldic = $unit->price*(1/2);
              echo $totaldic;
            ?>
          </div>

          <div class="col-sm-5 col-xs-6">Besaran DP (%)</div>
          <div class="col-sm-2 col-xs-6"> 20% </div>
          <div class="col-sm-5 col-xs-12 text-right">
            <?php
              $total = ($unit->price - $totaldic - $unit->bookingfee)*(1/5);
            ?>
            <input type="hidden" name="0dp" value="<?= $total ?>"/>
            <?= $total ?>
          </div>



          <div class="col-sm-5 col-xs-6">Lama angsuran</div>
          <div class="col-sm-2 col-xs-6"> 12<input type="hidden" name="0lamaangsur" value="12"/></div>
          <div class="col-sm-5 col-xs-12 text-right">
            <?php
              $totalangsur = $total / 12;
            ?>
            <input type="hidden" name="0totalangsur" value="<?= round($totalangsur) ?>"/>
            <?= round($totalangsur) ?>
          </div>
        </div>
      </div>

      <!--HARD CASH-->
      <div class="pilih-list row">
        <div class="col-sm-12 pilih-top">
          <div class="radio">
            <label>
              <input type="radio" name="optradio" id="optionsRadios1" value="1">
              HARD CASH
            </label>
          </div>
        </div>
        <div class="col-sm-7 row pilih-desc">
          <div class="col-sm-5 col-xs-6">Booking Fee</div>
          <div class="col-sm-5 col-xs-12 col-sm-offset-2 text-right"><input type="hidden" name="1bf" value="<?= $unit->bookingfee ?>"/><?= $unit->bookingfee ?></div>

          <div class="col-sm-5 col-xs-6">Discount (%)</div>
          <div class="col-sm-2 col-xs-6">50%</div>
          <div class="col-sm-5 col-xs-12 text-right">
            <?php
              $total = $unit->price - ($unit->price * (1/2)) - $unit->bookingfee;
              ?>
            <input type="hidden" name="1dp" value="<?= $total ?>"/>
            <?= $total ?>
          </div>

          <div class="col-sm-5 col-xs-6">Lama angsuran</div>
          <div class="col-sm-2 col-xs-6"> 3 <input type="hidden" name="1lamaangsur" value="3"/></div>
          <div class="col-sm-5 col-xs-12 text-right">
            <?php
              $totalangsur = $total / 3;
            ?>
            <input type="hidden" name="1totalangsur" value="<?= round($totalangsur) ?>"/>
            <?= round($totalangsur) ?>
          </div>
        </div>
      </div>

      <!--CASH BERTAHAP -->
      <div class="pilih-list row">
        <div class="col-sm-12 pilih-top">
          <div class="radio">
            <label>
              <input type="radio" name="optradio" id="optionsRadios1" value="2">
              CASH BERTAHAP
            </label>
          </div>
        </div>
        <div class="col-sm-7 row pilih-desc">
          <div class="col-sm-5 col-xs-6">Booking Fee</div>
          <div class="col-sm-5 col-xs-12 col-sm-offset-2 text-right"><input type="hidden" name="2bf" value="<?= $unit->bookingfee ?>"/><?= $unit->bookingfee ?></div>

          <div class="col-sm-5 col-xs-6">Discount (%)</div>
          <div class="col-sm-2 col-xs-6"> 50% </div>
          <div class="col-sm-5 col-xs-12 text-right">
            <?php
              $total = $unit->price - ($unit->price * (1/2)) - $unit->bookingfee;
            ?>
            <input type="hidden" name="2dp" value="<?= $total ?>"/>
            <?= $total ?>
          </div>


          <div class="col-sm-5 col-xs-6">Lama angsuran</div>
          <div class="col-sm-2 col-xs-6"> 12 <input type="hidden" name="2lamaangsur" value="12"/></div>
          <div class="col-sm-5 col-xs-12 text-right">
            <?php
              $totalangsur = $total / 12;
            ?>
            <input type="hidden" name="2totalangsur" value="<?= round($totalangsur) ?>"/>
            <?= round($totalangsur) ?>
          </div>
        </div>
      </div>

      <!--CASH DP -->
      <div class="pilih-list row">
        <div class="col-sm-12 pilih-top">
          <div class="radio">
            <label>
              <input type="radio" name="optradio" id="optionsRadios1" value="3">
              CASH DP
            </label>
          </div>
        </div>
       <div class="col-sm-7 row pilih-desc">
          <div class="col-sm-3">Booking Fee</div>
          <div class="col-sm-2">&nbsp; </div>
          <div class="col-sm-7 text-right"><input type="hidden" name="3bf" value="<?= $unit->bookingfee ?>"/><?= $unit->bookingfee ?></div>

          <div class="col-sm-5 col-xs-6">Discount (%)</div>
          <div class="col-sm-2 col-xs-6"> 50% </div>
          <div class="col-sm-5 col-xs-12 text-right">
            <?php
              $totaldic = $unit->price*(1/2);
              echo $totaldic;
            ?>
          </div>

          <div class="col-sm-5 col-xs-6">Besaran DP (%)</div>
          <div class="col-sm-2 col-xs-6"> 20% </div>
          <div class="col-sm-5 col-xs-12 text-right">
            <?php
              $total = ($unit->price - ($unit->price*(1/2))-$unit->bookingfee)*(1/5);
            ?>
            <input type="hidden" name="3dp" value="<?= $total ?>"/>
            <?= $total ?>
          </div>


          <div class="col-sm-5 col-xs-6">Lama angsuran</div>
          <div class="col-sm-2 col-xs-6"> 2 <input type="hidden" name="3lamaangsur" value="2"/></div>
          <div class="col-sm-5 col-xs-12 text-right">
            <?php
              $totalangsur = $total / 2;
            ?>
            <input type="hidden" name="3totalangsur" value="<?= round($totalangsur) ?>"/>
            <?= round($totalangsur) ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="pilih-pembeli">
    <div class="block-header"><hr><h1>Pilih Pembeli</h1></div>
    <div>
      <div class="radio">
        <label><input type="radio" name="optradio2" value="0">  <b>Beli untuk diri sendiri</b></label>
      </div>
    </div>
    <div>
      <div class="radio">
            <label><input type="radio" name="optradio2" value="1">  <b>Beli untuk orang lain</b></label>
          </div>
    </div>
  </div>


  <div class="button-wrapper">
     <h2><?= $this->Form->button('PESAN SEKARANG'); ?></h2>
  </div>

</div>
