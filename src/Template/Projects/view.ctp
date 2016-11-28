
<!-- BG-Banner Start -->
<div id="bg-banner" style="padding-top:40px">
      <div class="col-md-12 text-center">
        <div class="banner-heading"> <?= $this->Html->image('Projects/image/'.$project->logo,array("style"=>"height:100%"),['fullBase' => true]) ?>
        </div>
        <h2><?= h($project->name) ?></h2>
      </div>
</div>
<!-- BG-Banner End -->

<!-- Property video -->

<section class="property-detail">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <div class="banner-heading">
          <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="width:50%;display: block;margin-left: auto;margin-right: auto">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <?php
      $i = 0;
      foreach($project->images as $image): ?>
      <?php if($i == 0 ) : ?>
    <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i?>" class="active"></li>
  <?php else : ?>
    <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i?>" ></li>
    <?php
    endif;
      $i++;
    endforeach;
    ?>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <?php
      $i = 0;
      foreach($project->images as $image): ?>
      <?php if($i == 0 ) : ?>
    <div class="item active">
      <?= $this->Html->image('Images/image/'.$image->image) ?>
      <div class="carousel-caption">
        ...
      </div>
    </div>
    <?php else : ?>
      <div class="item">
        <?= $this->Html->image('Images/image/'.$image->image) ?>
        <div class="carousel-caption">
          ...
        </div>
      </div>
    <?php
    endif;
      $i++;
    endforeach;
    ?>
    ...
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
        </div>
      </div>
    </div>
  </div>
  <div class="container well" style="margin-top:50px">
    <div class="row">
      <div class="col-lg-8 col-md-8 property-detail-inner">
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <blockquote>
              <p>
            <?= $this->Text->autoParagraph(h($project->body)); ?>
              </p>
            </blockquote>
          </div>
        </div>
      </div>
    </div>
</div>
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <div class="banner-heading"> <?= $this->Html->image('Projects/filename/'.$project->filename,array("style"=>"width:50%;display: block;margin-left: auto;margin-right: auto","class"=>"img-responsive")) ?>
          </div>
        </div>
      </div>
    </div>
    <div class="container " style="margin-top:50px;margin-bottom:50px">
      <div class="row">
        <div class="col-lg-12 col-md-12 property-detail-inner">
          <div class="row">
            <div class="col-lg-12 col-md-12" style="width:50%;display: block;margin-left: auto;margin-right: auto">
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
              <script src="https://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>
              <?php

              $options = [
                  'zoom' => 2,
                  'location' => ['lat' => $project->latitude, 'lng' => $project->longitude],
                  'apiKey' => 'AIzaSyAfZ02cacrFKjBqUS0lnUSeywf1-B4_iL4',
                  'geolocate' => true,
                  'div' => ['id' => 'someothers']
                  //'map' => ['navOptions' => ['style' => 'SMALL'], 'typeOptions' => ['style' => 'HORIZONTAL_BAR', 'pos' => 'RIGHT_CENTER']]
              ];
              $map = $this->GoogleMap->map($options);

              // You can echo it now anywhere, it does not matter if you add markers afterwards


              // Let's add some markers
              //$this->GoogleMap->addMarker(['lat' => 48.69847, 'lng' => 10.9514, 'title' => 'Marker', 'content' => 'Some Html-<b>Content</b>', 'icon' => $this->GoogleMap->iconSet('green', 'E')]);

              //$this->GoogleMap->addMarker(['lat' => 47.69847, 'lng' => 11.9514, 'title' => 'Marker2', 'content' => 'Some more Html-<b>Content</b>']);

              $this->GoogleMap->addMarker(['lat' => $project->latitude, 'lng' => $project->longitude, 'title' => $project->name]);

              // Store the final JS in a HtmlHelper script block
              $this->GoogleMap->finalize();

              echo $this->fetch('script');
              echo $map;
              ?>

            </div>
          </div>
        </div>
      </div>
  </div>
  <?php  ?>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
            <ul class="nav nav-tabs" id="lb-tabs">
            <?php
                $current_tab = '';
            ?>
            <?php
            $i = 0;
              foreach($project->units as $unit):
                if($i==0){
                  $tab_class = 'active';
                  $current_tab = $unit->id;
                }else{
                  $tab_class = '';
                }
                echo '<li class="'.$tab_class.'" style="width:20%"><a href="#' . urlencode($unit->id) .  '" data-toggle="tab"><h5>' .
                $unit->name .  '</h5> </a></li>';
                $i++;
              endforeach;
            ?>
            </ul>
            <div class="tab-content">
                <?php foreach($project->units as $unit2):
                $tab = $unit2->id;
                $content_class = ($tab==$current_tab) ? 'active' : '' ;
                ?>
                <div class="tab-pane <?php echo $content_class;?>" id="<?php echo $tab; ?>">
                    <div class="links">
                        <ul class="col">
                          <li>
                              <div class="container" style="padding-top:20px">
                                <div class="row">
                                  <div class="col-lg-10 col-md-10 property-detail-inner well">
                                    <div class="row">
                                      <div class="col-lg-12 col-md-12">
                                        <h4>Spesifikasi</h4>
                                        <?= $this->Text->autoParagraph(h($unit2->spec)); ?>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </li>
                            <li>
                                <div class="container">
                                  <div class="row">
                                    <div class="col-lg-10 col-md-10 property-detail-inner well">
                                      <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                          <h4>Fasilitas</h4>
                                          <?= $this->Text->autoParagraph(h($unit2->facility)); ?>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </li>
                              <li>
                                  <div class="container">
                                    <div class="row">
                                      <div class="col-lg-10 col-md-10 property-detail-inner well">
                                        <div class="row">
                                          <div class="col-lg-12 col-md-12">
                                            <h4>Harga</h4>
                                            <?= h($this->Number->currency($unit2->price, 'IDR')); ?>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </li>
                                <li>
                                  <section class="container">
                                    <div class="row">
                                      <div class="col-lg-10 col-md-10 property-detail-inner ">
                                        <div class="row">
                                          <div class="col-lg-9 col-md-9 ">
                                          </div>
                                          <div class="col-lg-3 col-md-3 ">
                                            <button style="height:70px;width:250px;">
                                              <?= $this->Html->link(
                                                  'LANJUTKAN MEMBELI '.strtoupper($unit2->name),
                                                  '/orders/cart/'.$unit2->id,
                                                  ['class' => 'button', 'target' => '_blank']
                                              ); ?>
                                            </button>

                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </section>
                                </li>
                          </ul>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
      </div>
    </div>


  </section>
