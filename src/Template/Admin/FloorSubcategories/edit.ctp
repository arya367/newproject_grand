<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $floorSubcategory->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $floorSubcategory->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Floor Subcategories'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Floor Categories'), ['controller' => 'FloorCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Floor Category'), ['controller' => 'FloorCategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Floor Plans'), ['controller' => 'FloorPlans', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Floor Plan'), ['controller' => 'FloorPlans', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="form-group container">
    <?= $this->Form->create($floorSubcategory); ?>
    <fieldset>
        <legend><?= __('Edit Floor Subcategory') ?></legend>
        <?php
		   echo  '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">';
            echo "<tr><td>Floor Category<td>".$this->Form->input('floor_category_id', ['options' => $floorCategories,'label'=>false])."</tr></td>";
            echo "<tr><td>Name<td>".$this->Form->input('name',array('label'=>false))."</tr></td>";
			echo '</table>';
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
