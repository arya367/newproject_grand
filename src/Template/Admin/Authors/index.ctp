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
            <li class="breadcrumb-item active">Author</li>
          </ol>
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Author'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Blogs'), ['controller' => 'Blogs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Blog'), ['controller' => 'Blogs', 'action' => 'add']) ?> </li>
    </ul>

<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Author List</div>
            <div class="card-body">
              <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('user_name') ?></th>
            <th><?= $this->Paginator->sort('password') ?></th>
            <th><?= $this->Paginator->sort('name') ?></th>
            <?php /*?><th><?= $this->Paginator->sort('email') ?></th><?php */?>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th><?= $this->Paginator->sort('modified') ?></th>
			<th><?= $this->Paginator->sort('photo') ?></th>
			
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($authors as $author): ?>
        <tr>
            <td><?= $this->Number->format($author->id) ?></td>
            <td><?= h($author->user_name) ?></td>
            <td><?= h($author->password) ?></td>
            <td><?= h($author->name) ?></td>
            <?php /*?><td><?= h($author->email) ?></td><?php */?>
            <td><?= h($author->created) ?></td>
            <td><?= h($author->modified) ?></td>
			<td><? echo $this->Html->image(IMG_PATH.'author/thumb/'.$author['photo'], array('width' =>'20','height' =>'20'));?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $author->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $author->id]) ?>
                <?php /* ?><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $author->id], ['confirm' => __('Are you sure you want to delete # {0}?', $author->id)]) ?><?php */ ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
   
</div>
</div>
</div>
</div>
