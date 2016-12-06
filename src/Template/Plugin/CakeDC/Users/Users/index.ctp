<!-- Main bar -->
<div class="mainbar">

  <!-- Page heading -->
  <div class="page-head">
    <h2 class="pull-left"><i class="fa fa-home"></i> List Users</h2>

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
          <h3><?= __('Users') ?></h3>
          <table class="table well table-striped">
          <thead>
              <tr>
                  <th><?= $this->Paginator->sort('username') ?></th>
                  <th><?= $this->Paginator->sort('email') ?></th>
                  <th><?= $this->Paginator->sort('first_name') ?></th>
                  <th><?= $this->Paginator->sort('last_name') ?></th>
                  <th class="actions"><?= __d('CakeDC/Users', 'Actions') ?></th>
              </tr>
          </thead>
          <tbody>
          <?php foreach (${$tableAlias} as $user) : ?>
              <tr>
                  <td><?= h($user->username) ?></td>
                  <td><?= h($user->email) ?></td>
                  <td><?= h($user->first_name) ?></td>
                  <td><?= h($user->last_name) ?></td>
                  <td class="actions">
                      <?= $this->Html->link(__d('CakeDC/Users', 'View'), ['action' => 'view', $user->id]) ?>
                      <?= $this->Html->link(__d('CakeDC/Users', 'Change password'), ['action' => 'changePassword', $user->id]) ?>
                      <?= $this->Html->link(__d('CakeDC/Users', 'Edit'), ['action' => 'edit', $user->id]) ?>
                      <?= $this->Form->postLink(__d('CakeDC/Users', 'Delete'), ['action' => 'delete', $user->id], ['confirm' => __d('CakeDC/Users', 'Are you sure you want to delete # {0}?', $user->id)]) ?>
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
