<?= $this->Flash->render() ?>
<?= $this->Form->create(null, ['url' => '/admin/']); ?>
<fieldset>
<legend><?= __('Login') ?></legend>
<?php

echo $this->Form->input('username',['required']);
echo $this->Form->input('password',['required']);
?>
</fieldset>
<?= $this->Form->button(__('confirm')) ?>
<?= $this->Form->end() ?>