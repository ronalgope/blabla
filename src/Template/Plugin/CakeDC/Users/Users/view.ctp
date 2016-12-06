<?php $Users = ${$tableAlias}; ?>
<!-- Main bar -->
<div class="mainbar">

  <!-- Page heading -->
  <div class="page-head">
    <h2 class="pull-left"><i class="fa fa-home"></i> Users</h2>

    <!-- Breadcrumb -->
    <div class="bread-crumb pull-right">
      <a href="index.html"><i class="fa fa-home"></i> Home</a>
      <!-- Divider -->
      <span class="divider">/</span>
      <a href="#" class="bread-current">Users</a>
    </div>

    <div class="clearfix"></div>

  </div>
  <!-- Page heading ends -->


  <!-- Matter -->

  <section class="matter">
    <div class="container">
      <div class="row">
        <div class="col-md-12" >
          <h3><?= h($Users->username) ?></h3>

<!--             <div class="actions columns large-2 medium-3">
                <h3><?= __d('CakeDC/Users', 'Actions') ?></h3>
                <ul class="side-nav">
                    <li><?= $this->Html->link(__d('CakeDC/Users', 'Edit User'), ['action' => 'edit', $Users->id]) ?> </li>
                    <li><?= $this->Form->postLink(__d('CakeDC/Users', 'Delete User'), ['action' => 'delete', $Users->id], ['confirm' => __d('CakeDC/Users', 'Are you sure you want to delete # {0}?', $Users->id)]) ?> </li>
                    <li><?= $this->Html->link(__d('CakeDC/Users', 'List Users'), ['action' => 'index']) ?> </li>
                    <li><?= $this->Html->link(__d('CakeDC/Users', 'New User'), ['action' => 'add']) ?> </li>
                    <li><?= $this->Html->link(__d('CakeDC/Users', 'List Accounts'), ['controller' => 'Accounts', 'action' => 'index']) ?> </li>
                </ul>
            </div> -->
            <dl class="dl-horizontal">
              <dt><?= __d('CakeDC/Users', 'Id') ?></dt><dd><?= h($Users->id) ?></dd>
              <dt><?= __d('CakeDC/Users', 'Usersname') ?></dt><dd><?= h($Users->username) ?></dd>
              <dt><?= __d('CakeDC/Users', 'Email') ?></dt><dd><?= h($Users->email) ?></dd>
              <dt><?= __d('CakeDC/Users', 'First Name') ?></dt><dd><?= h($Users->first_name) ?></dd>
              <dt><?= __d('CakeDC/Users', 'Last Name') ?></dt><dd><?= h($Users->last_name) ?></dd>
              <dt><?= __d('CakeDC/Users', 'Id') ?></dt><dd><?= h($Users->id) ?></dd>
            </dl>            

            <h4 class="subheader"><?= __d('CakeDC/Users', 'Related Accounts') ?></h4>
            <?php if (!empty($Users->social_accounts)) : ?>
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <th><?= __d('CakeDC/Users', 'Id') ?></th>
                        <th><?= __d('CakeDC/Users', 'User Id') ?></th>
                        <th><?= __d('CakeDC/Users', 'Provider') ?></th>
                        <th><?= __d('CakeDC/Users', 'Username') ?></th>
                        <th><?= __d('CakeDC/Users', 'Reference') ?></th>
                        <th><?= __d('CakeDC/Users', 'Avatar') ?></th>
                        <th><?= __d('CakeDC/Users', 'Token') ?></th>
                        <th><?= __d('CakeDC/Users', 'Token Expires') ?></th>
                        <th><?= __d('CakeDC/Users', 'Active') ?></th>
                        <th><?= __d('CakeDC/Users', 'Data') ?></th>
                        <th><?= __d('CakeDC/Users', 'Created') ?></th>
                        <th><?= __d('CakeDC/Users', 'Modified') ?></th>
                        <th class="actions"><?= __d('CakeDC/Users', 'Actions') ?></th>
                    </tr>
                    <?php foreach ($Users->social_accounts as $socialAccount) : ?>
                        <tr>
                            <td><?= h($socialAccount->id) ?></td>
                            <td><?= h($socialAccount->user_id) ?></td>
                            <td><?= h($socialAccount->provider) ?></td>
                            <td><?= h($socialAccount->username) ?></td>
                            <td><?= h($socialAccount->reference) ?></td>
                            <td><?= h($socialAccount->avatar) ?></td>
                            <td><?= h($socialAccount->token) ?></td>
                            <td><?= h($socialAccount->token_expires) ?></td>
                            <td><?= h($socialAccount->active) ?></td>
                            <td><?= h($socialAccount->data) ?></td>
                            <td><?= h($socialAccount->created) ?></td>
                            <td><?= h($socialAccount->modified) ?></td>

                            <td class="actions">
                                <?= $this->Html->link(__d('CakeDC/Users', 'View'), ['controller' => 'Accounts', 'action' => 'view', $socialAccount->id]) ?>

                                <?= $this->Html->link(__d('CakeDC/Users', 'Edit'), ['controller' => 'Accounts', 'action' => 'edit', $socialAccount->id]) ?>

                                <?= $this->Form->postLink(__d('CakeDC/Users', 'Delete'), ['controller' => 'Accounts', 'action' => 'delete', $socialAccount->id], ['confirm' => __d('CakeDC/Users', 'Are you sure you want to delete # {0}?', $accounts->id)]) ?>

                            </td>
                        </tr>

            <?php endforeach; ?>
                </table>
                <?php endif; ?>
        </div>
      </div>
    </div>
  </section>

<!-- Matter ends -->
</div>