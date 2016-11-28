<?php
/**
 * Copyright 2010 - 2015, Cake Development Corporation (http://cakedc.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2010 - 2015, Cake Development Corporation (http://cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

use Cake\Core\Configure;

?>

<section class="property-detail">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 property-detail-inner">
          <div class="row">
            <div class="col-lg-3 col-md-3 text-center">
            </div>
            <div class="col-lg-6 col-md-6 text-center">
              <h4><b>ACTIVATION</b></h4>
              <p>SILAHKAN MASUKKAN CODE VERIVIKASI YANG TELAH DIKIRIM KE HANDPHONE ANDA UNTUK AKTIVASI AKUN</p>
              <div class="registration-detail form-group well">
                  <?= $this->Form->create(null,[
                    'url' => ['controller'=> 'Activation','action'=>'activation']
                    ]) ?>
                <fieldset>
                    <?= $this->Form->input('kode', ['required' => true]) ?>
                </fieldset>
                <?= $this->Form->button(__d('CakeDC/Users', 'AKTIVASI')); ?>
                <?= $this->Form->end() ?>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 text-center">
          </div>
          </div>
        </div>
      </div>
  </div>
</section>

<style>
.registration-detail{
  text-align:left;
}
.registration-detail input {
    padding-left:20px;
    text-align:left;
    margin-bottom: 20px;
}
.registration-detail label {
    padding-right:90px;
    width:200px
}
.registration-detail button {
    text-align:center;
}

</style>

<div class="users form">

</div>
