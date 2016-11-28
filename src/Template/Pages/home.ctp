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
        <li class="item"><?= $this->Html->image('home-slider/slider1.jpg', ['alt' => 'Slider Image']);?></li> 
        <li class="item"><?= $this->Html->image('home-slider/slider2.jpg', ['alt' => 'Slider Image']);?></li> 
        <li class="item"><?= $this->Html->image('home-slider/slider3.jpg', ['alt' => 'Slider Image']);?></li> 
        <li class="item"><?= $this->Html->image('home-slider/slider4.jpg', ['alt' => 'Slider Image']);?></li> 
        <li class="item"><?= $this->Html->image('home-slider/slider5.jpg', ['alt' => 'Slider Image']);?></li> 
    </ul>
  </div>

  <div class="new-project">
    <?php $cell = $this->cell('Project');
      echo $cell;
    ?>
  </div>
    

<!-- our-services -->
  <div class="our-service">
    <h1>Layanan Kami</h1>
    <ul>
      <li>
        <span>Mudah digunakan dan transparan</span>
        <i class="fa fa-shopping-bag" aria-hidden="true"></i>
      </li>
      <li>
        <span>Harga jujur <br/>dan lebih murah</span>
        <i class="fa fa-money" aria-hidden="true"></i>
      </li>
      <li>
        <span>Jaminan pembelian online yang aman</span>
        <i class="fa fa-lock" aria-hidden="true"></i>
      </li>
      <li>
        <span>Dapat dijual kembali melalui forum kami</span>
        <i class="fa fa-users" aria-hidden="true"></i>
      </li>
    </ul>
  </div>

  <?php echo $this->fetch('dashboard'); ?>
  
  <div class="partner-section">
    <h1>Mitra kami</h1>
    <ul class="partner-list">
      <li class="item">
        <?= $this->Html->image('home-slider/slider1.jpg', ['alt' => 'Slider Image']);?>
      </li>
      <li class="item">
        <?= $this->Html->image('home-slider/slider1.jpg', ['alt' => 'Slider Image']);?>
      </li>
      <li class="item">
        <?= $this->Html->image('home-slider/slider1.jpg', ['alt' => 'Slider Image']);?>
      </li>
    </ul>
  </div>

</body>
</html>
