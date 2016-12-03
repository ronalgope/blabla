<div class="users-changepass form row">
    <div class="usesr-changepass-wrapper col-sm-8">
        <?= $this->Flash->render('auth') ?>
        <?= $this->Form->create($user) ?>
        <div class="block-header"><hr><h1><?= __d('CakeDC/Users', 'Please enter the new password') ?></h1></div>
        <fieldset>
            <?php if ($validatePassword) : ?>
                <?= $this->Form->input('current_password', [
                        'type' => 'password',
                        'required' => true,
                        'label' => __d('CakeDC/Users', 'Current password')]);
                ?>
            <?php endif; ?>
            <?= $this->Form->input('password'); ?>
            <?= $this->Form->input('password_confirm', ['type' => 'password', 'required' => true]); ?>

        </fieldset>
        <?= $this->Form->button(__d('CakeDC/Users', 'Submit')); ?>
        <?= $this->Form->end() ?>
    </div>
</div>