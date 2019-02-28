<div id="wrapper">

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
             <a href="<?=SITE_PATH?>admin/users/welcome/">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Gallery View</li>
          </ol>
<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Property Gallery'), ['action' => 'edit', $propertyGallery->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Property Gallery'), ['action' => 'delete', $propertyGallery->id], ['confirm' => __('Are you sure you want to delete # {0}?', $propertyGallery->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Property Galleries'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Property Gallery'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Properties'), ['controller' => 'Properties', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Property'), ['controller' => 'Properties', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="form-group container">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <h2><?= h($propertyGallery->id) ?></h2>
   
           <tr><td> <h6 class="subheader"><?= __('Property') ?></h6>
           <td> <p><?= $propertyGallery->has('property') ? $this->Html->link($propertyGallery->property->name, ['controller' => 'Properties', 'action' => 'view', $propertyGallery->property->id]) : '' ?></p>
           <tr><td> <h6 class="subheader"><?= __('Alt') ?></h6>
            <td><p><?= h($propertyGallery->alt) ?></p>
           <tr><td> <h6 class="subheader"><?= __('Image') ?></h6>
            <td><p><?= h($propertyGallery->image) ?></p>
    
           <tr><td> <h6 class="subheader"><?= __('Id') ?></h6>
           <td><p><?= $this->Number->format($propertyGallery->id) ?></p>
      
           <tr><td> <h6 class="subheader"><?= __('Created') ?></h6>
            <td> <p><?= h($propertyGallery->created) ?></p>
       
           <tr><td> <h6 class="subheader"><?= __('Type') ?></h6>
           <td> <?= $this->Text->autoParagraph(h($propertyGallery->type)); ?>
</table>
        </div>
    </div>
</div>
</div>

        </div>
    </div>
</div>
