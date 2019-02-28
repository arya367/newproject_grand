<ol class="breadcrumb">
            <li class="breadcrumb-item">
             <a href="<?=SITE_PATH?>admin/users/welcome/">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Floor Category Edit</li>
          </ol>
<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $floorCategory->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $floorCategory->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Floor Categories'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Floor Plan'), ['controller' => 'FloorPlans', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Floor Plan'), ['controller' => 'FloorPlans', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Floor Subcategory'), ['controller' => 'floorSubcategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Floor Subcategory'), ['controller' => 'floorSubcategories', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="form-group container">
    <?= $this->Form->create($floorCategory); ?>
    <fieldset>
        <legend><?= __('Edit Floor Category') ?></legend>
        <?php
		    echo '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">';
            echo "<tr><td>Name</td><td>".$this->Form->input('name',array('label'=>false))."</td></tr>";
			echo '</table>';
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
