<div id="wrapper">

      <div id="content-wrapper">

        <div class="container-fluid">
<ol class="breadcrumb">
            <li class="breadcrumb-item">
            <a href="<?=SITE_PATH?>admin/users/welcome/">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Unit List</li>
          </ol>
<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Unit'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Unit List</div>
            <div class="card-body">
              <div class="table-responsive">
   <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Url</th>
            <th>Priority</th>
            <th>Actions</th>
        </tr>
    </thead>
	<tfoot>
        <tr>
           <th>Id</th>
            <th>Name</th>
            <th>Url</th>
            <th>Priority</th>
            <th>Actions</th>
        </tr>
    </tfoot>
    <tbody>
    <?php foreach ($units as $unit): ?>
        <tr>
            <td><?= $this->Number->format($unit->id) ?></td>
            <td><?= h($unit->name) ?></td>
            <td><?= h($unit->url) ?></td>
            <td><?= $this->Number->format($unit->priority) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $unit->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $unit->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $unit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $unit->id)]) ?>
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



