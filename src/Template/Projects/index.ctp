<!-- Main bar -->
<div class="mainbar">

  <!-- Page heading -->
  <div class="page-head">
    <h2 class="pull-left"><i class="fa fa-home"></i> List Project</h2>

    <!-- Breadcrumb -->
    <div class="bread-crumb pull-right">
      <a href="index.html"><i class="fa fa-home"></i> Home</a>
      <!-- Divider -->
      <span class="divider">/</span>
      <a href="#" class="bread-current">Project</a>
    </div>

    <div class="clearfix"></div>

  </div>
  <!-- Page heading ends -->


  <!-- Matter -->

  <section class="matter">
    <div class="container">
      <div class="row">
        <div class="col-md-12 registration-detail " >
          <h3><?= __('Projects') ?></h3>
          <table class="table well table-striped">
              <thead>
                  <tr>
                      <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                      <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                      <th scope="col" style="width:50%"><?= $this->Paginator->sort('body','Deskripsi') ?></th>
                      <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                      <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                      <th scope="col"><?= $this->Paginator->sort('latitude','Latitude Longitude') ?></th>
                      <th scope="col" class="actions"><?= __('Actions') ?></th>
                  </tr>
              </thead>
              <tbody>
                  <?php foreach ($projects as $project): ?>
                  <tr>
                      <td><?= $this->Number->format($project->id) ?></td>
                      <td><?= h($project->name) ?></td>
                      <td style="width:50%"><?= h($project->body) ?></td>
                      <td><?= h($project->created) ?></td>
                      <td><?= h($project->modified) ?></td>
                      <td><?= h($project->latitude. ' , '.$project->longitude) ?></td>
                      <td class="actions">
                           <?php //$this->Html->link(__('View'), ['action' => 'adminview', $project->id]) ?>
                          <?php //$this->Html->link(__('Edit'), ['action' => 'edit', $project->id]) ?>
                          <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $project->id], ['confirm' => __('Are you sure you want to delete # {0}?', $project->id)]) ?>
                      </td>
                  </tr>
                  <?php endforeach; ?>
              </tbody>
          </table>
          <div class="paginator">
              <ul class="pagination">
                  <?= $this->Paginator->prev('< ' . __('previous')) ?>
                  <?= $this->Paginator->numbers() ?>
                  <?= $this->Paginator->next(__('next') . ' >') ?>
              </ul>
              <p><?= $this->Paginator->counter() ?></p>
          </div>
        </div>
      </div>
    </div>
  </section>

<!-- Matter ends -->
</div>
