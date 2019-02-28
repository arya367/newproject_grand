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
        <li><?= $this->Html->link(__('Edit Menu'), ['action' => 'edit', $menu->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Menu'), ['action' => 'delete', $menu->id], ['confirm' => __('Are you sure you want to delete # {0}?', $menu->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Menus'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Menu'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Menuheaders'), ['controller' => 'Menuheaders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Menuheader'), ['controller' => 'Menuheaders', 'action' => 'add']) ?> </li>
    </ul>

<div class="form-group container">
    <h2><?= h($menu->name) ?></h2>
   <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
           <tr><td> <h6 class="subheader"><?= __('Menuheader') ?></h6>
           <td> <p><?= $menu->has('menuheader') ? $this->Html->link($menu->menuheader->name, ['controller' => 'Menuheaders', 'action' => 'view', $menu->menuheader->id]) : '' ?></p>
           <tr><td> <h6 class="subheader"><?= __('Name') ?></h6></td>
           <td> <p><?= h($menu->name) ?></p></tr></td> 
           <tr><td> <h6 class="subheader"><?= __('Controller') ?></h6>
           <td> <p><?= h($menu->controller) ?></p></tr></td> 
           <tr><td> <h6 class="subheader"><?= __('Action') ?></h6></td>
           <td> <p><?= h($menu->action) ?></p></tr></td> 
       
           <tr><td> <h6 class="subheader"><?= __('Id') ?></h6></td>
           <td> <p><?= $this->Number->format($menu->id) ?></p></tr></td> 
           <tr><td> <h6 class="subheader"><?= __('Navid') ?></h6></td>
           <td> <p><?= $this->Number->format($menu->navid) ?></p></tr></td> 
        
           <tr><td> <h6 class="subheader"><?= __('Status') ?></h6></td>
           <td> <?= $this->Text->autoParagraph(h($menu->status)); ?></tr></td> 
</table>
        </div>
    </div>
</div>
