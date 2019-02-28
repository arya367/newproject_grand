<div id="wrapper">

      <div id="content-wrapper">

        <div class="container-fluid">

<ol class="breadcrumb">
            <li class="breadcrumb-item">
             <a href="<?=SITE_PATH?>admin/users/welcome/">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">FloorPlan Subcategory</li>
          </ol>
<div class="container-fluid">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
       <li><?= $this->Html->link(__('New Floor Subcategory'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Floor Categories'), ['controller' => 'FloorCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Floor Category'), ['controller' => 'FloorCategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Floor Plans'), ['controller' => 'FloorPlans', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Floor Plan'), ['controller' => 'FloorPlans', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              FloorPlan Subcategory List</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id</th>
					  <th>Floor Categiry Name</th>
                      <th> Name</th>
                      <th>Action</th>
                      
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Id</th>
					  <th>Floor Categiry Name</th>
                      <th> Name</th>
                      <th>Action</th>
                     
                    </tr>
                  </tfoot>
                  <tbody>
				  <?php foreach ($floorSubcategories as $floorSubcategory): ?>
        <tr>
            <td><?= $this->Number->format($floorSubcategory->id) ?></td>
            <td>
                <?= $floorSubcategory->has('floor_category') ? $this->Html->link($floorSubcategory->floor_category->name, ['controller' => 'FloorCategories', 'action' => 'view', $floorSubcategory->floor_category->id]) : '' ?>
            </td>
            <td><?= h($floorSubcategory->name) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $floorSubcategory->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $floorSubcategory->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $floorSubcategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $floorSubcategory->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
           
          </div>
		    </div>
            </div>
           
          </div>