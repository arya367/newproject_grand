<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Floor Plan'), ['action' => 'edit', $floorPlan->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Floor Plan'), ['action' => 'delete', $floorPlan->id], ['confirm' => __('Are you sure you want to delete # {0}?', $floorPlan->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Floor Plans'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Floor Plan'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Floor Categories'), ['controller' => 'FloorCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Floor Subcategories'), ['controller' => 'FloorSubcategories', 'action' => 'index']) ?> </li>
    </ul>
</div>
<div class="form-group container">

    <h2><?= h($floorPlan->name) ?></h2>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr><td><h6 class="subheader"><?= __('Property') ?></h6>
			
            <td><p><?= $floorPlan->has('property') ? $this->Html->link($floorPlan->property->name, ['controller' => 'Properties', 'action' => 'view', $floorPlan->property->id]) : '' ?></p>
            <tr><td><h6 class="subheader"><?= __('Floor Category') ?></h6>
            <td><p><?= $floorPlan->has('floor_category') ? $this->Html->link($floorPlan->floor_category->name, ['controller' => 'FloorCategories', 'action' => 'view', $floorPlan->floor_category->id]) : '' ?></p>
            <tr><td><h6 class="subheader"><?= __('Floor Subcategory') ?></h6>
            <td><p><?= $floorPlan->has('floor_subcategory') ? $this->Html->link($floorPlan->floor_subcategory->name, ['controller' => 'FloorSubcategories', 'action' => 'view', $floorPlan->floor_subcategory->id]) : '' ?></p>
            <tr><td><h6 class="subheader"><?= __('Name') ?></h6>
            <td><p><?= h($floorPlan->name) ?></p>
			<tr><td><h6 class="subheader"><?= __('Carpet Area') ?></h6>
            <td><p><?= h($floorPlan->carpet_area) ?></p>
            <tr><td><h6 class="subheader"><?= __('Photo') ?></h6>
            <td><p><?= $this->Html->image(IMG_PATH.'property/floor/thumb/'.$floorPlan->photo, ['alt' => $floorPlan->name,'width' => '150','height' => '150']); ?></p>
        
          <!--  <tr><td><h6 class="subheader"><?= __('Id') ?></h6>-->
      
            <tr><td><h6 class="subheader"><?= __('Status') ?></h6>
            <td><?= $this->Text->autoParagraph(h($floorPlan->status)); ?>
			</table>
</div>
