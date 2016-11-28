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
<section class="property-detail well">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 property-detail-inner">
          <div class="row">
            <div class="col-lg-3 col-md-3 text-center">
            </div>
            <div class="col-lg-6 col-md-6 text-center">
              <h4><b>REGISTRASI</b></h4>
              <div class="registration-detail form-group well">
              <?= $this->Form->create($user,array('class'=>'form-inline')); ?>
              <fieldset>
                  <?php
                  echo $this->Form->input('username');
                  echo $this->Form->input('email');
                  echo $this->Form->input('password');
                  echo $this->Form->input('password_confirm', ['type' => 'password']);
                  echo $this->Form->input('first_name');
                  echo $this->Form->input('last_name');
                  echo $this->Form->input('handphone');
                  if (Configure::read('Users.Tos.required')) {
                      echo $this->Form->input('tos', ['type' => 'checkbox', 'label' => __d('CakeDC/Users', 'Accept TOS conditions?'), 'required' => true]);
                  }
                  if (Configure::read('Users.reCaptcha.registration')) {
                      echo $this->User->addReCaptcha();
                  }
                  ?>
              </fieldset>
              <?= $this->Form->button(__d('CakeDC/Users', 'DAFTAR')) ?>
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
    text-align:left;
    margin-bottom: 20px;
    width:100%;
}
.registration-detail label {
    padding-right:90px;
    width:200px
}
.registration-detail button {
    text-align:center;
}

</style>
