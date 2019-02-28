<style>
.overview{width:100%}
</style>
<div id="wrapper">

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
             <a href="<?=SITE_PATH?>admin/users/welcome/">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Properties Tabs</li>
          </ol>

    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Property Tab'), ['action' => 'edit', $propertyTab->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Property Tab'), ['action' => 'delete', $propertyTab->id], ['confirm' => __('Are you sure you want to delete # {0}?', $propertyTab->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Property Tabs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Property Tab'), ['action' => 'add']) ?> </li>
    </ul>
<div class="form-group container">
    <h2><?= h($propertyTab->name) ?></h2>
	<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    
            <tr><td><h6 class="subheader"><?= __('Name') ?></h6>
            <td><p><?= h($propertyTab->name) ?></p>
            <tr><td><h6 class="subheader"><?= __('Url') ?></h6>
            <td><p><?= h($propertyTab->url) ?></p>
       
            <tr><td><h6 class="subheader"><?= __('Id') ?></h6>
            <td><p><?= $this->Number->format($propertyTab->id) ?></p>
            <tr><td><h6 class="subheader"><?= __('Priority') ?></h6>
            <td><p><?= $this->Number->format($propertyTab->priority) ?></p>
       
            <tr><td><h6 class="subheader"><?= __('Status') ?></h6>
            <td><?= $this->Text->autoParagraph(h($propertyTab->status)); ?>
			</table>

</div>
