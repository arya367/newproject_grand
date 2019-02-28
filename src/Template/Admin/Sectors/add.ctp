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
            <li class="breadcrumb-item active">Properties Sector Add</li>
          </ol>
<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Sectors'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="form-group container">
    <?= $this->Form->create($sector); ?>
    <fieldset>
        <legend><?= __('Add Sector') ?></legend>
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <?php
            echo "<tr><td>Name</td><td>".$this->Form->input('name',array('label'=>false,'class'=>'overview'));
            echo "<tr><td>Url</td><td>".$this->Form->input('url',array('label'=>false,'class'=>'overview'));
            echo "<tr><td>Priority</td><td>".$this->Form->input('priority',array('label'=>false,'class'=>'overview'));
			echo "<tr><td>Heading1</td><td>".$this->Form->input('heading1',array('label'=>false,'class'=>'overview'));
            echo "<tr><td>Heading2</td><td>".$this->Form->input('heading2',array('label'=>false,'class'=>'overview'));
            echo "<tr><td>Seo Title</td><td>".$this->Form->input('seo_title',array('label'=>false,'class'=>'overview'));
            //echo $this->Form->input('seo_keyword');
            echo "<tr><td>Seo Description</td><td>".$this->Form->input('seo_description',array('label'=>false,'class'=>'overview'));
            echo "<tr><td>Description</td><td>".$this->Form->input('description',array('label'=>false,'class'=>'overview'));
            echo "<tr><td>Status</td><td>".$this->Form->input('status',["type"=>"radio",'options' => ['active'=>'active', 'deactive'=>'deactive'],'label'=>false]);
            echo "<tr><td>Location</td><td>".$this->Form->input('location_id', ['options' => $locations,'label'=>false]);
        ?>
		</table>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div></div></div></div>
