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
            <li class="breadcrumb-item active">User Edit</li>
          </ol>

    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
    </ul>
<div class="form-group container">
    <?= $this->Form->create($user); ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <?php
            echo "<tr><td>username<td>".$this->Form->input('username',array('label'=>false,'class'=>'overview'));
			echo "<tr><td>password_enc<td>".$this->Form->input('password_enc',['label'=>false]);
            if($_SESSION['ROLE']=='admin')  {  echo "<tr><td>Role<td>".$this->Form->input('role',['type'=>'radio','options' => ['admin'=>'Admin', 'regular'=>'Regular', 'seo'=>'Seo', 'resale'=>'Resale'],'label'=>false]);}
            echo "<tr><td>Name<td>".$this->Form->input('name',array('label'=>false,'class'=>'overview'));
			
        ?>
        </table>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
