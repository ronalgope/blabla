<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Buyhome';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Home | Dreams Home Real Estate
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('bootstrap-select.min.css') ?>
    <?= $this->Html->css('master.css') ?>
    <?= $this->Html->css('global.css') ?>
    <?= $this->Html->css('home.css') ?>
    <?= $this->Html->css('view.css') ?>
    <?= $this->Html->css('profile.css') ?>
    <?= $this->Html->css('font-awesome.min.css') ?>
    <?= $this->Html->css('owl.carousel.css') ?>
    <?= $this->Html->css('owl.theme.default.css') ?>
    <?= $this->Html->css('jquery-ui.min.css') ?>


    <?= $this->Html->script('jquery-3.1.1.min');?>
    <?= $this->Html->script('bootstrap.min');?>
    <?= $this->Html->script('owl.carousel');?>
    <?= $this->Html->script('mmenu.min.all');?>
    <?= $this->Html->script('appjquery');?>

    <?= $this->Html->script('bootstrap-select.min');?>


    <?= $this->Html->script('jquery.matchHeight');?>
    <?= $this->Html->script('owl.carousel2.thumbs');?>



    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>

<?= $this->element('header');?>

  <!-- Main content-->
  <div id="main-container">
    <div class="row profile">
    <div class="col-sm-4 profile-sidebar-wrapper">
      <div class="profile-sidebar">
        <a href="#" class="profile-sidebar-mobile">
          <h1>Your Profile</h1><i class="fa fa-caret-down" aria-hidden="true"></i>
        </a>
        <!-- SIDEBAR USERPIC -->
         <div class="profile-userpic">
           <?= $this->Html->image(empty($user->avatar) ? $avatarPlaceholder : $user->avatar, ['width' => '180', 'height' => '180']); ?>
         </div>
         <!-- END SIDEBAR USERPIC -->
         <!-- SIDEBAR USER TITLE -->
         <div class="profile-usertitle">
           <div class="profile-usertitle-name">
             <?=
             $this->Html->tag(
                 'span',
                 __d('CakeDC/Users', '{0} {1}', $user->first_name, $user->last_name),
                 ['class' => 'full_name']
             )
             ?>
           </div>
         </div>
         <!-- END SIDEBAR USER TITLE -->

         <!-- SIDEBAR MENU -->
         <div class="profile-usermenu">
           <ul class="nav">
             <li>
               <a href="/profile">
               <i class="glyphicon glyphicon-user"></i>
               Akun Saya </a>
             </li>
             <li>
               <a href="/orders/myorder">
               <i class="glyphicon glyphicon-home"></i>
               Hunian Pribadi </a>
             </li>
             <li>
               <a href="#" target="_blank">
               <i class="glyphicon glyphicon-home"></i>
               Freelancer </a>
             </li>
             <li>
               <a href="#">
               <i class="glyphicon glyphicon-flag"></i>
               Help </a>
             </li>
           </ul>
         </div>
         <!-- END MENU -->
      </div>
       
   </div>
    <div class="col-sm-8 profile-content">
      <?= $this->fetch('content') ?>
    </div>
 </div>

  </div>
  <!-- Main contentend-->

<?= $this->element('footer');?>
</body>
</html>
