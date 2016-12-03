<div class="users form row">
    <?= $this->Flash->render('auth') ?>
    <?= $this->Form->create('User') ?>
    <div class="reset-pass-wrapper col-sm-6">
    	<h1 class="page-title col-sm-12"><?= __d('CakeDC/Users', 'Please enter your email to reset your password') ?></h1> 
    	<div class="col-sm-12">
    		<?= $this->Form->input('reference', ['required' => true, 'type' => 'email']) ?>
    	</div>

    	<div class="col-sm-12">
    		<?= $this->Form->button(__d('CakeDC/Users', 'Submit')); ?>
    	</div>
    </div>
    <?= $this->Form->end() ?>
</div>
