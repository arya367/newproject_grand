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
            <li class="breadcrumb-item active">Properties Add</li>
          </ol>
<?
use Cake\ORM\TableRegistry;

$units = TableRegistry::get('Units');
$unit = $units->find('list')->select(['id','name'])->order(['id' => 'ASC']);

$tabs = TableRegistry::get('PropertyTabs');
$tab = $tabs->find('list')->select(['id','name'])->where(['status'=>'active'])->order(['priority' => 'ASC']);

//$properties = TableRegistry::get('Properties');
//$property = $properties->find()->select(['id','name']);
?>
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Properties'), ['action' => 'index']) ?></li>
    </ul>

<div class="form-group container">

<div class="table-responsive">
    <?= $this->Form->create($property); ?>
    
     <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <fieldset>
        <legend><?= __('Add Property') ?></legend>
		
        <?php
            echo "<tr><td>Builder</td><td>".$this->Form->input('builder_id', ['options' =>$builders,'label'=>false,'class'=>'overview'])."</td>
			<td>Property Type</td><td>".$this->Form->input('property_type_id', ['options' => $propertyTypes,'label'=>false,'class'=>'overview'])."</td></tr>";
			
			echo "<tr><td>Location</td><td>".$this->Form->input('location_id', ['options' => $locations,'label'=>false,'class'=>'overview'])."</td>
			<td>Sector</td><td>".$this->Form->input('sector_id', ['options' => $sectors,'label'=>false,'class'=>'overview'])."</td></tr>";
			
			echo "<tr><td>Site Area</td><td>".$this->Form->input('site_area',['placeholder'=>'10 Acres','label'=>false,'class'=>'overview'])."</td>
			<td>Tower Building</td><td>".$this->Form->input('tower_building',['placeholder'=>'6 Towers','label'=>false,'class'=>'overview'])."</td></tr>";
			
			
			echo "<tr><td>Name</td><td>".$this->Form->input('name',array('label'=>false,'class'=>'overview'))."</td><td>Heading 3</td><td>".$this->Form->input('heading3',array('label'=>false,'class'=>'overview'))."</td></tr>";
			
			
			?>
            <?php /*?><tr><td><div class='input number'><label for='budgetmin'>Budget Min</label><select name='budgetmin' id='budgetmin'><option value='0'>Min</option><?  for($l=10;$l<=100;$l++) {if($l==100){$data2="10000000";$data="1 Cr" ;}else{$data2=$l."00000";$data="$l Lacs" ;}?>
<option value='<?=$data2?>'><?=$data?></option><? } for($k=2;$k<=25;$k++) {?><option value='<?=$k?>0000000'><?=$k?> Cr</option><?  } ?></select></div></td><td><div class='input number'><label for='budgetmin'>Budget Max</label><select name='budgetmax' id='budgetmax'><option value='0'>Max</option><? for($l=15;$l<=100;$l++) {if($l==100){$data2="10000000";$data="1 Cr" ;}else{$data2=$l."00000";$data="$l Lacs" ;}?><option value='<?=$data2?>'><?=$data?></option><? } ?><? 
for($k=2;$k<=40;$k++) {?><option value='<?=$k?>0000000'><?=$k?> Cr</option><?  } ?></select></div></td></tr><?php */?>

