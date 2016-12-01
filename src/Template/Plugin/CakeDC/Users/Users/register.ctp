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
<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
</head>
<body class="register-page row">
  <div class="row col-sm-6 register-wrapper">
    <h1 class="page-title col-sm-12">REGISTRASI</h1> 
    <div class="registrasi-detail col-sm-12">
      <?= $this->Form->create($user,array('class'=>'form-inline')); ?>

      <div class="col-sm-12">
        <?= $this->Form->input('username');?>
      </div>

      <div class="col-sm-12">
        <?= $this->Form->input('email', ['type' => 'email']);?>
      </div>

      <div class="col-sm-6">
        <?= $this->Form->input('password', ['type' => 'password']);?>
      </div>  
      <div class="col-sm-6">
        <?= $this->Form->input('password_confirm', ['type' => 'password']);?>
      </div>

      <div class="col-sm-6">
        <?= $this->Form->input('first_name');?>
      </div>
      <div class="col-sm-6">
        <?= $this->Form->input('last_name');?>
      </div>

      <div class="col-sm-12">
        <?= $this->Form->input('handphone', ['type' => 'tel']);?>
      </div>

      <?php 
        if (Configure::read('Users.Tos.required')) {
            echo $this->Form->input('tos', ['type' => 'checkbox', 'label' => __d('CakeDC/Users', 'Accept TOS conditions?'), 'required' => true]);
        }
        if (Configure::read('Users.reCaptcha.registration')) {
            echo $this->User->addReCaptcha();
        }
      ?>
      <div class="button col-sm-12">
        <?= $this->Form->button(__d('CakeDC/Users', 'DAFTAR')) ?>
      </div>
      
      <?= $this->Form->end() ?>

    </div>
  </div>
</body>
</html>
