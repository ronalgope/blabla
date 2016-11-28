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
    <?= $this->Html->css('global.css') ?>
    <?= $this->Html->css('home.css') ?>
    <?= $this->Html->css('font-awesome.min.css') ?>
    <?= $this->Html->css('owl.carousel.css') ?>
    <?= $this->Html->css('owl.theme.default.css') ?>
    <?= $this->Html->css('jquery-ui.min.css') ?>
    

    <?= $this->Html->script('jquery-1.11.3');?>
    <?= $this->Html->script('jquery-3.1.1.min');?>
    <?= $this->Html->script('owl.carousel');?>
    <?= $this->Html->script('appjquery');?>
    <?= $this->Html->script('bootstrap.min');?>
    <?= $this->Html->script('bootstrap-select.min');?>
    <?= $this->Html->script('jquery-ui.min');?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
  <!-- Header Start -->
  <div id="header">
    <div id="header-container">
      <div class="logo-header"> <a href="/pages/home"><?= $this->Html->image('logo2.png', array('id' => 'logo-header')); ?></a> </div>

      <div class="search-top">
        <input type="text" id="search_field" class="form-control" placeholder="Cari rumah....">
        <div class="selector">
          <select class="selection selectpicker" id="rent-sale"" title="Kategori">
            <option>Apa aja</option>
            <option>For sale</option>
          </select>
        </div>
        <button type="submit" class="btn btn-search"><i class="fa fa-search" aria-hidden="true"></i>&nbsp;</button>
      </div>
      <ul class="menu-list">
          <li class="check-ticket">
              <a href="/users/users/register"><i class="fa fa-sign-in" aria-hidden="true"></i>Daftar</a>
          </li>
          <li class="contact-us">
              <a href="/login"><i class="fa fa-lock" aria-hidden="true"></i>Masuk</a>
          </li>
          <li class="login-menu">
              <a href="#"><i class="fa fa-users" aria-hidden="true"></i>Forum</a>
          </li>
      </ul>
    </div>
  </div>
  <!-- Header Ends -->

  <!-- Main content-->
  <div id="main-container">
      <?= $this->fetch('content') ?>
  </div>
  <!-- Main contentend-->
  
  <!-- Footer -->
  <div id="footer">
    <div id="footer-container">
      <ul class="footer-list">
        <li class="buy-home-about">
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
        <li class="pembeli-footer">
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
        <li class="mensos-temukan">
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
        <li class="newsletter-footer">
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
</body>
</html>
