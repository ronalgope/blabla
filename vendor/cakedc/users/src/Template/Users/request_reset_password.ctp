<div class="users form row">
    <?= $this->Flash->render('auth') ?>
    <?= $this->Form->create('User') ?>
    <div class="reset-pass-wrapper col-sm-6">
    	<div class="block-header"><hr><h1><?= __d('CakeDC/Users', 'Please enter your email to reset your password') ?></h1></div>
    	<div class="col-sm-12">
    		<?= $this->Form->input('reference', ['required' => true]) ?>
    	</div>

    	<div class="col-sm-12">
    		<?= $this->Form->button(__d('CakeDC/Users', 'Submit')); ?>
    	</div>
    </div>
    <?= $this->Form->end() ?>
</div>
