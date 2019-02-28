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
            <li class="breadcrumb-item active">Page</li>
          </ol>

    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Page'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?> </li>
    </ul>

<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Page List</div>
            <div class="card-body">
              <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Id</th>
            <th>Menu Heading</th>
            <th>Url</th>
            <th>Title</th>
            <th>Actions</th>
        </tr>
    </thead>
	<tfoot>
        <tr>
           <th>Id</th>
            <th>Menu Heading</th>
            <th>Url</th>
            <th>Title</th>
            <th>Actions</th>
        </tr>
    </tfoot>
    <tbody>
    <?php foreach ($pages as $page): ?>
        <tr>
            <td><?= $this->Number->format($page->id) ?></td>
            <td><?= h($page->menu_heading) ?></td>
            <td><?= h($page->url_display) ?></td>
            <td><?= h($page->title) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $page->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $page->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $page->id], ['confirm' => __('Are you sure you want to delete # {0}?', $page->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    
    </div> </div> </div>
</div>
