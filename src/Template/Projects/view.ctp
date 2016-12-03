<!DOCTYPE HTML>
<html>
<body class="view-project">

  <div class="row view-top">
    <!-- Heading view -->
    <div class="view-heading col-sm-12">
      <div class="view-logo"> <?= $this->Html->image('projects/images/'.$project->logo,array("style"=>"height:100%"),['fullBase' => true]) ?>
      </div>
      <h2><?= h($project->name) ?></h2>
      <h4><?= '"'.h($project->body).'"' ?></h4> 
    </div>
    <!-- View Slider -->
    <div class="view-slider col-sm-12 ">
      <ul class="view-slider-list owl-carousel" data-slider-id="1">
        <?php
          $i = 0;
          foreach($project->images as $image): ?>
            <li class="item">
              <?= $this->Html->image('projects/images_slider/'.$image->image) ?>
            </li>
          <?php $i++;
          endforeach;
        ?>
      </ul>
      <ul class="owl-thumbs" data-slider-id="1">
        <?php
          $i = 0;
          foreach($project->images as $image): ?>
            <li class="owl-thumb-item">
              <?= $this->Html->image('projects/images_slider/'.$image->image) ?>
            </li>
          <?php $i++;
          endforeach;
        ?>
      </ul>
    </div>

    <!--Peta Lokasi-->
    <div class="peta-lokasi col-sm-12">
      <h1>Peta Lokasi</h1>
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

          $this->GoogleMap->addMarker(['lat' => $project->latitude, 'lng' => $project->longitude, 'title' => $project->name]);

          // Store the final JS in a HtmlHelper script block
          $this->GoogleMap->finalize();

          echo $this->fetch('script');
          echo $map;
        ?>
    </div>
  </div>

  <div class="row row-eq-height dena-map">
    <!--Dena Project-->
    <div class="dena-project col-sm-6">
      <h1>
        <?= $this->Text->autoParagraph(h($project->body)); ?>
      </h1>
      <div class="dena-img">
        <?php // $this->Html->image('projects/filename/'.$project->filename,array("class"=>"img-dena")) ?>
        <?php echo file_get_contents('img/projects/filename/'.$project->filename); ?>
        
      </div>
    </div>

    <!-- Unit yang tersedia -->
    <div class="project-unit col-sm-6">
      <h1>Unit Yang Tersedia</h1>
      <div class="all-unit row">
        <div id="svg_id"></div>
        <!--<ul class="nav nav-tabs col-sm-12" id="lb-tabs">
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
              echo '<li class="'.$tab_class.'"><a href="#' . urlencode($unit->id) .  '" data-toggle="tab"><h2>' .
              $unit->name .  '</h2> </a></li>';
              $i++;
            endforeach;
          ?>
        </ul>-->
        <div class="tab-content-svg col-sm-12">
          <?php foreach($project->units as $unit2):
            $tab = $unit2->id;
            $content_class = ($tab==$current_tab) ? 'active' : '' ;
            ?>
              <div class="tab-pane <?php echo $content_class;?>" id="<?php echo $tab; ?>">
                <ul class="col">
                  <li>
                      <h4>Spesifikasi</h4>
                      <?= $this->Text->autoParagraph(h($unit2->spec)); ?>

                    </li>
                    <li>
                      <h4>Fasilitas</h4>
                                  <?= $this->Text->autoParagraph(h($unit2->facility)); ?>
                    </li>

                    <li>
                      <h4>Harga</h4>
                      <?= h($this->Number->currency($unit2->price, 'IDR')); ?>
                    </li>
                  </ul>
                  <button>
                    <?=
                    $this->Html->link($this->Html->tag('i',"",['class' => 'fa fa-shopping-cart'])."Lanjutkan Membeli"." ".$this->Html->tag('span', strtoupper($unit2->name)),'/orders/cart/'.$unit2->id,['class' => 'button', 'escape'=>false]);
                    ?>
                  </button>
                  </div>
                <?php endforeach; ?>
          </div>
      </div>
    </div>


  </div>

  </body>
  </html>

  <script type="text/javascript">
    $(document).ready(function () {
      $(".tab-content-svg .tab-pane").each(function(){
        var base = $(this);
        var tab_id = base.attr('id');
        $('path').click(function () {
          var svg_id = $(this).attr('id');
          base.removeClass("active");
          if (tab_id == svg_id) {
            base.addClass('active');
          }
        });
      });
        
    });
  </script>
