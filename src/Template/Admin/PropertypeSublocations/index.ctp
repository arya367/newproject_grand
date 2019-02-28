<ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?=SITE_PATH?>admin/users/welcome/">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Propertype Sublocation</li>
          </ol>
<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Propertype Sublocation'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sectors'), ['controller' => 'Sectors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sector'), ['controller' => 'Sectors', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Projects Sublocation List</div>
            <div class="card-body">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Id</th>
            <th>Location</th>
            <th>Url</th>
            <th>Name</th>
            <th>Heading2</th>
            <th>Created</th>
            <th>Actions</th>
        </tr>
    </thead>
	<tfoot>
        <tr>
           <th>Id</th>
            <th>Location</th>
            <th>Url</th>
            <th>Name</th>
            <th>Heading2</th>
            <th>Created</th>
            <th>Actions</th>
        </tr>
    </tfoot>
    <tbody>
    <?php foreach ($propertypeSublocations as $propertypeSublocation): ?>
        <tr>
            <td><?= $this->Number->format($propertypeSublocation->id) ?></td>
            <td>
                <?= $propertypeSublocation->has('location') ? $this->Html->link($propertypeSublocation->location->name, ['controller' => 'Locations', 'action' => 'view', $propertypeSublocation->location->id]) : '' ?>
            </td> 
            <? /* ?><td>
                <?= $propertypeSublocation->has('sector') ? $this->Html->link($propertypeSublocation->sector->name, ['controller' => 'Sectors', 'action' => 'view', $propertypeSublocation->sector->id]) : '' ?>
            </td><? */ ?>
            <td><?= h($propertypeSublocation->url) ?></td>
            <td><?= h($propertypeSublocation->name) ?></td>
            <td><?= h($propertypeSublocation->heading2) ?></td>
            <td><?= h($propertypeSublocation->created) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $propertypeSublocation->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $propertypeSublocation->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $propertypeSublocation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $propertypeSublocation->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    </div>
	</div>
</div>
