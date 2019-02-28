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
            <li class="breadcrumb-item active">Blog View</li>
          </ol>
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Blog'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Authors'), ['controller' => 'Authors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Author'), ['controller' => 'Authors', 'action' => 'add']) ?> </li>
    </ul>

<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Blog List</div>
            <div class="card-body">
              <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Created</th>
            <th>Author_id</th>
            <th>Actions</th>
        </tr>
    </thead>
	<tfoot>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Created</th>
            <th>Author_id</th>
            <th>Actions</th>
        </tr>
    </tfoot>
    <tbody>
    <?php foreach ($blogs as $blog): ?>
        <tr>
            <td><?= $this->Number->format($blog->id) ?></td>
            <td><?= h($blog->name) ?></td>
            <td><?= h($blog->created) ?></td>
            <td>
                <?= $blog->has('author') ? $this->Html->link($blog->author->name, ['controller' => 'Authors', 'action' => 'view', $blog->author->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $blog->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $blog->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $blog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $blog->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    
    </div></div></div></div></div></div>
</div>
