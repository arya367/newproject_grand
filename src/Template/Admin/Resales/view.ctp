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
            <li class="breadcrumb-item active">Resale View</li>
          </ol>    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Resale'), ['action' => 'edit', $resale->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Resale'), ['action' => 'delete', $resale->id], ['confirm' => __('Are you sure you want to delete # {0}?', $resale->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Resales'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Resale'), ['action' => 'add']) ?> </li>
    </ul>

<div class="form-group container">
    <h2><?= h($resale->id) ?></h2>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
       
           <tr><td> <h6 class="subheader"><?= __('Builder') ?></h6>
            <td> <p><?= $resale->has('builder') ? $this->Html->link($resale->builder->name, ['controller' => 'Builders', 'action' => 'view', $resale->builder->id]) : '' ?></p>
           <tr><td>  <h6 class="subheader"><?= __('Property') ?></h6>
           <td>  <p><?= $resale->has('property') ? $this->Html->link($resale->property->name, ['controller' => 'Properties', 'action' => 'view', $resale->property->id]) : '' ?></p>
            <tr><td> <h6 class="subheader"><?= __('Location') ?></h6>
            <td> <p><?= $resale->has('location') ? $this->Html->link($resale->location->name, ['controller' => 'Locations', 'action' => 'view', $resale->location->id]) : '' ?></p>
           <tr><td>  <h6 class="subheader"><?= __('Bhk Type') ?></h6>
            <td> <p><?= h($resale->bhk_type) ?></p>
            <tr><td> <h6 class="subheader"><?= __('Not Bhk Type') ?></h6>
            <td> <p><?= h($resale->not_bhk_type) ?></p>
           <tr><td>  <h6 class="subheader"><?= __('Subtype') ?></h6>
           <td>  <p><?= h($resale->subtype) ?></p>
           <tr><td>  <h6 class="subheader"><?= __('Price') ?></h6>
           <td>  <p><?= h($resale->price) ?></p>
           <tr><td>  <h6 class="subheader"><?= __('Email') ?></h6>
            <td> <p><?= h($resale->email) ?></p>
            <tr><td> <h6 class="subheader"><?= __('Phone') ?></h6>
            <td> <p><?= h($resale->phone) ?></p>
            <tr><td> <h6 class="subheader"><?= __('Budget1') ?></h6>
           <td>  <p><?= h($resale->budget1) ?></p>
           <tr><td>  <h6 class="subheader"><?= __('Budget2') ?></h6>
           <td>  <p><?= h($resale->budget2) ?></p>
            <tr><td> <h6 class="subheader"><?= __('Display Name') ?></h6>
            <td> <p><?= h($resale->display_name) ?></p>
            <tr><td><h6 class="subheader"><?= __('First Pr') ?></h6>
            <td>  <p><?= h($resale->first_pr) ?></p>
           <tr><td>  <h6 class="subheader"><?= __('Person Name') ?></h6>
           <td>  <p><?= h($resale->person_name) ?></p>
            <tr><td> <h6 class="subheader"><?= __('Property Type') ?></h6>
            <td>  <p><?= $resale->has('property_type') ? $this->Html->link($resale->property_type->name, ['controller' => 'PropertyTypes', 'action' => 'view', $resale->property_type->id]) : '' ?></p>
           <tr><td>  <h6 class="subheader"><?= __('Property Subtype') ?></h6>
           <td>  <p><?= $resale->has('property_subtype') ? $this->Html->link($resale->property_subtype->name, ['controller' => 'PropertySubtypes', 'action' => 'view', $resale->property_subtype->id]) : '' ?></p>
           <tr><td>  <h6 class="subheader"><?= __('Booking Rate') ?></h6>
            <td> <p><?= h($resale->booking_rate) ?></p>
            <tr><td> <h6 class="subheader"><?= __('Plc') ?></h6>
            <td>  <p><?= h($resale->plc) ?></p>
           <tr><td>  <h6 class="subheader"><?= __('Extra') ?></h6>
            <td>  <p><?= h($resale->extra) ?></p>
           <tr><td>  <h6 class="subheader"><?= __('Premium Demand') ?></h6>
            <td>  <p><?= h($resale->premium_demand) ?></p>
            <tr><td> <h6 class="subheader"><?= __('Payment Paid') ?></h6>
            <td>  <p><?= h($resale->payment_paid) ?></p>
           <tr><td>  <h6 class="subheader"><?= __('Executive Varification') ?></h6>
             <td> <p><?= h($resale->executive_varification) ?></p>
            <tr><td> <h6 class="subheader"><?= __('Verified By') ?></h6>
            <td>  <p><?= h($resale->verified_by) ?></p>
           <tr><td>  <h6 class="subheader"><?= __('Sector') ?></h6>
            <td>  <p><?= $resale->has('sector') ? $this->Html->link($resale->sector->name, ['controller' => 'Sectors', 'action' => 'view', $resale->sector->id]) : '' ?></p>
           <tr><td>  <h6 class="subheader"><?= __('Sector') ?></h6>
            <td>  <p><?= h($resale->sector) ?></p>
            <tr><td> <h6 class="subheader"><?= __('Limitval') ?></h6>
             <td> <p><?= h($resale->limitval) ?></p>
           <tr><td>  <h6 class="subheader"><?= __('Type Size') ?></h6>
            <td>  <p><?= h($resale->type_size) ?></p>
           <tr><td>  <h6 class="subheader"><?= __('Heading') ?></h6>
            <td>  <p><?= h($resale->heading) ?></p>
           <tr><td>  <h6 class="subheader"><?= __('Resale Date') ?></h6>
           <td> <p><?= h($resale->resale_date) ?></p>
            <tr><td> <h6 class="subheader"><?= __('Property Sub Location') ?></h6>
            <td> <p><?= h($resale->property_sub_location) ?></p>
            <tr><td> <h6 class="subheader"><?= __('Demand Size Name') ?></h6>
            <td> <p><?= h($resale->demand_size_name) ?></p>
           <tr><td>  <h6 class="subheader"><?= __('Booking Size Name') ?></h6>
            <td>  <p><?= h($resale->booking_size_name) ?></p>
          <tr><td>   <h6 class="subheader"><?= __('Size Name') ?></h6>
            <td>  <p><?= h($resale->size_name) ?></p>
           <tr><td>  <h6 class="subheader"><?= __('Floor') ?></h6>
           <td>   <p><?= h($resale->floor) ?></p>
          <tr><td>   <h6 class="subheader"><?= __('Central Utility Corridor') ?></h6>
            <td>  <p><?= h($resale->central_utility_corridor) ?></p>
           <tr><td>  <h6 class="subheader"><?= __('Resale Number') ?></h6>
            <td>  <p><?= h($resale->resale_number) ?></p>
           <tr><td>  <h6 class="subheader"><?= __('Client Name') ?></h6>
            <td>  <p><?= h($resale->client_name) ?></p>
           <tr><td>  <h6 class="subheader"><?= __('Client Email') ?></h6>
            <td>  <p><?= h($resale->client_email) ?></p>
           <tr><td>  <h6 class="subheader"><?= __('Client Phone') ?></h6>
           <td>   <p><?= h($resale->client_phone) ?></p>
           <tr><td>  <h6 class="subheader"><?= __('Extra 1') ?></h6>
             <td> <p><?= h($resale->extra_1) ?></p>
           <tr><td>  <h6 class="subheader"><?= __('Extra 2') ?></h6>
            <td> <p><?= h($resale->extra_2) ?></p>
            <tr><td> <h6 class="subheader"><?= __('Extra 3') ?></h6>
            <td> <p><?= h($resale->extra_3) ?></p>
       
	   
            <tr><td>    <h6 class="subheader"><?= __('Id') ?></h6>
            <td> <p><?= $this->Number->format($resale->id) ?></p>
           <tr><td>  <h6 class="subheader"><?= __('Resale Priority') ?></h6>
            <td>  <p><?= $this->Number->format($resale->resale_priority) ?></p>
       
	   
           <tr><td>  <h6 class="subheader"><?= __('Posted Date') ?></h6>
           <td>   <p><?= h($resale->posted_date) ?></p>
           <tr><td>  <h6 class="subheader"><?= __('Updated Date') ?></h6>
            <td>  <p><?= h($resale->updated_date) ?></p>
      
	  
            <tr><td> <h6 class="subheader"><?= __('Status') ?></h6>
           <td>  <?= $this->Text->autoParagraph(h($resale->status)); ?>
</table>
        </div>
    </div>
</div>
