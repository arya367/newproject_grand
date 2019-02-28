<ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?=SITE_PATH?>admin/users/welcome/">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Properties Sector List</li>
          </ol>
<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Sector'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Projects Sector List</div>
            <div class="card-body">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Url</th>
            <th>Priority</th>
            <th>Location_id</th>
            <th>Actions</th>
        </tr>
    </thead>
	<tfoot>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Url</th>
            <th>Priority</th>
            <th>Location_id</th>
            <th>Actions</th>
        </tr>
    </tfoot>
    <tbody>
    <?php foreach ($sectors as $sector): ?>
        <tr>
            <td><?= $this->Number->format($sector->id) ?></td>
            <td><?= h($sector->name) ?></td>
            <td><?= h($sector->url) ?></td>
            <td><?= $this->Number->format($sector->priority) ?></td>
            <td>
                <?= $sector->has('location') ? $this->Html->link($sector->location->name, ['controller' => 'Locations', 'action' => 'view', $sector->location->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $sector->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sector->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sector->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sector->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
  </div>
  </div>  
</div>