<?
			
			echo "<tr><td>Url</td><td>".$this->Form->input('url',array('label'=>false,'class'=>'overview'))."</td><td>Location Text</td><td>".$this->Form->input('location_text',array('label'=>false,'class'=>'overview'))."</td></tr>";
			echo "<tr><td>Size</td><td>".$this->Form->input('area',['label'=>false,'placeholder'=>'2225 - 6410 Sq.Ft.','class'=>'overview'])."</td><td>Price</td><td>".$this->Form->input('price',['label'=>false,'placeholder'=>'4.10 Cr. - 10.57 Cr.','class'=>'overview'])."</td></tr>";
			echo "<tr><td>Offer Payment plan</td><td>".$this->Form->input('offer_payment_plan',['label'=>false,'placeholder'=>'CLP/PLP/Subvention','class'=>'overview'])."</td><td>Completion</td><td>".$this->Form->input('completion',['label'=>false,'placeholder'=>'Aug, 2016','class'=>'overview'])."</td></tr>";
			echo "<tr><td>Project Status</td><td>".$this->Form->input('project_status',['label'=>false,'placeholder'=>'Under Development','class'=>'overview'])."</td><td>Availability</td><td>".$this->Form->input('availability',['label'=>false,'placeholder'=>'Booking Open','class'=>'overview'])."</td></tr>";
			echo "<tr><td>Small Info</td><td>".$this->Form->input('small_info',array('label'=>false,'class'=>'overview'))."</td><td>Property type Sublocation</td><td>".$this->Form->input('propertype_sublocation_id', ['options' => $propertypeSublocations,'label'=>false,'class'=>'overview'])."</td></tr>";
			
			echo "<tr><td>Latitude</td><td>".$this->Form->input('latitude',array('label'=>false,'class'=>'overview'))."</td><td>Longitude</td><td>".$this->Form->input('longitude',array('label'=>false,'class'=>'overview'))."</td></tr>";
			
			echo "<tr><td>Property Classification</td><td colspan='3'><div class='radio_align'>".$this->Form->input('hot_property',["type"=>"checkbox",'value' => 'Y','hiddenField' => 'N']).$this->Form->input('recommended',["type"=>"checkbox",'value' => 'Y','hiddenField' => 'N']).$this->Form->input('affordable_home',["type"=>"checkbox",'value' => 'Y','hiddenField' => 'N']).$this->Form->input('luxury_home',["type"=>"checkbox",'value' => 'Y','hiddenField' => 'N'])./*$this->Form->input('upcoming_property',["type"=>"checkbox",'value' => 'Y','hiddenField' => 'N']).$this->Form->input('nri',["type"=>"checkbox",'value' => 'Y','hiddenField' => 'N']).$this->Form->input('subvention',["type"=>"checkbox",'value' => 'Y','hiddenField' => 'N']).$this->Form->input('plp',["type"=>"checkbox",'value' => 'Y','hiddenField' => 'N']).$this->Form->input('buyBack',["type"=>"checkbox",'value' => 'Y','hiddenField' => 'N']).$this->Form->input('monthlyRental',["type"=>"checkbox",'value' => 'Y','hiddenField' => 'N']).$this->Form->input('assured_return',["type"=>"checkbox",'value' => 'Y','hiddenField' => 'N']).*/"</div></td></tr>";
			
			echo "<tr><td>Property Subtype</td><td colspan='3'><div class='radio_align'>".$this->Form->input('property_subtype_id',['label'=>false,'multiple'=>'checkbox','options' => $propertySubtypes,'class'=>'overview'])."</div></td></tr>";
					
			echo "<tr><td>Beds</td><td colspan='3'><div class='radio_align'>".$this->Form->input('bhk',['label'=>false,'options' => $unit,'multiple'=>'checkbox'])."</div></td></tr>";
			
			echo "<tr><td>Menu Tabs</td><td colspan='3'><div class='radio_align'>".$this->Form->input('tabs',['label'=>false,'options' => $tab,'multiple'=>'checkbox'])."</div></td></tr>";
		echo "<tr><td>Rating</td><td>".$this->Form->input('rating',array('label'=>false))."</td><td>Rera Id</td><td>".$this->Form->input('reraid',array('label'=>false))."</td></tr>";
			
        ?>
		
    </fieldset>
   </table>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
     
    </div>
    </div>
</div>
</div>
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
  $("#location-id").change(function(){ 
  var c=$(this).val();
 $.ajax({url:"<?=SITE_PATH?>admin/propertypeSublocations/sublocationlist/"+escape(c),dataType:"html",success:function(result){
		$("#propertype-sublocation-id").html(result);
		}});
  });
});

$('#small-description').keyup(function() { 
if($(this).val().length>132)
{
var data=$(this).val().substr(0,132);
$('#small-description').val(data);
alert("CONTENT SHOULD BE LESS THEN 133");
}
else
{
var data=$(this).val();
}
len=data.length;
$("#characters").text(len);
});
</script>