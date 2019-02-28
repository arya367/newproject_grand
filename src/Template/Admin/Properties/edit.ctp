<style>
.overview{width:100%}
</style>
<?
use Cake\ORM\TableRegistry;

$units = TableRegistry::get('Units');
$unit = $units->find('list')->select(['id','name'])->order(['id' => 'ASC']);

$tabs = TableRegistry::get('PropertyTabs');
$tab = $tabs->find('list')->select(['id','name'])->where(['status'=>'active'])->order(['priority' => 'ASC']);

//$properties = TableRegistry::get('Properties');
//$property = $properties->find()->select(['id','name']);
?>
 <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?=SITE_PATH?>admin/users/welcome/">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Properties Edit</li>
          </ol>

<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Properties'), ['action' => 'index']) ?></li>
        <?php  echo $this->element('adminptabs'); ?>
    </ul>
</div>
<div class="form-group container">
    <?= $this->Form->create($property); ?>
    <fieldset>
        <legend><?= __('Edit Property') ?></legend>
		 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <?php
            echo "<tr><td>Builder</td><td>".$this->Form->input('builder_id', ['options' =>$builders,'label'=>false,'class'=>'overview']).
			"</td><td>Property type</td><td>".$this->Form->input('property_type_id', ['options' => $propertyTypes,'label'=>false,'class'=>'overview'])."</td></tr>";
			
			echo "<tr><td>Location</td><td>".$this->Form->input('location_id', ['options' => $locations,'label'=>false,'class'=>'overview']).
			"</td><td>Sector</td><td>".$this->Form->input('sector_id', ['options' => $sectors,'label'=>false,'class'=>'overview'])."</td></tr>";
			
			echo "<tr><td>Site Area</td><td>".$this->Form->input('site_area',['placeholder'=>'10 Acres','label'=>false,'class'=>'overview']).
			"</td><td>Tower Building</td><td>".$this->Form->input('tower_building',['placeholder'=>'6 Towers','label'=>false,'class'=>'overview'])."</td></tr>";
			
			
			echo "<tr><td>Name</td><td>".$this->Form->input('name',array('label'=>false,'class'=>'overview'))."</td><td>Heading 3</td><td>".$this->Form->input('heading3',array('label'=>false,'class'=>'overview'))."</td></tr>";
			
			
			?>
            <?php /*?><tr><td><div class='input number'><label for='budgetmin'>Budget Min</label><select name='budgetmin' id='budgetmin'><option value='0'>Min</option><?  for($l=10;$l<=100;$l++) {if($l==100){$data2="10000000";$data="1 Cr" ;}else{$data2=$l."00000";$data="$l Lacs" ;}?>
<option value='<?=$data2?>'><?=$data?></option><? } for($k=2;$k<=25;$k++) {?><option value='<?=$k?>0000000'><?=$k?> Cr</option><?  } ?></select></div></td><td><div class='input number'><label for='budgetmin'>Budget Max</label><select name='budgetmax' id='budgetmax'><option value='0'>Max</option><? for($l=15;$l<=100;$l++) {if($l==100){$data2="10000000";$data="1 Cr" ;}else{$data2=$l."00000";$data="$l Lacs" ;}?><option value='<?=$data2?>'><?=$data?></option><? } ?><? 
for($k=2;$k<=40;$k++) {?><option value='<?=$k?>0000000'><?=$k?> Cr</option><?  } ?></select></div></td></tr><?php */?>

