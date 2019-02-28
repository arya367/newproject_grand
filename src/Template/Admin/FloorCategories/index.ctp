<style>
.overview{width:100%}
</style>
<div id="wrapper">

      <div id="content-wrapper">

        <div class="container-fluid">
<ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Floor Plan Category</li>
          </ol>
<div class="container-fluid">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
         <li><?= $this->Html->link(__('New Floor Category'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Floor Plan'), ['controller' => 'FloorPlans', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Floor Plan'), ['controller' => 'FloorPlans', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Floor Subcategory'), ['controller' => 'floorSubcategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Floor Subcategory'), ['controller' => 'floorSubcategories', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
             Floor Plan Category List</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Action</th>
                      
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Id</th>
                      <th>Name</th>
                      <th>Action</th>
                     
                    </tr>
                  </tfoot>
                  <tbody>
				   <?php foreach ($floorCategories as $floorCategory): ?>
        <tr>
            <td><?= $this->Number->format($floorCategory->id) ?></td>
            <td><?= h($floorCategory->name) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $floorCategory->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $floorCategory->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $floorCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $floorCategory->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
           
          </div>