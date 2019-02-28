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
            <li class="breadcrumb-item active">Menu Header</li>
          </ol>

    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Menuheader'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Menus'), ['controller' => 'Menus', 'action' => 'index']) ?> </li>
    </ul>
<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Menu Header List</div>
            <div class="card-body">
              <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Controller</th>
            <th>Action</th>
            <th>Navid</th>
            <th>Actions</th>
        </tr>
    </thead>
	<tfoot>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Controller</th>
            <th>Action</th>
            <th>Navid</th>
            <th>Actions</th>
        </tr>
    </tfoot>
    <tbody>
    <?php foreach ($menuheaders as $menuheader): ?>
        <tr>
            <td><?= $this->Number->format($menuheader->id) ?></td>
            <td><?= h($menuheader->name) ?></td>
            <td><?= h($menuheader->controller) ?></td>
            <td><?= h($menuheader->action) ?></td>
            <td><?= $this->Number->format($menuheader->navid) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $menuheader->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $menuheader->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $menuheader->id], ['confirm' => __('Are you sure you want to delete # {0}?', $menuheader->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
</div></div></div></div>
