<div class="property-detail">
    <div class="container">
        <div class="col-lg-12 col-md-12 property-detail-inner">
          <div class="row">
            <div class="col-lg-12 col-md-12 text-center">
              <h2>Konfirmasi Pembelian</h2>
              <?php
              $unit = '';
              foreach($project->_matchingData as $unt):
                $unit = $unt;
              endforeach;
                ?>
                <h4><?= $project->name.' '.$unit->name ?></h4>
            </div>
          </div>
        </div>
  </div>
</div>

<div class="property-detail">
    <div class="container">

      </div>
</div>
<div class="property-detail">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-8 property-detail-inner">
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <h3>Pilih Pembayaran</h3>
              <table class="table table-striped">
                <tr>
                  <td>
                    Harga
                  </td>
                  <td>
                  </td>
                  <td>
                    <?= $unit->price ?>
                  </td>
                </tr>
                <tr>
                </tr>
                <tr>
                  <td>
                    <h4>Cara Pembayaran</h4>
                  </td>
                  <td>
                  </td>
                  <td>
                  </td>
                </tr>
                <tr>
                  <td>
                    <b>KPR</b>
                  </td>
                  <td>
                    12 SAMPAI 42 BULAN
                  </td>
                  <td>
                  </td>
                </tr>
                <tr>
                  <td>
                    <b>HARD CASH</b>
                  </td>
                  <td>
                    3X PEMBAYARAN SELAMA 3 BULAN
                  </td>
                  <td>
                  </td>
                </tr>
                <tr>
                  <td>
                    <b>CASH BERTAHAP</b>
                  </td>
                  <td>
                    6 SAMPAI 24 BULAN
                  </td>
                  <td>
                  </td>
                </tr>
                <tr>
                  <td>
                    <b>CASH DP</b>
                  </td>
                  <td>
                    3X PEMBAYARAN MAKSIMAL 3 BULAN
                  </td>
                  <td>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
