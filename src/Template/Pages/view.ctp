<?  use Cake\Datasource\ConnectionManager;  $connection = ConnectionManager::get('default'); if($total!=0) { ?>
<?  foreach($results as $data) {?>
<div class="row pr_list">
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-4 col-xsmall"><div class="pr_img"><img src="<? echo SITE_PATH.'img/property/propertyimage/'.$data['property_image']; ?>" class="img-responsive" alt="<?=$data['property_image_alt_tag']?>"></div></div>
<div class="col-lg-8 col-md-8 col-sm-6 col-xs-8 col-xsmall"><div class="pr_det">
<div class="row">
<div class="col-lg-6 col-md-6 col-xs-7 col-xsmall"><div class="pr_heading"><h3><a href="<? echo SITE_PATH.'project/'.$data['url']; ?>/"><? echo $data['heading3'] ; ?></a></h3><div class="locality"><i class="fa fa-map-marker"></i> <?= strlen($data['sectorurl'])>4 ? $this->Html->link($data['location_text'], SITE_PATH.'location/'.$data['locaturl'].'/'.$data['sectorurl'].'/') : $data['location_text'] ?> <? echo ' ( '.ucwords($data['locatname']).' ) ' ; ?></div></div></div>
<div class="col-lg-6 col-md-6 col-xs-5 col-xsmall"><div class="price"><i class="fa fa-rupee"></i> <? echo $data['price'] ; ?></div></div>
</div>
<div class="row">
<div class="col-lg-12">
<div class="border_all">
<div class="row"><?  $property_subtype_id=unserialize($data['property_subtype_id']); if($property_subtype_id){ $ides=implode(",",$property_subtype_id); $subtypedata = $connection->execute("select name from property_subtypes as subtype  where id in(".$ides.")")->fetchAll('assoc'); }  $data2='';  foreach($subtypedata as $key2=>$value2){ $data2.=$value2['name'].', '; }  ?>
<div class="col-lg-3 col-md-3 col-xs-3 col-xsmall"><div class="pr_type"><span class="text-muted">Property Type</span> <? echo $data['ptypename'] ; ?></div></div>
<div class="col-lg-6 col-md-6 col-xs-6 col-xsmall border_l"><div class="pr_sub"><span class="text-muted">Sub Type</span> <? echo rtrim($data2," ,"); ; ?></div></div>
<div class="col-lg-3 col-md-3 col-xs-3 col-xsmall border_l"><div class="pr_sub"><span class="text-muted">Availability</span> <? echo $data['availability'] ; ?></div></div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-6 col-md-6 col-xs-6 col-xsmall"><div class="pr_developer"><span>Builder :</span> <? echo $data['buildname']; ?></div></div>
<div class="col-lg-6 col-md-6 col-xs-6 col-xsmall"><div class="pr_btn"><a href="<? echo SITE_PATH.'project/'.$data['url']; ?>/" class="btn btn-primary btn-outline">View Details</a></div></div>
</div>
</div></div>
</div>
<? }   ?>
<?=$this->cell('Paging',[$currentpage,$total,$table,$paginglink]);?>

<? }  else { echo '<div class="message warning" id="flashMessage">DATA NOT FOUND</div>'; } ?>
<? //=$this->requestAction(array("controller"=>"PropertypeLocations","action"=>"pagingtest"));?>