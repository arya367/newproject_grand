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
            <li class="breadcrumb-item active">Property Subtype</li>
          </ol>

    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $propertySubtype->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $propertySubtype->id)]
            )
        ?></li>
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
        <legend><?= __('Edit Property Subtype') ?></legend>
		 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <?php
            echo "<tr><td>Property type</td><td>".$this->Form->input('property_type_id', ['options' => $propertyTypes,'label'=>false])."<tr></td>";
            echo "<tr><td>Name</td><td>".$this->Form->input('name',array('label'=>false))."<tr></td>";
            echo "<tr><td>Priority</td><td>".$this->Form->input('priority',array('label'=>false))."<tr></td>";
        ?>
		</table>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
