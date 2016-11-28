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
              <h4><b>LOGIN</b></h4>
              <div class="registration-detail form-group well">
                <?= $this->Flash->render('auth') ?>
                <?= $this->Form->create() ?>
                <fieldset>
                    <?= $this->Form->input('email', ['required' => true]) ?>
                    <?= $this->Form->input('password', ['required' => true]) ?>
                    <?php
                    if (Configure::read('Users.reCaptcha.login')) {
                        echo $this->User->addReCaptcha();
                    }
                    if (Configure::read('Users.RememberMe.active')) {
                        echo $this->Form->input(Configure::read('Users.Key.Data.rememberMe'), [
                            'type' => 'checkbox',
                            'label' => __d('CakeDC/Users', 'Remember me'),
                            'checked' => 'checked'
                        ]);
                    }
                    ?>
                        <?php
                        $registrationActive = Configure::read('Users.Registration.active');
                        if ($registrationActive) {
                            echo $this->Html->link(__d('CakeDC/Users', 'Register'), ['action' => 'register']);
                        }
                        if (Configure::read('Users.Email.required')) {
                            if ($registrationActive) {
                                echo ' | ';
                            }
                            echo $this->Html->link(__d('CakeDC/Users', 'Reset Password'), ['action' => 'requestResetPassword']);
                        }
                        ?>
                </fieldset>
                <?= implode(' ', $this->User->socialLoginList()); ?>
                <?= $this->Form->button(__d('CakeDC/Users', 'Login')); ?>
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

<div class="users form">

</div>
