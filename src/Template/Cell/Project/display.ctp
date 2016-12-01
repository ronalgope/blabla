<h1>Project Terbaru</h1>
<ul class="newest-list row">

<?php foreach ($projects as $project): ?>
    <li class="col-xs-6 col-md-4">
        <a href="/projects/view/<?php echo $project->id?>" class="wrapper-image">
            <?= $this->Html->image('house-1.jpg', ['alt' => 'layout-1', 'class' => 'layout-1']);?>
            <?= $this->Html->image('house-9.jpg', ['alt' => 'layout-2', 'class' => 'layout-2']);?>
        </a>
        <div class="wrapper-content">
            <div class="about-house"><?= $this->Html->link(h($project->name),array('controller'=>'projects','action'=>'view',$project->id),array('class'=>'title'))?>

                <p class="text"><?= h($project->body) ?></p></div>
            <div class="more-info-house">
                <div class="place-house"><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i> Sekupang Batam</a></div>
            </div>
        </div>
    </li>
  <?php endforeach; ?>
</ul>
