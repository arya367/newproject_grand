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
            <li class="breadcrumb-item active">Resale Edit</li>
          </ol>
<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $resale->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $resale->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Resales'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="form-group container">
    <?= $this->Form->create($resale); ?>
    <fieldset><legend><?= __('Edit Resale') ?></legend>
           <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <?php
		
				echo "<tr><td>Builder</td><td>".$this->Form->input('builder_id', ['options' =>$builders,'label'=>false])."</td><td>Property</td><td>".$this->Form->input('property_id', ['options' => $properties,'label'=>false])."</td></tr>";
				/*echo "<tr><td></td><td>".$this->Form->input('location_id', ['options' =>$locations,'label'=>false])."</td><td></td><td>".$this->Form->input('sector_id', ['options' => $sectors,'label'=>false])."</td></tr>";*/
				echo "<tr><td>Property Type</td><td>".$this->Form->input('property_type_id', ['options' => $propertyTypes,'label'=>false])."</td><td>Property Subtype</td><td>".$this->Form->input('property_subtype_id', ['options' => $propertySubtypes,'label'=>false])."</td></tr>";
				echo "<tr><td>Unit Type</td><td>".$this->Form->input('bhk_type',['label'=>'Unit Type','label'=>false])."</td><td>Unit Size</td><td>".$this->Form->input('type_size',['label'=>'Unit Size','label'=>false])."</td></tr>";
				
				echo "<tr><td>Tower</td><td>".$this->Form->input('tower',array('label'=>false))."</td><td>Floor</td><td>".$this->Form->input('floor',array('label'=>false))."</td></tr>";
				echo "<tr><td>PLC</td><td>".$this->Form->input('plc',['label'=>false])."</td><td>PLC price</td><td>".$this->Form->input('plc_price',['label'=>false])."</td></tr>";
				
				echo "<tr><td>Booking Price</td><td>".$this->Form->input('price',['label'=>false])."</td><td>Demand Price</td><td>".$this->Form->input('premium_demand',['label'=>false])."</td></tr>";
				
				echo "<tr><td>Total Booking Amount</td><td>".$this->Form->input('total_booking_price',['label'=>false])."</td><td>Total Demand</td><td>".$this->Form->input('total_demand_price',['label'=>false])."</td></tr>";
				
				echo "<tr><td>Payment_paid</td><td>".$this->Form->input('payment_paid',array('label'=>false))."</td><td>Executive Name</td><td>".$this->Form->input('person_name',['label'=>false])."</td></tr>";
				
				
				echo "<tr><td>Executive Phone</td><td>".$this->Form->input('phone',['label'=>false])."</td><td>Executive Email</td><td>".$this->Form->input('email',['label'=>false])."</td></tr>";
				echo "<tr><td>Client Name</td><td>".$this->Form->input('client_name',array('label'=>false))."</td><td>Client Email</td><td>".$this->Form->input('client_email',array('label'=>false))."</td></tr>";
				echo "<tr><td>Client Phone</td><td>".$this->Form->input('client_phone',array('label'=>false))."</td><td>Phone 2</td><td>".$this->Form->input('extra_1',['label'=>false])."</td></tr>";
				echo "<tr><td>Extra 2</td><td>".$this->Form->input('extra_2',array('label'=>false))."</td><td>Verified by</td><td>".$this->Form->input('verified_by',array('label'=>false))."</td></tr>";
			    echo "<tr><td>Resale date </td><td colspan='3'>".$this->Form->input('resale_date',['type'=>'date','label'=>false])."</td></tr>";
				echo "<tr><td>Status<td colspan='3'>".$this->Form->input('status',['type'=>'radio','options'=>['active'=>'Active','deactive'=>'Deactive'],'value'=>'active','label'=>false])."</td></tr>";
			 
            
           
            
        ?>
        </table>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<script>
$(document).ready(function(){
  $("#location-id").change(function(){ 
  var c=$(this).val();
 $.ajax({url:"<?=SITE_PATH?>admin/sectors/sectorlist/"+escape(c),dataType:"html",success:function(result){
		$("#sector-id").html(result);
		}});
  });
});

$(document).ready(function(){
  $("#builder-id").change(function(){ 
  var c=$(this).val();
 $.ajax({url:"<?=SITE_PATH?>admin/properties/proplist/"+escape(c),dataType:"html",success:function(result){
		$("#property-id").html(result);
		}});
  });
});

</script>