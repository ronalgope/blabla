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

  <!-- Header Start -->
  <header id="navigation header-container-box" class="navigation affix-top menu-line" data-offset-top="2" data-spy="affix">
    <div class="container" id="menu-nav">
      <div class="row">
        <div class="col-lg-4 col-md-6 col-xs-6">
          <div class="logo"><a href="/pages/home"><?= $this->Html->image('logo2.png', array('id' => 'logo-header')); ?></a></div>
        </div>
        <!-- /.logo -->
        <div class="col-lg-8 col-md-6 col-xs-6"> <a class="visible-xs" href="#mobile-menu" id="mobile-menu-button"><i class="fa fa-bars"></i></a>
          <nav id="navigation" class="pull-right">
            <ul>

              <?php
                if($user):
               ?>
               <li>
                 <a class="hvr-overline-from-center" href="/profile"><i class="fa fa-sign-in" aria-hidden="true"></i>Profile</a>
               </li>
              <li class="contact-us-top">
                  <a class="hvr-overline-from-center" href="/logout"><i class="fa fa-lock" aria-hidden="true"></i>Logout</a>
              </li>
            <?php else : ?>
              <li>
                <a class="hvr-overline-from-center" href="/users/users/register"><i class="fa fa-sign-in" aria-hidden="true"></i>Daftar</a>
              </li>
              <li class="contact-us-top">
                  <a class="hvr-overline-from-center" href="/login"><i class="fa fa-lock" aria-hidden="true"></i>Masuk</a>
              </li>
            <?php endif;?>
              <li class="login-menu">
                  <a class="hvr-overline-from-center" href="#"><i class="fa fa-users" aria-hidden="true"></i>Forum</a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>

  <!-- Main content-->
  <div id="main-container">
    <div class="row profile">
   <div class="col-md-3">
     <div class="profile-sidebar">
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
             <a href="#">
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
   <div class="col-md-9">
           <div class="profile-content">
        <?= $this->fetch('content') ?>
           </div>
   </div>
 </div>

  </div>
  <!-- Main contentend-->

  <!-- Footer -->
  <div id="footer">
    <div id="footer-container">
      <ul class="footer-list row">
        <li class="buy-home-about col-md-3 col-sm-6 col-xs-12">
          <h1 class="title">
            Buyhome
          </h1>
          <ul class="footer-sublist">
            <li><a href="#">Tentang Buyhome</a></li>
            <li><a href="#">Aturan Penggunaan</a></li>
            <li><a href="#">Karir</a></li>
            <li><a href="#">Mitra buyhome</a></li>
          </ul>
        </li>
        <li class="pembeli-footer col-md-3 col-sm-6 col-xs-12">
          <h1 class="title">
            Pembeli
          </h1>
          <ul class="footer-sublist">
            <li><a href="#">Cara Membeli</a></li>
            <li><a href="#">Keamanan Pembayaran</a></li>
            <li><a href="#">Simulasi KPR</a></li>
            <li><a href="#">Artikel</a></li>
          </ul>
        </li>
        <li class="mensos-temukan col-md-3 col-sm-6 col-xs-12">
          <h1 class="title">
            Temukan Kami di
          </h1>
          <div class="medsos-footer">
            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i>&nbsp;</a>
            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i>&nbsp;</a>
            <a href="#"><i class="fa fa-youtube" aria-hidden="true"></i>&nbsp;</a>
            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i>&nbsp;</a>
          </div>
        </li>
        <li class="newsletter-footer col-md-3 col-sm-6 col-xs-12">
          <h1 class="title">
            Buyhome News Letter
          </h1>
          <form action="#" class="searchform">
            <input type="text" placeholder="Your email address" />
            <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
            <p>Dapatkan berita terbaru dari <br />
              website kami...</p>
          </form>
        </li>
      </ul>

    </div>
    <div class="copy-right">
      Copyright © 2016 PT Buy Group Indonesia
    </div>
  </div>
  <!-- footer-end-->
  <style>
  /***
User Profile Sidebar by @keenthemes
A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
Licensed under MIT
***/

body {
background: #F1F3FA;
}

/* Profile container */
.profile {
margin: 20px 0;
}

/* Profile sidebar */
.profile-sidebar {
padding: 20px 0 10px 0;
background: #fff;
}

.profile-userpic img {
float: none;
margin: 0 auto;
width: 50%;
height: 50%;
-webkit-border-radius: 50% !important;
-moz-border-radius: 50% !important;
border-radius: 50% !important;
}

.profile-usertitle {
text-align: center;
margin-top: 20px;
}

.profile-usertitle-name {
color: #5a7391;
font-size: 16px;
font-weight: 600;
margin-bottom: 7px;
}

.profile-usertitle-job {
text-transform: uppercase;
color: #5b9bd1;
font-size: 12px;
font-weight: 600;
margin-bottom: 15px;
}

.profile-userbuttons {
text-align: center;
margin-top: 10px;
}

.profile-userbuttons .btn {
text-transform: uppercase;
font-size: 11px;
font-weight: 600;
padding: 6px 15px;
margin-right: 5px;
}

.profile-userbuttons .btn:last-child {
margin-right: 0px;
}

.profile-usermenu {
margin-top: 30px;
}

.profile-usermenu ul li {
border-bottom: 1px solid #f0f4f7;
}

.profile-usermenu ul li:last-child {
border-bottom: none;
}

.profile-usermenu ul li a {
color: #93a3b5;
font-size: 14px;
font-weight: 400;
}

.profile-usermenu ul li a i {
margin-right: 8px;
font-size: 14px;
}

.profile-usermenu ul li a:hover {
background-color: #fafcfd;
color: #5b9bd1;
}

.profile-usermenu ul li.active {
border-bottom: none;
}

.profile-usermenu ul li.active a {
color: #5b9bd1;
background-color: #f6f9fb;
border-left: 2px solid #5b9bd1;
margin-left: -2px;
}

/* Profile Content */
.profile-content {
padding: 20px;
background: #fff;
min-height: 460px;
}
  </style>
</body>
</html>
