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
            <li class="breadcrumb-item active">Menu Header</li>
          </ol>

    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Menuheader'), ['action' => 'edit', $menuheader->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Menuheader'), ['action' => 'delete', $menuheader->id], ['confirm' => __('Are you sure you want to delete # {0}?', $menuheader->id)]) ?> </li>
    </ul>

<div class="form-group container">
    <h2><?= h($menuheader->name) ?></h2>
   <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr><td><h6 class="subheader"><?= __('Name') ?></h6>
             <td><p><?= h($menuheader->name) ?></p>
             <tr><td><h6 class="subheader"><?= __('Controller') ?></h6>
            <td> <p><?= h($menuheader->controller) ?></p>
             <tr><td><h6 class="subheader"><?= __('Action') ?></h6>
             <td><p><?= h($menuheader->action) ?></p>
        
            <tr><td> <h6 class="subheader"><?= __('Id') ?></h6>
            <td> <p><?= $this->Number->format($menuheader->id) ?></p>
             <tr><td><h6 class="subheader"><?= __('Navid') ?></h6>
             <td> <p><?= $this->Number->format($menuheader->navid) ?></p>
   
             <tr><td><h6 class="subheader"><?= __('Status') ?></h6>
            <td><?= $this->Text->autoParagraph(h($menuheader->status)); ?>
			</table>

  
</div></div></div></div>