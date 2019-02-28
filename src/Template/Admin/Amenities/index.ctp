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
            <li class="breadcrumb-item active">Amenity</li>
          </ol>

    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Amenity'), ['action' => 'add']) ?></li>
    </ul>

<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Amenities List</div>
            <div class="card-body">
              <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Class</th>
			<th>Type</th>
            <th>Priority</th>
            <th>Actions</th>
        </tr>
    </thead>
	<tfoot>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Class</th>
			<th>Type</th>
            <th>Priority</th>
            <th>Actions</th>
        </tr>
    </tfoot>
    <tbody>
    <?php foreach ($amenities as $amenity): ?>
        <tr>
            <td><?= $this->Number->format($amenity->id) ?></td>
            <td><?= h($amenity->name) ?></td>
            <td><?= h($amenity->class) ?></td>
			<td><?= h($amenity->type) ?></td>
            <td><?= $this->Number->format($amenity->priority) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $amenity->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $amenity->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $amenity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $amenity->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    
    </div> </div> </div>
</div>
