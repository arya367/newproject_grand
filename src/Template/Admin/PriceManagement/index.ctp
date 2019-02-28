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
            <li class="breadcrumb-item active">Price Management</li>
          </ol>


    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Price Management'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Properties'), ['controller' => 'Properties', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Property'), ['controller' => 'Properties', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Units'), ['controller' => 'Units', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Unit'), ['controller' => 'Units', 'action' => 'add']) ?> </li>
    </ul>

<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
            Price Management List</div>
            <div class="card-body">
              <div class="table-responsive">
			    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('property_id') ?></th>
            <th><?= $this->Paginator->sort('unit_id') ?></th>
            <th><?= $this->Paginator->sort('price') ?></th>
            <th><?= $this->Paginator->sort('size') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($priceManagement as $priceManagement): ?>
        <tr>
            <td><?= $this->Number->format($priceManagement->id) ?></td>
            <td>
                <?= $priceManagement->has('property') ? $this->Html->link($priceManagement->property->name, ['controller' => 'Properties', 'action' => 'view', $priceManagement->property->id]) : '' ?>
            </td>
            <td>
                <?= $priceManagement->has('unit') ? $this->Html->link($priceManagement->unit->name, ['controller' => 'Units', 'action' => 'view', $priceManagement->unit->id]) : '' ?>
            </td>
            <td><?= $this->Number->format($priceManagement->price) ?></td>
            <td><?= h($priceManagement->size) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $priceManagement->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $priceManagement->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $priceManagement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $priceManagement->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
   
    </div> </div> </div>
</div>