<?= $this->Form->create($order, ['url' => ['action' => 'createorder']]); ?>
<?= $this->Form->hidden('units_id',['value'=> $unit->id]); ?>
<div class="property-detail">
    <div class="container">
        <div class="col-lg-12 col-md-12 property-detail-inner">
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <div class="radio" style="padding-bottom:20px">
              <label><input type="radio" name="optradio" value="0"><b>KPR</b></label>
              <div>
                <table class="table table-condensed">
                  <tr>
                    <td style="width:200px">Booking Fee</td>
                    <td style="width:90px"></td>
                    <td style="width:160px;text-align:right;padding-right:10px"><?= $unit->bookingfee ?></td>
                    <td  style="width:200px"></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td style="width:200px">Besaran DP (%)</td>
                    <td style="width:90px">20%</td>
                    <td style="width:160px;text-align:right;padding-right:10px">
                      <?php
                      $total = ($unit->price - ($unit->price*(1/2))-$unit->bookingfee)*(1/5);
                      ?>
                      <?= $total ?></td>
                      <td  style="width:200px">Discount</td>
                      <td>50%</td>
                  </tr>
                  <tr>
                    <td style="width:200px" >Lama angsuran</td>
                    <td style="width:90px">12</td>
                    <td class="success" style="width:160px;text-align:right;padding-right:10px">
                      <?php
                      $totalangsur = $total / 12;
                      ?>
                      <?= round($totalangsur) ?></td>
                    <td  style="width:200px"></td>
                    <td></td>
                  </tr>
                </table>
              </div>
            </div>
            <div class="radio" style="padding-bottom:20px">
              <label><input type="radio" name="optradio" value="1"><b>HARD CASH</b></label>
              <div>
                <table class="table table-condensed">
                  <tr>
                    <td style="width:200px">Booking Fee</td>
                    <td style="width:90px"></td>
                    <td style="width:160px;text-align:right;padding-right:10px"><?= $unit->bookingfee ?></td>
                    <td  style="width:200px"></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td style="width:200px"></td>
                    <td style="width:90px"></td>
                    <td style="width:160px;text-align:right;padding-right:10px">
                      <?php
                      $total = $unit->price - ($unit->price * (1/2)) - $unit->bookingfee;
                      ?>
                      <?= $total ?></td>
                      <td  style="width:200px">Discount</td>
                      <td>50%</td>
                  </tr>
                  <tr>
                    <td style="width:200px" >Lama angsuran</td>
                    <td style="width:90px">3</td>
                    <td class="success" style="width:160px;text-align:right;padding-right:10px">
                      <?php
                      $totalangsur = $total / 3;
                      ?>
                      <?= round($totalangsur) ?></td>
                    <td  style="width:200px"></td>
                    <td></td>
                  </tr>
                </table>
              </div>
            </div>
            <div class="radio" style="padding-bottom:20px">
            <label><input type="radio" name="optradio" value="2"><b>CASH BERTAHAP</b></label>
            <table class="table table-condensed">
              <tr>
                <td style="width:200px">Booking Fee</td>
                <td style="width:90px"></td>
                <td style="width:160px;text-align:right;padding-right:10px"><?= $unit->bookingfee ?></td>
                <td  style="width:200px"></td>
                <td></td>
              </tr>
              <tr>
                <td style="width:200px"></td>
                <td style="width:90px"></td>
                <td style="width:160px;text-align:right;padding-right:10px">
                  <?php
                  $total = $unit->price - ($unit->price * (1/2)) - $unit->bookingfee;
                  ?>
                  <?= $total ?></td>
                  <td  style="width:200px">Discount</td>
                  <td>50%</td>
              </tr>
              <tr>
                <td style="width:200px" >Lama angsuran</td>
                <td style="width:90px">12</td>
                <td class="success" style="width:160px;text-align:right;padding-right:10px">
                  <?php
                  $totalangsur = $total / 12;
                  ?>
                  <?= round($totalangsur) ?></td>
                <td  style="width:200px"></td>
                <td></td>
              </tr>
            </table>
            </div>
            <div class="radio" style="padding-bottom:20px">
            <label><input type="radio" name="optradio" value="3"><b>CASH DP</b></label>
            <table class="table table-condensed">
              <tr>
                <td style="width:200px">Booking Fee</td>
                <td style="width:90px"></td>
                <td style="width:160px;text-align:right;padding-right:10px"><?= $unit->bookingfee ?></td>
                <td  style="width:200px"></td>
                <td></td>
              </tr>
              <tr>
                <td style="width:200px">Besaran DP (%)</td>
                <td style="width:90px">20%</td>
                <td style="width:160px;text-align:right;padding-right:10px">
                  <?php
                  $total = ($unit->price - ($unit->price*(1/2))-$unit->bookingfee)*(1/5);
                  ?>
                  <?= $total ?></td>
                  <td  style="width:200px">Discount</td>
                  <td>50%</td>
              </tr>
              <tr>
                <td style="width:200px">Lama angsuran</td>
                <td style="width:90px">2</td>
                <td class="success" style="width:160px;text-align:right;padding-right:10px">
                  <?php
                  $totalangsur = $total / 2;
                  ?>
                  <?= round($totalangsur) ?></td>
                <td  style="width:200px"></td>
                <td></td>
              </tr>
            </table>
            </div>
            </div>
          </div>
        </div>
  </div>
</div>

<div class="property-detail">
    <div class="container">
        <div class="col-lg-12 col-md-12 property-detail-inner">
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <h3>Pilih Pembeli</h3>
              <table class="table table-condensed">
                <tr>
                  <td style="margin-left:10px"><label><input type="radio" name="optradio2" value="0">  <b>Beli untuk diri sendiri</b></label></td>
                  <td  style="margin-left:10px"><label><input type="radio" name="optradio2" value="1">  <b>Beli untuk orang lain</b></label></td>
                </tr>
                <tr>

                </tr>
              </table>
            </div>
          </div>
        </div>
  </div>
</div>

<section class="property-detail">
    <div class="container">
        <div class="col-lg-12 col-md-12 property-detail-inner">
          <div class="row">
            <div class="col-lg-12 col-md-12 text-center">
              <h2><?= $this->Form->button('PESAN SEKARANG'); ?></h2>
            </div>
          </div>
        </div>
  </div>
</section>
