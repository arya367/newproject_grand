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
            <li class="breadcrumb-item active">Menu</li>
          </ol>

    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Menu'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Menuheaders'), ['controller' => 'Menuheaders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Menuheader'), ['controller' => 'Menuheaders', 'action' => 'add']) ?> </li>
    </ul>
<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
            Menu List</div>
            <div class="card-body">
              <div class="table-responsive">
			    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('menuheader_id') ?></th>
            <th><?= $this->Paginator->sort('name') ?></th>
            <th><?= $this->Paginator->sort('controller') ?></th>
            <th><?= $this->Paginator->sort('action') ?></th>
            <th><?= $this->Paginator->sort('navid') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($menus as $menu): ?>
        <tr>
            <td><?= $this->Number->format($menu->id) ?></td>
            <td>
                <?= $menu->has('menuheader') ? $this->Html->link($menu->menuheader->name, ['controller' => 'Menuheaders', 'action' => 'view', $menu->menuheader->id]) : '' ?>
            </td>
            <td><?= h($menu->name) ?></td>
            <td><?= h($menu->controller) ?></td>
            <td><?= h($menu->action) ?></td>
            <td><?= $this->Number->format($menu->navid) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $menu->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $menu->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $menu->id], ['confirm' => __('Are you sure you want to delete # {0}?', $menu->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    
    </div>  </div>  </div>
</div>
