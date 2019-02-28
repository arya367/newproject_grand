<ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?=SITE_PATH?>admin/users/welcome/">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Properties Type Location</li>
          </ol>
<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Propertype Location'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Projects Type Location List</div>
            <div class="card-body">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Id</th>
            <th>Property Type</th>
            <th>Location</th>
            <th>Url</th>
            <th>Created</th>
            <th>Actions</th>
        </tr>
    </thead>
	<tfoot>
        <tr>
            <th>Id</th>
            <th>Property Type</th>
            <th>Location</th>
            <th>Url</th>
            <th>Created</th>
            <th>Actions</th>
        </tr>
    </tfoot>
    <tbody>
    <?php foreach ($propertypeLocations as $propertypeLocation): ?>
        <tr>
            <td><?= $this->Number->format($propertypeLocation->id) ?></td>
            <td>
                <?= $propertypeLocation->has('property_type') ? $this->Html->link($propertypeLocation->property_type->name, ['controller' => 'PropertyTypes', 'action' => 'view', $propertypeLocation->property_type->id]) : '' ?>
            </td>
            <? /* ?><td>
                <?= $propertypeLocation->has('property_subtype') ? $this->Html->link($propertypeLocation->property_subtype->name, ['controller' => 'PropertySubtypes', 'action' => 'view', $propertypeLocation->property_subtype->id]) : '' ?>
            </td> <? */ ?>
            <td>
                <?= $propertypeLocation->has('location') ? $this->Html->link($propertypeLocation->location->name, ['controller' => 'Locations', 'action' => 'view', $propertypeLocation->location->id]) : '' ?>
            </td>
            <td><?= h($propertypeLocation->url) ?></td>
            <td><?= h($propertypeLocation->created) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $propertypeLocation->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $propertypeLocation->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $propertypeLocation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $propertypeLocation->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
   </div>
   </div>
</div>
