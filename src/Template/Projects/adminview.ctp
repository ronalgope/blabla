<!-- BG-Banner Start -->
<div id="bg-banner" style="padding-top:40px">
      <div class="col-md-12 text-center">
        <div class="banner-heading"> <?= $this->Html->image('Projects/image/'.$project->image,array("style"=>"height:100%"),['fullBase' => true]) ?>
        </div>
        <h2><?= h($project->name) ?></h2>
      </div>
</div>
<!-- BG-Banner End -->

<section class="property-detail">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-8 property-detail-inner">
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <h4>Description</h4>
              <?= $this->Text->autoParagraph(h($project->body)); ?>
            </div>
          </div>
        </div>
      </div>
  </div>
</section>
<!-- Property video -->

<div class="property-detail">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <div class="banner-heading"> <?= $this->Html->image('Projects/filename/'.$project->filename,array("style"=>"width:50%")) ?>
          </div>
          <h2><?= h($project->name) ?></h2>
        </div>
      </div>
    </div>
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

  </div>
