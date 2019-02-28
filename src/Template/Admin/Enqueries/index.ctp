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
            <li class="breadcrumb-item active">Enquery</li>
          </ol>
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Enquery'), ['action' => 'add']) ?></li>
    </ul>
<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Enquery List</div>
            <div class="card-body">
              <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Id</th>
            <th>Actions</th>
        </tr>
    </thead>
	<tfoot>
        <tr>
            <th>Id></th>
            <th>Actions</th>
        </tr>
    </tfoot>
    <tbody>
    <?php foreach ($enqueries as $enquery): ?>
        <tr>
            <td><span>ID : <?= $this->Number->format($enquery->id) ?></span>
			<span>NAME: <?= h($enquery->name) ?></span>,<span>EMAIL: <?= h($enquery->email) ?></span>,<span>PHONE: <?= h($enquery->phone) ?></span>,<span>PROJECT: <?= h($enquery->project) ?></span>,<span>POSTED ON: <?= h($enquery->posted_date) ?></span><BR/><span>MESSAGE: <?= h($enquery->comment) ?></span>
			</td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $enquery->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $enquery->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $enquery->id], ['confirm' => __('Are you sure you want to delete # {0}?', $enquery->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
   
</div>
</div></div></div>