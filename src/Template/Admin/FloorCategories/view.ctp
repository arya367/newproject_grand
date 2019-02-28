<ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Floor Plan Category</li>
          </ol>
<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Floor Category'), ['action' => 'edit', $floorCategory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Floor Category'), ['action' => 'delete', $floorCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $floorCategory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Floor Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Floor Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Floor Plan'), ['controller' => 'FloorPlans', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Floor Plan'), ['controller' => 'FloorPlans', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Floor Subcategory'), ['controller' => 'floorSubcategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Floor Subcategory'), ['controller' => 'floorSubcategories', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="floorCategories view large-10 medium-9 columns form-group container">
    <h2><?= h($floorCategory->name) ?></h2>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr><td><h6 class="subheader"><?= __('Name') ?></h6>
            <td><p><?= h($floorCategory->name) ?></p>
       
           <tr><td> <h6 class="subheader"><?= __('Id') ?></h6>
            <td><p><?= $this->Number->format($floorCategory->id) ?></p>
			</table>
     
</div>
