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
            <li class="breadcrumb-item active">Price Management Add</li>
          </ol>

    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Price Management'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Properties'), ['controller' => 'Properties', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Property'), ['controller' => 'Properties', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Units'), ['controller' => 'Units', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Unit'), ['controller' => 'Units', 'action' => 'add']) ?> </li>
    </ul>

<div class="form-group container">
    <?= $this->Form->create($priceManagement); ?>
    <fieldset>
        <legend><?= __('Add Price Management') ?></legend>
		 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <?php
            echo "<tr><td>Property</td><td>".$this->Form->input('property_id', ['options' => $properties,'label'=>false])."</td></tr>";
            echo "<tr><td>Unit </td><td>".$this->Form->input('unit_id', ['options' => $units,'label'=>false])."</td></tr>";
            echo "<tr><td>Price</td><td>".$this->Form->input('price',array('label'=>false))."</td></tr>";
            echo "<tr><td>Size</td><td>".$this->Form->input('size',array('label'=>false))."</td></tr>";
        ?>
		</table>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
