<ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Floor Plan</li>
          </ol>
<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Floor Subcategory'), ['action' => 'edit', $floorSubcategory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Floor Subcategory'), ['action' => 'delete', $floorSubcategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $floorSubcategory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Floor Subcategories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Floor Subcategory'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Floor Categories'), ['controller' => 'FloorCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Floor Category'), ['controller' => 'FloorCategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Floor Plans'), ['controller' => 'FloorPlans', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Floor Plan'), ['controller' => 'FloorPlans', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="form-label-group form-group container">
    <h2><?= h($floorSubcategory->name) ?></h2>
   <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
           <tr><td> <h6 class="subheader"><?= __('Floor Category') ?></h6>
            <td><p><?= $floorSubcategory->has('floor_category') ? $this->Html->link($floorSubcategory->floor_category->name, ['controller' => 'FloorCategories', 'action' => 'view', $floorSubcategory->floor_category->id]) : '' ?></p>
           <tr><td> <h6 class="subheader"><?= __('Name') ?></h6>
          <td> <p><?= h($floorSubcategory->name) ?></p>
        
           <tr><td> <h6 class="subheader"><?= __('Id') ?></h6>
           <td> <p><?= $this->Number->format($floorSubcategory->id) ?></p>
     </table>
</div>
<div class="form-group container">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related FloorPlans') ?></h4>
    <?php if (!empty($floorSubcategory->floor_plans)): ?>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Property Id') ?></th>
            <th><?= __('Floor Category Id') ?></th>
            <th><?= __('Floor Subcategory Id') ?></th>
            <th><?= __('Name') ?></th>
            <th><?= __('Photo') ?></th>
            <th><?= __('Status') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($floorSubcategory->floor_plans as $floorPlans): ?>
        <tr>
            <td><?= h($floorPlans->id) ?></td>
            <td><?= h($floorPlans->property_id) ?></td>
            <td><?= h($floorPlans->floor_category_id) ?></td>
            <td><?= h($floorPlans->floor_subcategory_id) ?></td>
            <td><?= h($floorPlans->name) ?></td>
            <td><?= h($floorPlans->photo) ?></td>
            <td><?= h($floorPlans->status) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'FloorPlans', 'action' => 'view', $floorPlans->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'FloorPlans', 'action' => 'edit', $floorPlans->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'FloorPlans', 'action' => 'delete', $floorPlans->id], ['confirm' => __('Are you sure you want to delete # {0}?', $floorPlans->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
