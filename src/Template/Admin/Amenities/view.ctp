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
            <li class="breadcrumb-item active">Amenities View</li>
          </ol>


    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Amenity'), ['action' => 'edit', $amenity->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Amenity'), ['action' => 'delete', $amenity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $amenity->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Amenities'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Amenity'), ['action' => 'add']) ?> </li>
    </ul>
<div class="form-group container">
    <h2><?= h($amenity->name) ?></h2>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr><td><h6 class="subheader"><?= __('Name') ?></h6></td>
             <td><p><?= h($amenity->name) ?></p></td></tr>
            <tr><td><h6 class="subheader"><?= __('Class') ?></h6></td>
             <td><p><?= h($amenity->class) ?></p></td></tr>
      
            <tr><td><h6 class="subheader"><?= __('Id') ?></h6></td>
             <td><p><?= $this->Number->format($amenity->id) ?></p></td></tr>
            <tr><td><h6 class="subheader"><?= __('Priority') ?></h6></td>
             <td><p><?= $this->Number->format($amenity->priority) ?></p></td></tr>
        </table>
		</div>	
    </div>
</div>
