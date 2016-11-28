<h1>Project Terbaru</h1>
<ul class="newest-list">

<?php foreach ($projects as $project): ?>
    <li>
        <a href="projects/view/<?php echo $project->id?>" class="wrapper-image">
            <img src="img/house-1.jpg" alt="" class="layout-1"/>
            <img src="img/house-9.jpg" alt="" class="layout-2"/>
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
