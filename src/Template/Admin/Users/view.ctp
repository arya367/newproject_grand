<style>
.overview{width:100%}
</style>
<div id="wrapper">

      <div id="content-wrapper">

        <div class="container-fluid">
<ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?=SITE_PATH?>admin/users/welcome/">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Author View</li>
          </ol>

    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
    </ul>

<div class="form-group container">
    <h2><?= h($user->name) ?></h2>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr><td><h6 class="subheader"><?= __('Username') ?></h6>
             <td><p><?= h($user->username) ?></p>
             <tr><td><h6 class="subheader"><?= __('Password') ?></h6>
             <td><p><?= h($user->password) ?></p>
             <tr><td><h6 class="subheader"><?= __('Password Enc') ?></h6>
             <td><p><?= h($user->password_enc) ?></p>
            <tr><td> <h6 class="subheader"><?= __('Role') ?></h6>
            <td> <p><?= h($user->role) ?></p>
             <tr><td><h6 class="subheader"><?= __('Name') ?></h6>
            <td> <p><?= h($user->name) ?></p>
       
             <tr><td><h6 class="subheader"><?= __('Id') ?></h6>
             <td><p><?= $this->Number->format($user->id) ?></p>
        
             <tr><td><h6 class="subheader"><?= __('Created') ?></h6>
            <td> <p><?= h($user->created) ?></p>
            <tr><td> <h6 class="subheader"><?= __('Modified') ?></h6>
            <td> <p><?= h($user->modified) ?></p>
       
            <tr><td> <h6 class="subheader"><?= __('Menuheader') ?></h6>
            <td><?= $this->Text->autoParagraph(h($user->menuheader)); ?>

            <tr><td> <h6 class="subheader"><?= __('Menu') ?></h6>
            <td> <?= $this->Text->autoParagraph(h($user->menu)); ?>
			</table>

        </div>
    </div>
</div>
