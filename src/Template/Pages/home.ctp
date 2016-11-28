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
<body>

  <div class="home-slider">
    <ul class="slider-list owl-carousel">
        <li class="item"><?= $this->Html->image('home-slider/slider1.jpg', ['alt' => 'Slider Image']);?></li> 
        <li class="item"><?= $this->Html->image('home-slider/slider2.jpg', ['alt' => 'Slider Image']);?></li> 
        <li class="item"><?= $this->Html->image('home-slider/slider3.jpg', ['alt' => 'Slider Image']);?></li> 
        <li class="item"><?= $this->Html->image('home-slider/slider4.jpg', ['alt' => 'Slider Image']);?></li> 
        <li class="item"><?= $this->Html->image('home-slider/slider5.jpg', ['alt' => 'Slider Image']);?></li> 
    </ul>
  </div>

<!-- Slider Start -->
<section id="main-slider" class="carousel">
  <div class="carousel slide">
    <div class="carousel-inner">
      <div class="item active" style="background-image: url(img/depan.jpg)">
        <div class="container text-center">
          <div class="row">
            <div class="col-sm-12 padding-bottom-74">
              <div class="home_1">
				<div class="header_title animation animated-item-4">
					<h1>Cara mudah mencari properti</h1>
					<h4>Lorem ipsum dolor sit amet <br>consectetur adipisicing elit</h4>
				</div>
					<form id="form-submit" class="form-submit padding-bottom-74 animation animated-item-1" action="property-details.html">
						<div class="search">
							<div class="selector col-md-3  col-sm-3">
								<select class="selection" id="rent-sale">
									<option>Kategori</option>
									<option>For sale</option>
								</select>
							</div>
							<div id="email-label" class="col-md-7 col-sm-7">
								<i class="fa fa-location-arrow"></i>
								<input type="text" id="search_field" class="form-control" placeholder="Cari rumah....">
							</div>
							<span class="ffs-bs col-md-2 col-sm-2"><button type="submit" class="btn btn-small btn-primary">Cari</button></span>
						</div>
					</form>
			</div>
            </div>
          </div>
        </div>
      </div>
      <!--/.item-->

      <div class="item" style="background-image:url(img/depan.jpg)">
        <div class="container text-center">
          <div class="row">
            <div class="col-sm-12 padding-bottom-74">
              <div class="home_1">
				<div class="header_title animation animated-item-4">
          <h1>Cara mudah mencari properti</h1>
					<h4>Lorem ipsum dolor sit amet <br>consectetur adipisicing elit</h4>
				</div>
					<form id="form-submit" class="form-submit padding-bottom-74 animation animated-item-1" action="property-details.html">
						<div class="search">
							<div class="selector col-md-3  col-sm-3">
								<select class="selection" id="rent-sale">
									<option>Kategori</option>
									<option>For sale</option>
								</select>
							</div>
							<div id="email-label" class="col-md-7 col-sm-7">
								<i class="fa fa-location-arrow"></i>
                <input type="text" id="search_field" class="form-control" placeholder="Cari rumah....">
							</div>
							<span class="ffs-bs col-md-2 col-sm-2"><button type="submit" class="btn btn-small btn-primary">Cari</button></span>
						</div>
					</form>
			</div>
            </div>
          </div>
        </div>
      </div>
      <!--/.item-->

      <div class="item" style="background-image:url(img/depan.jpg)">
        <div class="container text-center">
          <div class="row">
            <div class="col-sm-12 padding-bottom-74">
              <div class="home_1">
				<div class="header_title animation animated-item-4">
          <h1>Cara mudah mencari properti</h1>
					<h4>Lorem ipsum dolor sit amet <br>consectetur adipisicing elit</h4>
				</div>
					<form id="form-submit" class="form-submit padding-bottom-74 animation animated-item-1" action="property-details.html">
						<div class="search">
							<div class="selector col-md-3  col-sm-3">
								<select class="selection" id="rent-sale">
									<option>Kategori</option>
									<option>For sale</option>
								</select>
							</div>
							<div id="email-label" class="col-md-7 col-sm-7">
								<i class="fa fa-location-arrow"></i>
                <input type="text" id="search_field" class="form-control" placeholder="Cari rumah....">
							</div>
							<span class="ffs-bs col-md-2 col-sm-2"><button type="submit" class="btn btn-small btn-primary">Cari</button></span>
						</div>
					</form>
			</div>
            </div>
          </div>
        </div>
      </div>
      <!--/.item-->
    </div>
  </div>
</section>
<!--/.carousel-->

<?php $cell = $this->cell('Project');
echo $cell;
?>

<!-- our-services -->
    <section id="our-services" class="paddin-2">
        <div class="container">
        	<header class="section-title">
              <h2>Layanan Kami</h2>
            </header>
            <div class="row">
                <div class="col-sm-3 service_block">
                    <div class="row m0 inner">
                        <div class="row m0 block_title">Mudah digunakan dan transparan</div>
                        <div class="row m0 block_icon"><i class="fa fa-shopping-bag"></i></div>
                    </div>
                </div>
                <div class="col-sm-3 service_block">
                    <div class="row m0 inner">
                        <div class="row m0 block_title">Harga jujur <br/>dan lebih murah</div>
                        <div class="row m0 block_icon"><i class="fa fa-money"></i></div>
                    </div>
                </div>
                <div class="col-sm-3 service_block">
                    <div class="row m0 inner">
                        <div class="row m0 block_title">Jaminan pembelian online yang aman</div>
                        <div class="row m0 block_icon"><i class="fa fa-lock"></i></div>
                    </div>
                </div>
                <div class="col-sm-3 service_block">
                    <div class="row m0 inner">
                        <div class="row m0 block_title">Dapat dijual kembali melalui forum kami</div>
                        <div class="row m0 block_icon"><i class="fa fa-users"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- /#our-services -->

<?php echo $this->fetch('dashboard'); ?>

<section>
  <div class="container">
    <header class="section-title">
      <h2>Mitra kami</h2>
    </header>
    <div class="recommended_items"><!--recommended_items-->
      <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="item active">
            <div class="col-sm-4">
              <div class="product-image-wrapper">
                <div class="single-products">
                  <div class="productinfo text-center">
                    <img src="img/recommend1.jpg" alt="" style="height:60px"/>
                  </div>

                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="product-image-wrapper">
                <div class="single-products">
                  <div class="productinfo text-center">
                    <img src="img/recommend2.jpg" alt="" style="height:60px"/>
                  </div>

                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="product-image-wrapper">
                <div class="single-products">
                  <div class="productinfo text-center">
                    <img src="img/recommend3.jpg" alt="" style="height:60px"/>
                  </div>

                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="col-sm-4">
              <div class="product-image-wrapper">
                <div class="single-products">
                  <div class="productinfo text-center">
                    <img src="img/recommend1.jpg" alt="" style="height:60px"/>
                  </div>

                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="product-image-wrapper">
                <div class="single-products">
                  <div class="productinfo text-center">
                    <img src="img/recommend2.jpg" alt="" style="height:60px"/>
                  </div>

                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="product-image-wrapper">
                <div class="single-products">
                  <div class="productinfo text-center">
                    <img src="img/recommend3.jpg" alt="" style="height:60px"/>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
         <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
          <i class="fa fa-angle-left"></i>
          </a>
          <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
          <i class="fa fa-angle-right"></i>
          </a>
      </div>
    </div><!--/recommended_items-->
  </div>

</section>

</body>
</html>
