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
            <li class="breadcrumb-item active">Menu Add</li>
          </ol>

    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Menus'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Menuheaders'), ['controller' => 'Menuheaders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Menuheader'), ['controller' => 'Menuheaders', 'action' => 'add']) ?> </li>
    </ul>

<div class="form-group container">
    <?= $this->Form->create($menu); ?>
    <fieldset>
        <legend><?= __('Add Menu') ?></legend>
		 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <?php
            echo "<tr><td>menuheader<td>".$this->Form->input('menuheader_id', ['options' => $menuheaders,'label'=>false])."</td></tr>";
            echo "<tr><td>Name</td><td>".$this->Form->input('name',array('label'=>false));
            echo "<tr><td>Controller</td><td>".$this->Form->input('controller',array('label'=>false));
            echo "<tr><td>Action</td><td>".$this->Form->input('action',array('label'=>false));
            //echo $this->Form->input('navid');
            echo "<tr><td>Status</td><td>".$this->Form->input('status',['type'=>'radio','options'=>['active'=>'Active','deactive'=>'Deactive'],'label'=>false]);
        ?>
		</table>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
