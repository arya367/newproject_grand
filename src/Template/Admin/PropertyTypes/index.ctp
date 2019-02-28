<div id="wrapper">

      <div id="content-wrapper">

        <div class="container-fluid">
<ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?=SITE_PATH?>admin/users/welcome/">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Property Type</li>
          </ol>
<div class="acontainer-fluid">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Property Type'), ['action' => 'add']) ?></li>
        </ul>
</div>
<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Property Type</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id</th>
					  <th>Name</th>
                      <th>Url</th>
                      <th>priority</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Id</th>
					  <th>Name</th>
                      <th>Url</th>
                      <th>priority</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
				  <?php foreach ($propertyTypes as $propertyType): ?>
                    <tr>
                     <td><?= $this->Number->format($propertyType->id) ?></td>
            <td><?= h($propertyType->name) ?></td>
            <td><?= h($propertyType->url) ?></td>
            <td><?= $this->Number->format($propertyType->priority) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $propertyType->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $propertyType->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $propertyType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $propertyType->id)]) ?>
            </td>
                      
                    </tr>
					 <?php endforeach; ?>	
                   
                  </tbody>
                </table>
              </div>
            </div>
            
          </div>
