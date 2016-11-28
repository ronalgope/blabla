<?php
/**
 * Copyright 2010 - 2015, Cake Development Corporation (http://cakedc.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2010 - 2015, Cake Development Corporation (http://cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$Users = ${$tableAlias};
?>
<div class="actions columns large-2 medium-3">
    <h3><?= __d('CakeDC/Users', 'Actions') ?></h3>
    <ul class="side-nav">
        <li>
            <?php
            echo $this->Form->postLink(
                __d('CakeDC/Users', 'Delete'),
                ['action' => 'delete', $Users->id],
                ['confirm' => __d('CakeDC/Users', 'Are you sure you want to delete # {0}?', $Users->id)]
            );
            ?>
        </li>
        <li><?= $this->Html->link(__d('CakeDC/Users', 'List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__d('CakeDC/Users', 'List Accounts'), ['controller' => 'Accounts', 'action' => 'index']) ?> </li>
    </ul>
</div>
<div class="users form large-10 medium-9 columns">
    <?= $this->Form->create($Users); ?>
    <fieldset>
        <legend><?= __d('CakeDC/Users', 'Edit User') ?></legend>
        <?php
            echo $this->Form->input('username');
            echo $this->Form->input('email');
            echo $this->Form->input('first_name');
            echo $this->Form->input('last_name');
            echo $this->Form->input('token');
            echo $this->Form->input('token_expires');
            echo $this->Form->input('api_token');
            echo $this->Form->input('activation_date');
            echo $this->Form->input('tos_date');
            echo $this->Form->input('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__d('CakeDC/Users', 'Submit')) ?>
    <?= $this->Form->end() ?>
</div>
