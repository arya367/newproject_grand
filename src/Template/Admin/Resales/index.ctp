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
            <li class="breadcrumb-item active">Resale</li>
          </ol>

    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Resale'), ['action' => 'add']) ?></li>
    </ul>

<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Resale List</div>
            <div class="card-body">
              <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('builder_id') ?></th>
            <th><?= $this->Paginator->sort('property_id') ?></th>
            <th><?= $this->Paginator->sort('bhk_type') ?></th>
            
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($resales as $resale): ?>
        <tr>
            <td><?= $this->Number->format($resale->id) ?></td>
            <td>
                <?= $resale->has('builder') ? $this->Html->link($resale->builder->name, ['controller' => 'Builders', 'action' => 'view', $resale->builder->id]) : '' ?>
            </td>
            <td>
                <?= $resale->has('property') ? $this->Html->link($resale->property->name, ['controller' => 'Properties', 'action' => 'view', $resale->property->id]) : '' ?>
            </td>
          
            <td><?= h($resale->bhk_type) ?></td>
           
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $resale->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $resale->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $resale->id], ['confirm' => __('Are you sure you want to delete # {0}?', $resale->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    
    </div></div></div>
</div>
