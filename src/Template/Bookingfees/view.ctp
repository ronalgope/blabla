<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Bookingfee'), ['action' => 'edit', $bookingfee->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Bookingfee'), ['action' => 'delete', $bookingfee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bookingfee->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Bookingfees'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bookingfee'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="bookingfees view large-9 medium-8 columns content">
    <h3><?= h($bookingfee->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Order') ?></th>
            <td><?= $bookingfee->has('order') ? $this->Html->link($bookingfee->order->id, ['controller' => 'Orders', 'action' => 'view', $bookingfee->order->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Statement') ?></th>
            <td><?= h($bookingfee->statement) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Project') ?></th>
            <td><?= h($bookingfee->project) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($bookingfee->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hp') ?></th>
            <td><?= h($bookingfee->hp) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Otherhp') ?></th>
            <td><?= h($bookingfee->otherhp) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($bookingfee->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($bookingfee->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->format($bookingfee->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dp') ?></th>
            <td><?= $this->Number->format($bookingfee->dp) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total') ?></th>
            <td><?= $this->Number->format($bookingfee->total) ?></td>
        </tr>
    </table>
</div>
