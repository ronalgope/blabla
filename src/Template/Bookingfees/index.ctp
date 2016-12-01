<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Bookingfee'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="bookingfees index large-9 medium-8 columns content">
    <h3><?= __('Bookingfees') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('orders_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('statement') ?></th>
                <th scope="col"><?= $this->Paginator->sort('project') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dp') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hp') ?></th>
                <th scope="col"><?= $this->Paginator->sort('otherhp') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bookingfees as $bookingfee): ?>
            <tr>
                <td><?= $this->Number->format($bookingfee->id) ?></td>
                <td><?= $bookingfee->has('order') ? $this->Html->link($bookingfee->order->id, ['controller' => 'Orders', 'action' => 'view', $bookingfee->order->id]) : '' ?></td>
                <td><?= h($bookingfee->statement) ?></td>
                <td><?= h($bookingfee->project) ?></td>
                <td><?= h($bookingfee->type) ?></td>
                <td><?= $this->Number->format($bookingfee->price) ?></td>
                <td><?= $this->Number->format($bookingfee->dp) ?></td>
                <td><?= h($bookingfee->hp) ?></td>
                <td><?= h($bookingfee->otherhp) ?></td>
                <td><?= $this->Number->format($bookingfee->total) ?></td>
                <td><?= h($bookingfee->date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $bookingfee->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $bookingfee->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $bookingfee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bookingfee->id)]) ?>
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
