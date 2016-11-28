<?php
$this->extend('/Pages/home');

$this->assign('title', $post);

$this->start('dashboard');
?>
<!-- Property Start -->
<section class="section">
                    <div class="newest-properties padding-top padding-bottom">
                        <div class="container">
                        	<header class="section-title">
                              <h2>Project Terbaru</h2>
                            </header>
                            <div class="newest-properties-wrapper">
                                <div class="row">
                                    <div class="newest-properties-content">
                                      <?php foreach ($projects as $project): ?>
                                        <div class="col-md-4 col-xs-6">
                                            <div class="build-dreams-item"><a href="property-detail.html" class="wrapper-image"><img src="images/house-1.jpg" alt="" class="img-responsive layout-1"/><img src="images/house-9.jpg" alt="" class="img-responsive layout-2"/></a>

                                                <div class="note for-sale"><p class="text">for sale</p></div>
                                                <div class="wrapper-content">
                                                    <div class="about-house"><a href="search-properties.html" class="title"><?= h($project->name) ?></a>

                                                        <p class="text"><?= h($project->body) ?></p></div>
                                                    <div class="more-info-house">
                                                        <div class="place-house"><i class="fa fa-map-marker"></i><a href="#">Sekupang Batam</a></div>
                                                        <div class="price">Rp 260.000.000</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                      <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
<!-- Property End -->
