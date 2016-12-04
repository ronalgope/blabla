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
    <?= $this->Html->script('svg-pan-zoom');?>



    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>

  <!-- Header Start -->
  <?= $this->element('header');?>

  <!-- Main content-->
  <div id="main-container">
      <?= $this->fetch('content') ?>
  </div>
  <!-- Main contentend-->

  <!-- Footer -->
  <?= $this->element('footer');?>
  <!-- footer-end-->
</body>
</html>
