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
            <li class="breadcrumb-item active">Property Unit Location List</li>
          </ol>
<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Unitbylocation'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Units'), ['controller' => 'Units', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Units'), ['controller' => 'Units', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Unit By location List</div>
            <div class="card-body">
     <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Id</th>
            <th>Location</th>
            <th>Unit</th>
            <th>Url</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
    </thead>
	<tfoot>
        <tr>
            <th>Id</th>
            <th>Location</th>
            <th>Unit</th>
            <th>Url</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
    </tfoot>
    <tbody>
    <?php foreach ($unitbylocations as $unitbylocation): ?>
        <tr>
            <td><?= $this->Number->format($unitbylocation->id) ?></td>
            <td>
                <?= $unitbylocation->has('location') ? $this->Html->link($unitbylocation->location->name, ['controller' => 'Locations', 'action' => 'view', $unitbylocation->location->id]) : '' ?>
            </td>
            <td><?= $this->Number->format($unitbylocation->unit_id) ?></td>
            <td><?= h($unitbylocation->url) ?></td>
            <td><?= h($unitbylocation->name) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $unitbylocation->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $unitbylocation->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $unitbylocation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $unitbylocation->id)]) ?>
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
