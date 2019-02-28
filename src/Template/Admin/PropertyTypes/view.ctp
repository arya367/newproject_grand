<ol class="breadcrumb">
            <li class="breadcrumb-item">
            <a href="<?=SITE_PATH?>admin/users/welcome/">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Property Type</li>
          </ol>
<div class="container-fluid">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Property Type'), ['action' => 'edit', $propertyType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Property Type'), ['action' => 'delete', $propertyType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $propertyType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Property Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Property Type'), ['action' => 'add']) ?> </li>
      
    </ul>
</div>
<div class="form-group container">
    <h2><?= h($propertyType->name) ?></h2>
	 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
   
           <tr><td><p> <?= __('Name') ?> : 
          <td> <?= h($propertyType->name) ?></p>
            <tr><td><p> <?= __('Url') ?> : 
           <td><?= h($propertyType->url) ?></p>
       
           <tr><td><p> <?= __('Id') ?>  : 
           <td><?= $this->Number->format($propertyType->id) ?></p>
           <tr><td><p> <?= __('Priority') ?> : 
           <td> <?= $this->Number->format($propertyType->priority) ?></p>
       
           <tr><td> <p><?= __('Status') ?> : 
          <td> <?= h($propertyType->status); ?></p>

    

</div>


