<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Bookingfees'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="bookingfees form large-9 medium-8 columns content">
    <?= $this->Form->create($bookingfee) ?>
    <fieldset>
        <legend><?= __('Add Bookingfee') ?></legend>
        <?php
            echo $this->Form->input('orders_id', ['options' => $orders]);
            echo $this->Form->input('statement');
            echo $this->Form->input('project');
            echo $this->Form->input('type');
            echo $this->Form->input('price');
            echo $this->Form->input('dp');
            echo $this->Form->input('hp');
            echo $this->Form->input('otherhp');
            echo $this->Form->input('total');
            echo $this->Form->input('date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
