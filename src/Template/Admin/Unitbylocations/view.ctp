<style>
.overview{width:100%}
</style>
<ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?=SITE_PATH?>admin/users/welcome/">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Property Unit Location View</li>
          </ol>

<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Unitbylocation'), ['action' => 'edit', $unitbylocation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Unitbylocation'), ['action' => 'delete', $unitbylocation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $unitbylocation->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Unitbylocations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Unitbylocation'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Units'), ['controller' => 'Units', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Units'), ['controller' => 'Units', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="form-group container">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <h2><?= h($unitbylocation->name) ?></h2>
   
            <tr><td><h6 class="subheader"><?= __('Location') ?></h6></td>
            <td><p><?= $unitbylocation->has('location') ? $this->Html->link($unitbylocation->location->name, ['controller' => 'Locations', 'action' => 'view', $unitbylocation->location->id]) : '' ?></p></td>
            <tr><td><h6 class="subheader"><?= __('Url') ?></h6>
            <td><p><?= h($unitbylocation->url) ?></p>
           <tr><td> <h6 class="subheader"><?= __('Name') ?></h6>
            <td> <p><?= h($unitbylocation->name) ?></p>
           <tr><td> <h6 class="subheader"><?= __('Heading1') ?></h6>
             <td> <p><?= h($unitbylocation->heading1) ?></p>
           <tr><td> <h6 class="subheader"><?= __('Heading2') ?></h6>
            <td> <p><?= h($unitbylocation->heading2) ?></p>
        
           <tr><td> <h6 class="subheader"><?= __('Id') ?></h6>
            <td> <p><?= $this->Number->format($unitbylocation->id) ?></p>
           <tr><td> <h6 class="subheader"><?= __('Unit Id') ?></h6>
            <td><p><?= $this->Number->format($unitbylocation->unit_id) ?></p>
       
            <tr><td><h6 class="subheader"><?= __('Created') ?></h6>
            <td><p><?= h($unitbylocation->created) ?></p>
           <tr><td> <h6 class="subheader"><?= __('Updated') ?></h6>
            <td> <p><?= h($unitbylocation->updated) ?></p>
       
            <tr><td><h6 class="subheader"><?= __('Seo Title') ?></h6>
             <td><?= $this->Text->autoParagraph(h($unitbylocation->seo_title)); ?>

        
            <tr><td><h6 class="subheader"><?= __('Seo Keyword') ?></h6>
            <td> <?= $this->Text->autoParagraph(h($unitbylocation->seo_keyword)); ?>

      
    
           <tr><td> <h6 class="subheader"><?= __('Seo Description') ?></h6>
             <td><?= $this->Text->autoParagraph(h($unitbylocation->seo_description)); ?>

    
       
           <tr><td> <h6 class="subheader"><?= __('Description') ?></h6>
           <td><?= $this->Text->autoParagraph(h($unitbylocation->description)); ?>

      
            <tr><td><h6 class="subheader"><?= __('Status') ?></h6>
            <td><?= $this->Text->autoParagraph(h($unitbylocation->status)); ?>

     
            <tr><td><h6 class="subheader"><?= __('Issublocation') ?></h6>
            <td> <?= $this->Text->autoParagraph(h($unitbylocation->issublocation)); ?>

</div>
