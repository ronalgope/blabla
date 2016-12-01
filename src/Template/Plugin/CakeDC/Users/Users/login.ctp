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
    <title>Login Page</title>
</head>
<body class="login-page row">
   <div class="row col-sm-6 login-wrapper">
    <h1 class="page-title col-sm-12">LOGIN</h1> 
    <div class="login-detail col-sm-12">
        <?= $this->Flash->render('auth') ?>
        <?= $this->Form->create() ?>

        <div class="col-sm-12">
            <?= $this->Form->input('email', ['required' => true]) ?>
        </div>

        <div class="col-sm-12">
            <?= $this->Form->input('password', ['required' => true]) ?>
        </div>

        <?php
            if (Configure::read('Users.reCaptcha.login')) {
                echo $this->User->addReCaptcha();
            }
            if (Configure::read('Users.RememberMe.active')) {

                echo "<div class='col-sm-12'>".$this->Form->input(Configure::read('Users.Key.Data.rememberMe'), [
                    'type' => 'checkbox',
                    'label' => __d('CakeDC/Users', 'Remember me'),
                    'checked' => 'checked'
                ]). "</div>";
            }
        ?>
        <div class='col-sm-12'>
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
        </div>


        <?= implode(' ', $this->User->socialLoginList()); ?>
        <div class="button col-sm-12">
            <?= $this->Form->button(__d('CakeDC/Users', 'Login')); ?>
        </div>
        <?= $this->Form->end() ?>

    </div>
  </div>
</body>
</html>
