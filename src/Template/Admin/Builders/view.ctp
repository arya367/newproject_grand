<ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?=SITE_PATH?>admin/users/welcome/">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Builder View</li>
          </ol>
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Builder'), ['action' => 'edit', $builder->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Builder'), ['action' => 'delete', $builder->id], ['confirm' => __('Are you sure you want to delete # {0}?', $builder->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Builders'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Builder'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Properties'), ['controller' => 'Properties', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Property'), ['controller' => 'Properties', 'action' => 'add']) ?> </li>
    </ul>
<div class="form-group container">
    <h2><?= h($builder->name) ?></h2>
 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr><td><h6 class="subheader"><?= __('Name') ?></h6>
            <td><p><?= h($builder->name) ?></p>
           <tr><td> <h6 class="subheader"><?= __('Heading') ?></h6>
          <td> <p><?= h($builder->heading) ?></p>
            <tr><td><h6 class="subheader"><?= __('Heading2') ?></h6>
            <td><p><?= h($builder->heading2) ?></p>
           <tr><td> <h6 class="subheader"><?= __('Url') ?></h6>
            <td><p><?= h($builder->url) ?></p>
            <tr><td><h6 class="subheader"><?= __('Photo') ?></h6>
            <td><p><? echo $this->Html->image(IMG_PATH.'builder/orig/'.$builder->photo); ?></p>
      
            <tr><td><h6 class="subheader"><?= __('Id') ?></h6>
            <td><p><?= $this->Number->format($builder->id) ?></p>
            <tr><td><h6 class="subheader"><?= __('Navid') ?></h6>
            <td><p><?= $this->Number->format($builder->navid) ?></p>
       
            <tr><td><h6 class="subheader"><?= __('Short Description') ?></h6>
            <td><?= $this->Text->autoParagraph(h($builder->short_description)); ?>

           <tr><td> <h6 class="subheader"><?= __('Description') ?></h6>
           <td> <?= $this->Text->autoParagraph(h($builder->description)); ?>

   
            <tr><td><h6 class="subheader"><?= __('Seo Title') ?></h6>
            <td><?= $this->Text->autoParagraph(h($builder->seo_title)); ?>

      
            <tr><td><h6 class="subheader"><?= __('Seo Keyword') ?></h6>
           <td> <?= $this->Text->autoParagraph(h($builder->seo_keyword)); ?>

           <tr><td> <h6 class="subheader"><?= __('Seo Description') ?></h6>
           <td><?= $this->Text->autoParagraph(h($builder->seo_description)); ?>

      
           <tr><td> <h6 class="subheader"><?= __('Status') ?></h6>
            <td><?= $this->Text->autoParagraph(h($builder->status)); ?>
</table>
        </div>


