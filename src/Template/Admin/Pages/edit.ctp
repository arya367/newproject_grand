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
            <li class="breadcrumb-item active">Page Edit</li>
          </ol>
<?
use Cake\ORM\TableRegistry;

$propertySubtypes = TableRegistry::get('PropertySubtypes');
$propertySubtype = $propertySubtypes->find('list')->select(['id','name'])->order(['id' => 'ASC']);
?>

    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $page->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $page->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pages'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?> </li>
    </ul>

<div class="form-group container">
    <?= $this->Form->create($page,["type"=>"file"]); ?>
    <fieldset>
        <legend><?= __('Edit Page') ?></legend>
         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <?php 
            echo "<tr><td>Menu Heading</td><td>".$this->Form->input('menu_heading',array('label'=>false,'class'=>'overview'));
            echo "<tr><td>Url Display</td><td>".$this->Form->input('url_display',array('label'=>false,'class'=>'overview'));
            echo "<tr><td>Title</td><td>".$this->Form->input('title',array('label'=>false,'class'=>'overview'));
            echo "<tr><td>Short Description</td><td>".$this->Form->input('short_description',array('label'=>false,'class'=>'overview'));
            echo "<tr><td>Description</td><td>".$this->Form->input('description',array('label'=>false,'class'=>'overview'));
            echo "<tr><td>Status</td><td>".$this->Form->input('status',['type'=>'checkbox','value'=>'active']);
            
			/*echo $this->Form->input('navid');
            echo $this->Form->input('top');
            echo $this->Form->input('right');
            echo $this->Form->input('left');
            echo $this->Form->input('bottom');*/
			
            echo "<tr><td>Meta Title</td><td>".$this->Form->input('meta_title',array('label'=>false,'class'=>'overview'));
           // echo $this->Form->input('meta_keyword');
            echo "<tr><td>Meta Description</td><td>".$this->Form->input('meta_description',array('label'=>false,'class'=>'overview'));
		   //echo $this->Form->input('location_id', ['options' => $locations]);
            
			
			echo "<tr><td>Page Type</td><td>".$this->Form->input('searchtype',['label'=>false,"type"=>"select",'onChange'=>'filterThis(this.value)','options' => [''=>'Select','type'=>'Type', 'property_subtype_id'=>'Sub Type'],'selected'=>$page->searchtype]);
			
			
			if($page->searchtype=='property_subtype_id') {echo $this->Form->input('searchby',['label'=>'','id'=>'property_subtype_id','empty' => 'Select Type','options' => $propertySubtype]);}
			
			
            else if($page->searchtype=='type') { echo $this->Form->input('searchby',['label'=>'',"type"=>"select",'id'=>'type','empty' => 'Select Type','options' =>['hot_property'=>'Hot Property', 'recommended'=>'Recommended', 'affordable_home'=>'Affordable Home', 'luxury_home'=>'Luxury Home', 'upcoming_property'=>'Upcoming Property', 'subvention'=>'Subvention', 'plp'=>'Plp','assured_return'=>'Assured Return','monthlyRental'=>'Monthly Rental','buyBack'=>'Buy Back'],'selected'=>$page->searchby]);}
			
		if($page->searchtype!='property_subtype_id') { 
			
			echo $this->Form->input('searchby',['label'=>'','id'=>'property_subtype_id','empty' => 'Select Type','options' => $propertySubtype,'style'=>'display:none']); }
			
			if($page->searchtype!='type') {
            echo $this->Form->input('searchby',['label'=>'',"type"=>"select",'id'=>'type','style'=>'display:none','empty' => 'Select Type','options' =>['hot_property'=>'Hot Property', 'recommended'=>'Recommended', 'affordable_home'=>'Affordable Home', 'luxury_home'=>'Luxury Home', 'upcoming_property'=>'Upcoming Property', 'subvention'=>'Subvention', 'plp'=>'Plp','assured_return'=>'Assured Return','monthlyRental'=>'Monthly Rental','buyBack'=>'Buy Back'],'selected'=>$page->searchby]);
			
			
			}
            
        ?>
 <?   
       echo "<br/>";
		if(!empty($page->homePopupBanner)){ echo $this->Html->image(IMG_PATH.'popup/'.$page->homePopupBanner, ['width' =>'20','height' =>'20']);
		echo $this->Form->input('hiddenPopupBanner',["type"=>"hidden","value"=>$page->homePopupBanner]);
		}
		echo "<br/>";
		echo "<tr><td>HomePopupBanner</td><td>".$this->Form->input('homePopupBanner',array("type"=>"file" ,'label'=>false,'class'=>'overview'));
		echo "<br/>";
		echo "<tr><td>HomePopupBannerUrl</td><td>".$this->Form->input('homePopupBannerUrl',array("type"=>"text" ,'label'=>false,'class'=>'overview'));
  
  ?>
  </table>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<script>
function filterThis(value)
{  var myArray = ["type", "property_subtype_id"];

	for (var i in myArray){
		//alert(myArray[i]);
		if(value==myArray[i]) {
			document.getElementById(myArray[i]).style.display='block';
			$("#"+ myArray[i]).attr('name', 'searchby');
			}
			else
			{
				$("#"+ myArray[i]).attr('name', '123');
				document.getElementById(myArray[i]).style.display='none';
				}
		}

	
	
	
	}
</script>
