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
            <li class="breadcrumb-item active">Property Subtypes</li>
          </ol>
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Property Subtype'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Property Types'), ['controller' => 'PropertyTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Property Type'), ['controller' => 'PropertyTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Properties'), ['controller' => 'Properties', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Property'), ['controller' => 'Properties', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Propertype Locations'), ['controller' => 'PropertypeLocations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Propertype Location'), ['controller' => 'PropertypeLocations', 'action' => 'add']) ?> </li>
    </ul>

<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
            Property Subtypes List</div>
            <div class="card-body">
              <div class="table-responsive">
			    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('property_type_id') ?></th>
            <th><?= $this->Paginator->sort('name') ?></th>
            <th><?= $this->Paginator->sort('priority') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($propertySubtypes as $propertySubtype): ?>
        <tr>
            <td><?= $this->Number->format($propertySubtype->id) ?></td>
            <td>
                <?= $propertySubtype->has('property_type') ? $this->Html->link($propertySubtype->property_type->name, ['controller' => 'PropertyTypes', 'action' => 'view', $propertySubtype->property_type->id]) : '' ?>
            </td>
            <td><?= h($propertySubtype->name) ?></td>
            <td><?= $this->Number->format($propertySubtype->priority) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $propertySubtype->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $propertySubtype->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $propertySubtype->id], ['confirm' => __('Are you sure you want to delete # {0}?', $propertySubtype->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    
    </div></div></div></div>
</div>


