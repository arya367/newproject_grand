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
            <li class="breadcrumb-item active">Properties Subtypes Add</li>
          </ol

    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Property Subtypes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Property Types'), ['controller' => 'PropertyTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Property Type'), ['controller' => 'PropertyTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Properties'), ['controller' => 'Properties', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Property'), ['controller' => 'Properties', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Propertype Locations'), ['controller' => 'PropertypeLocations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Propertype Location'), ['controller' => 'PropertypeLocations', 'action' => 'add']) ?> </li>
    </ul>

<div class="form-group container">
    <?= $this->Form->create($propertySubtype); ?>
    <fieldset>
        <legend><?= __('Add Property Subtype') ?></legend>
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <?php
            echo "<tr><td>Property type</td><td>".$this->Form->input('property_type_id', ['options' => $propertyTypes,'label'=>false])."</td></tr>";
            echo "<tr><td>Name</td><td>".$this->Form->input('name',array('label'=>false,'class'=>'overview'))."</td></tr>";
            echo "<tr><td>Priority</td><td>".$this->Form->input('priority',array('label'=>false,'class'=>'overview'))."</td></tr>";
        ?>
		</table>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
