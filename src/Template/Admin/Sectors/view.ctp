<ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?=SITE_PATH?>admin/users/welcome/">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Properties Sector View</li>
          </ol>
<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Sector'), ['action' => 'edit', $sector->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sector'), ['action' => 'delete', $sector->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sector->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sectors'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sector'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="form-group container">
    <h2><?= h($sector->name) ?></h2>
     <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr><td><h6 class="subheader"><?= __('Name') ?></h6></td>
             <td><p><?= h($sector->name) ?></p></td>
            <tr><td><h6 class="subheader"><?= __('Url') ?></h6></td>
             <td><p><?= h($sector->url) ?></p></td>
            <tr><td><h6 class="subheader"><?= __('Location') ?></h6></td>
             <td><p><?= $sector->has('location') ? $this->Html->link($sector->location->name, ['controller' => 'Locations', 'action' => 'view', $sector->location->id]) : '' ?></p></td>
        
            <tr><td><h6 class="subheader"><?= __('Id') ?></h6></td>
            <td> <p><?= $this->Number->format($sector->id) ?></p></td>
           <tr><td> <h6 class="subheader"><?= __('Priority') ?></h6></td>
           <td><p><?= $this->Number->format($sector->priority) ?></p></td>
    </table>
</div>