<?
			
			echo "<tr><td>URL</td><td>".$this->Form->input('url',array('label'=>false,'class'=>'overview'))."</td><td>Location Text</td><td>".$this->Form->input('location_text',array('label'=>false,'class'=>'overview'))."</td></tr>";
			echo "<tr><td>Size</td><td>".$this->Form->input('area',['label'=>false,'class'=>'overview','placeholder'=>'2225 - 6410 Sq.Ft.'])."</td><td>Price</td><td>".$this->Form->input('price',['label'=>false,'placeholder'=>'4.10 Cr. - 10.57 Cr.','class'=>'overview'])."</td></tr>";
			echo "<tr><td>Offer Payment Plan</td><td>".$this->Form->input('offer_payment_plan',['label'=>false,'class'=>'overview','placeholder'=>'CLP/PLP/Subvention'])."</td><td>Completion</td><td>".$this->Form->input('completion',['label'=>false,'placeholder'=>'Aug, 2016','class'=>'overview'])."</td></tr>";
			echo "<tr><td>Project Status</td><td>".$this->Form->input('project_status',['label'=>false,'class'=>'overview','placeholder'=>'Under Development'])."</td><td>Availability</td><td>".$this->Form->input('availability',['label'=>false,'placeholder'=>'Booking Open','class'=>'overview'])."</td></tr>";
			echo "<tr><td>Small Info</td><td>".$this->Form->input('small_info',array('label'=>false,'class'=>'overview'),array("rows"=>"5"))."</td><td>Property Type Sublocation</td><td>".$this->Form->input('propertype_sublocation_id', ['options' => $propertypeSublocations,'label'=>false,'class'=>'overview'])."</td></tr>";
			
			echo "<tr><td>Latitude</td><td>".$this->Form->input('latitude',array('label'=>false,'class'=>'overview'))."</td><td>Longitude</td><td>".$this->Form->input('longitude',array('label'=>false,'class'=>'overview'))."</td></tr>";
			
			echo "<tr><td>Property Classification</td><td colspan='3'><div class='radio_align'>".$this->Form->input('hot_property',["type"=>"checkbox",'value' => 'Y','hiddenField' => 'N']).$this->Form->input('recommended',["type"=>"checkbox",'value' => 'Y','hiddenField' => 'N']).$this->Form->input('affordable_home',["type"=>"checkbox",'value' => 'Y','hiddenField' => 'N']).$this->Form->input('luxury_home',["type"=>"checkbox",'value' => 'Y','hiddenField' => 'N']).$this->Form->input('upcoming_property',["type"=>"checkbox",'value' => 'Y','hiddenField' => 'N']).$this->Form->input('nri',["type"=>"checkbox",'value' => 'Y','hiddenField' => 'N']).$this->Form->input('subvention',["type"=>"checkbox",'value' => 'Y','hiddenField' => 'N']).$this->Form->input('plp',["type"=>"checkbox",'value' => 'Y','hiddenField' => 'N']).$this->Form->input('buyBack',["type"=>"checkbox",'value' => 'Y','hiddenField' => 'N']).$this->Form->input('monthlyRental',["type"=>"checkbox",'value' => 'Y','hiddenField' => 'N']).$this->Form->input('assured_return',["type"=>"checkbox",'value' => 'Y','hiddenField' => 'N'])."</div></td></tr>";
			
			$selectedtabs=@unserialize($property->tabs);
			$selectedsubtype=@unserialize($property->property_subtype_id);
			$selectedbhk=@unserialize($property->bhk);
			
			echo "<tr><td>Property Subtype</td><td colspan='3'><div class='radio_align'>".$this->Form->input('property_subtype_id',['multiple'=>'checkbox','options' => $propertySubtypes,'val'=>$selectedsubtype])."</div></td></tr>";
					
			echo "<tr><td>Beds</td><td colspan='3'><div class='radio_align'>".$this->Form->input('bhk',['label'=>false,'options' => $unit,'multiple'=>'checkbox','val'=>$selectedbhk])."</div></td></tr>";

			
			echo "<tr><td>Tabs</td><td colspan='3'><div class='radio_align'>".$this->Form->input('tabs',['label'=>false,'options' => $tab,'multiple'=>'checkbox','val'=>$selectedtabs])."</div></td></tr>";
			
			echo "<tr><td>Status</td><td><div class='radio_align'>".$this->Form->input('status',['label'=>false,'type'=>'radio','options' => ['active'=>'Active','deactive'=>'Deactive']])."</div></td><td>Rating</td><td>".$this->Form->input('rating',array('label'=>false))."</td></tr>";
			echo "<tr><td>Rera id</td><td  colspan='3'>".$this->Form->input('reraid',array('label'=>false))."</td></tr>";
			
			
           
            /*echo $this->Form->input('name');
            echo $this->Form->input('url');
            echo $this->Form->input('small_info');
            echo $this->Form->input('heading2');
            echo $this->Form->input('heading3');
            echo $this->Form->input('property_subtype_id', ['options' => $propertySubtypes]);
            echo $this->Form->input('location_text');
            echo $this->Form->input('project_status');
            echo $this->Form->input('tabs');
            echo $this->Form->input('recommended_property');
            echo $this->Form->input('area');
            echo $this->Form->input('availability');
            echo $this->Form->input('bhk');
            echo $this->Form->input('price');
            echo $this->Form->input('budgetmin');
            echo $this->Form->input('budgetmax');
            echo $this->Form->input('completion');
            echo $this->Form->input('property_logo');
            echo $this->Form->input('property_logo_alt_tag');
            echo $this->Form->input('property_image');
            echo $this->Form->input('property_image_alt_tag');
            echo $this->Form->input('location_heading');
            echo $this->Form->input('location_image');
            echo $this->Form->input('location_detail');
            echo $this->Form->input('location_alt_tag');
            echo $this->Form->input('master_heading');
            echo $this->Form->input('master_image');
            echo $this->Form->input('master_alt_tag');
            echo $this->Form->input('site_heading');
            echo $this->Form->input('site_image');
            echo $this->Form->input('site_alt_tag');
            echo $this->Form->input('numbering_heading');
            echo $this->Form->input('numbering_image');
            echo $this->Form->input('numbering_alt_tag');
            echo $this->Form->input('overview');
            echo $this->Form->input('ebrochure_image');
            echo $this->Form->input('small_description');
            echo $this->Form->input('features');
            echo $this->Form->input('amenities');
            echo $this->Form->input('specification');
            echo $this->Form->input('ebrochure_pdf');
            echo $this->Form->input('ebrochure_desc');
            echo $this->Form->input('overview_heading');
            echo $this->Form->input('features_desc_heading');
            echo $this->Form->input('amenities_heading');
            echo $this->Form->input('specification_heading');
            echo $this->Form->input('ebrochure_heading');
            echo $this->Form->input('pricelist_heading');
            echo $this->Form->input('price_list_desc');
            echo $this->Form->input('application_heading');
            echo $this->Form->input('application_pdf');
            echo $this->Form->input('application_image');
            echo $this->Form->input('application_desc');
            echo $this->Form->input('gallery_heading');
            echo $this->Form->input('youtube_url');
            echo $this->Form->input('layout_heading');
            echo $this->Form->input('layout_image');
            echo $this->Form->input('layout_image_alt');
            echo $this->Form->input('posted_date');
            echo $this->Form->input('update_date');
            echo $this->Form->input('status');
            echo $this->Form->input('seo_title');
            echo $this->Form->input('seo_description');
            echo $this->Form->input('seo_keyword');
            echo $this->Form->input('open_graph_tags');
            echo $this->Form->input('open_graph_status');
            echo $this->Form->input('upcoming_property');
            echo $this->Form->input('upcoming_priority');
            echo $this->Form->input('recent_launches');
            echo $this->Form->input('recent_priority');
            echo $this->Form->input('luxury_home');
            echo $this->Form->input('luxury_priority');
            echo $this->Form->input('affordable_home');
            echo $this->Form->input('affordable_priority');
            echo $this->Form->input('recommended');
            echo $this->Form->input('recommended_priority');
            echo $this->Form->input('hot_property');
            echo $this->Form->input('hot_priority');
            echo $this->Form->input('nri');
            echo $this->Form->input('nri_priority');
            echo $this->Form->input('subvention');
            echo $this->Form->input('subvention_priority');
            echo $this->Form->input('plp');
            echo $this->Form->input('plp_priority');
            echo $this->Form->input('builderwise_priority');
            echo $this->Form->input('ptypewise');*/
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
