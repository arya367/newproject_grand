<div id="wrapper">

      <div id="content-wrapper">

        <div class="container-fluid">
<ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?=SITE_PATH?>admin/users/welcome/">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Properties Location</li>
          </ol>

    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Location'), ['action' => 'edit', $location->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Location'), ['action' => 'delete', $location->id], ['confirm' => __('Are you sure you want to delete # {0}?', $location->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Locations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['action' => 'add']) ?> </li>
        
    </ul>

<div class="form-group container">
    <h2><?= h($location->name) ?></h2>
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        
            <tr><td><h6 class="subheader"><?= __('Name') ?></h6></td>
            <td><p><?= h($location->name) ?></p></td>
            <tr><td><h6 class="subheader"><?= __('State') ?></h6>
             <td><p><?= h($location->state) ?></p>
            <tr><td><h6 class="subheader"><?= __('Url') ?></h6>
            <td><p><?= h($location->url) ?></p>
            <tr><td><h6 class="subheader"><?= __('Image') ?></h6>
            <td><p><?=  $this->Html->image(IMG_PATH.'location/orig/'.$location->photo, ['alt' => $location->name]); ?></p></td>
			
        
            <tr><td><h6 class="subheader"><?= __('Id') ?></h6>
            <td><p><?= $this->Number->format($location->id) ?></p>
            <tr><td><h6 class="subheader"><?= __('Navid') ?></h6>
            <td><p><?= $this->Number->format($location->navid) ?></p>
       </table>
    </div>
</div>

</div>
