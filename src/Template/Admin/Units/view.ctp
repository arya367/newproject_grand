<ol class="breadcrumb">
            <li class="breadcrumb-item">
             <a href="<?=SITE_PATH?>admin/users/welcome/">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Unit View</li>
          </ol>
<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Unit'), ['action' => 'edit', $unit->id]) ?> </li>
       <li><?= $this->Form->postLink(__('Delete Unit'), ['action' => 'delete', $unit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $unit->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Units'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Unit'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="form-group container">
    <h2><?= h($unit->name) ?></h2>
     <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr><td><h6 class="subheader"><?= __('Name') ?></h6>
            <td><p><?= h($unit->name) ?></p>
            <tr><td><h6 class="subheader"><?= __('Url') ?></h6>
            <td><p><?= h($unit->url) ?></p>
        
            <tr><td><h6 class="subheader"><?= __('Id') ?></h6>
            <td><p><?= $this->Number->format($unit->id) ?></p>
            <tr><td><h6 class="subheader"><?= __('Priority') ?></h6>
            <td><p><?= $this->Number->format($unit->priority) ?></p>
			</table>
      
</div>

