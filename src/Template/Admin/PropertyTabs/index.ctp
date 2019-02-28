<style>
.overview{width:100%}
</style>
<div id="wrapper">

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
             <a href="<?=SITE_PATH?>admin/users/welcome/">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Properties Tabs</li>
          </ol>

    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Property Tab'), ['action' => 'add']) ?></li>
    </ul>
<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
             Properties Tabs List</div>
            <div class="card-body">
              <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Url</th>
			<th>Status/th>
            <th>Priority</th>
            <th>Actions</th>
        </tr>
    </thead>
	<tfoot>
        <tr>
		    <th>Id</th>
            <th>Name</th>
            <th>Url</th>
			<th>Status/th>
            <th>Priority</th>
            <th>Actions</th>
        </tr>
    </tfoot>
    <tbody>
    <?php foreach ($propertyTabs as $propertyTab): ?>
        <tr>
            <td><?= $this->Number->format($propertyTab->id) ?></td>
            <td><?= h($propertyTab->name) ?></td>
            <td><?= h($propertyTab->url) ?></td>
			<td><?= h($propertyTab->status) ?></td>
            <td><?= $this->Number->format($propertyTab->priority) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $propertyTab->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $propertyTab->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $propertyTab->id], ['confirm' => __('Are you sure you want to delete # {0}?', $propertyTab->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
	</div>
	</div>
	</div>

