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
      <div class="block-header"><hr><h1>Peta Lokasi</h1></div>
      <div id="map"></div>
      <script>
        function initMap() {
          var uluru = {lat: <?php echo $project->latitude?>, lng: <?php echo $project->longitude ?>};
          var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 13,
            center: uluru
          });
          var marker = new google.maps.Marker({
            position: uluru,
            map: map
          });
        }
      </script>
      <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAfZ02cacrFKjBqUS0lnUSeywf1-B4_iL4&callback=initMap">
      </script>
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
      <ul class="dena-info">
        <li>Keterangan: </li>
        <li class="tersedia-info"><div class="info-icon">&nbsp;</div> Tersedia</li>
        <li class="menunggu-info"><div class="info-icon">&nbsp;</div> Menunggu</li>
        <li class="terjual-info"><div class="info-icon">&nbsp;</div> Terjual</li>
      </ul>
    </div>

    <!-- Unit yang tersedia -->
    <div class="project-unit col-sm-6">
      <div class="block-header"><hr><h1>Unit Yang Tersedia</h1></div>
      <div class="all-unit row">
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
            $tersedia_class = 'tersedia';
            $menunggu_class = 'menunggu';
            $terjual_class = 'terjual';
            ?>
              <div class="tab-pane <?php echo $content_class;?> <?php echo $tersedia_class;?>" id="<?php echo $tab; ?>">
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
          $('path').removeClass('clicked');
          $(this).addClass('clicked');
          base.removeClass("active");
          if (tab_id == svg_id) {
            base.addClass('active');
          }
        });
      });

      /*ketersediaan location*/
      $(".tab-content-svg .tab-pane").each(function(){
        var base = $(this);
        var tab_id = base.attr('id');
        $('path').each(function(){
          var svg_id = $(this).attr('id');
          var svg_this = $(this);
          if (tab_id == svg_id) {
            if(base.hasClass('tersedia')){
              svg_this.addClass('tersedia');
            }else if(base.hasClass('menunggu')){
              svg_this.addClass('menunggu');
            }else if(base.hasClass('terjual')){
              svg_this.addClass('terjual');
            }
          }
        });
      });
    });
  </script>

  <script>
      // Don't use window.onLoad like this in production, because it can only listen to one function.
      window.onload = function() {
        var panZoom = window.panZoom = svgPanZoom('.dena-img svg', {
          zoomEnabled: true,
          controlIconsEnabled: true,
          fit: 1,
          center: 1
        });

        $(window).resize(function(){
          panZoom.resize();
          panZoom.fit();
          panZoom.center();
        })
      };
    </script>
