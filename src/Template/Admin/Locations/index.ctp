<div id="wrapper">

      <div id="content-wrapper">

        <div class="container-fluid">
<ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?=SITE_PATH?>admin/users/welcome/">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Properties Location</li>
          </ol>
<? // print_r(request->session()); ?>

    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Location'), ['action' => 'add']) ?></li>
    </ul>
<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Projects Location List</div>
            <div class="card-body">
              <div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Id</th>
            <th>name</th>
            <th>State</th>
            <th>Url</th>
            <th>images</th>
            <th>navid</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Id</th>
            <th>name</th>
            <th>State</th>
            <th>Url</th>
            <th>images</th>
            <th>navid</th>
            <th>Actions</th>
        </tr>
    </tfoot>
    <tbody>
    <?php foreach ($locations as $location): ?>
        <tr>
            <td><?= $this->Number->format($location->id) ?></td>
            <td><?= h($location->name) ?></td>
            <td><?= h($location->state) ?></td>
            <td><?= h($location->url) ?></td>
            <td><?= $this->Html->image(IMG_PATH.'location/orig/'.$location->photo, ['alt' => $location->name,'width' => '20','height' => '20']); ?></td>
            <td><?= $this->Number->format($location->navid) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $location->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $location->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $location->id], ['confirm' => __('Are you sure you want to delete # {0}?', $location->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
   </div>
   </div> 
</div>
