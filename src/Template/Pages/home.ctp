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
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

if (!Configure::read('debug')):
    throw new NotFoundException('Please replace src/Template/Pages/home.ctp with your own version.');
endif;

$cakeDescription = 'Buyhome';
?>
<!DOCTYPE HTML>
<html>
<body class="home">

  <div class="home-slider">
    <ul class="slider-list owl-carousel">
        <li class="item">
          <div class="item-img" style="width:100%;height:500px;background-image:url(img/home-slider/slider1.jpg)">
          <div class="slider-content">
            <div class="header_title">
              <h1>The simplest way to find Property</h1>
              <h4>Lorem Ipsum is simply dummy text of the printing <br>and typesetting industry.</h4>
            </div>
            <?= $this->element('search_home');?>
          </div> 
          
        </li> 
        <li class="item">
          <div class="item-img" style="width:100%;height:500px;background-image:url(img/home-slider/slider4.jpg)">
          <div class="slider-content">
            <div class="header_title">
              <h1>The simplest way to find Property</h1>
              <h4>Lorem Ipsum is simply dummy text of the printing <br>and typesetting industry.</h4>
            </div>
            <?= $this->element('search_home');?>
          </div> 
        </li>
    </ul>
  </div>

  <div class="new-project">
    <?php $cell = $this->cell('Project');
      echo $cell;
    ?>
    <a href="#" class="see-more">Selengkapnya...</a>
  </div>
    

  <!-- Layanan kami -->
  <?= $this->element('layanan_kami'); ?>

  <!-- Mitra kami -->
  <?= $this->element('mitra_kami'); ?>

  <!-- Cara Pembayaran -->
  <?= $this->element('cara_pembayaran'); ?>
</body>
</html>
