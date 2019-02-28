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
            <li class="breadcrumb-item active">Property Subtypes View</li>
          </ol>


    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Price Management'), ['action' => 'edit', $priceManagement->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Price Management'), ['action' => 'delete', $priceManagement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $priceManagement->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Price Management'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Price Management'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Properties'), ['controller' => 'Properties', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Property'), ['controller' => 'Properties', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Units'), ['controller' => 'Units', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Unit'), ['controller' => 'Units', 'action' => 'add']) ?> </li>
    </ul>

<div class="priceManagement view large-10 medium-9 columns">
    <h2><?= h($priceManagement->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Property') ?></h6>
            <p><?= $priceManagement->has('property') ? $this->Html->link($priceManagement->property->name, ['controller' => 'Properties', 'action' => 'view', $priceManagement->property->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Unit') ?></h6>
            <p><?= $priceManagement->has('unit') ? $this->Html->link($priceManagement->unit->name, ['controller' => 'Units', 'action' => 'view', $priceManagement->unit->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Size') ?></h6>
            <p><?= h($priceManagement->size) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($priceManagement->id) ?></p>
            <h6 class="subheader"><?= __('Price') ?></h6>
            <p><?= $this->Number->format($priceManagement->price) ?></p>
        </div>
    </div>
</div>
