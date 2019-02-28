<ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?=SITE_PATH?>admin/users/welcome/">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Properties List</li>
          </ol>
<div class="container-fluid">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Property'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Projects List</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id</th>
					  <th>Builder Name</th>
                      <th>Property type</th>
                      <th>Location Name</th>
                      <th>Name</th>
                      <th>Action</th>
                      
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Id</th>
					  <th>Builder Name</th>
                      <th>Property type</th>
                      <th>Location Name</th>
                      <th>Name</th>
                      <th>Action</th>
                     
                    </tr>
                  </tfoot>
                  <tbody>
				  <?php foreach ($properties as $property): ?>
                    <tr>
                      <td><?= $this->Number->format($property->id) ?></td>
					  <td><?= $property->has('builder') ? $this->Html->link($property->builder->name, ['controller' => 'Builders', 'action' => 'view', $property->builder->id]) : '' ?></td>
                      <td> <?= $property->has('property_type') ? $this->Html->link($property->property_type->name, ['controller' => 'PropertyTypes', 'action' => 'view', $property->property_type->id]) : '' ?></td>
                      <td> <?= $property->has('location') ? $this->Html->link($property->location->name, ['controller' => 'Locations', 'action' => 'view', $property->location->id]) : '' ?></td>
                      <td><?= h($property->name) ?></td>
                      <td>
					  <?= $this->Html->link(__('View'), ['action' => 'view', $property->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $property->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $property->id], ['confirm' => __('Are you sure you want to delete # {0}?', $property->id)]) ?></td>
                     
                    </tr>
                     <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
   
          </div>