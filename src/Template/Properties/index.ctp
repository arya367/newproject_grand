<?  use Cake\Datasource\ConnectionManager; $connection = ConnectionManager::get('default'); if($total!=0) { ?>
<?  foreach($results as $data) {?>
<div class="plist_inner">
<div class="row">
<div class="col-md-5"><figure><a href="<? echo SITE_PATH.'project/'.$data['url']; ?>/" target="_blank"><img src="<? echo SITE_PATH.'img/property/propertyimage/'.$data['property_image']; ?>" alt="<?=$data['property_image_alt_tag']?>" class="img-fluid"></a></figure></div>
<div class="col-md-7 pl-md-0"><div class="plist_detail">
<h2><? echo $data['heading3'] ; ?></h2>
<div class="plist_location"><span><?php if(!empty($unittypes)){ ?><?php $bhk=''; foreach($unittypes as $key=>$bhkvalue) { $bhk.=$bhkvalue['name'].', '; } echo rtrim($bhk," ,");?> <? }?><? echo $data['ptypename'] ; ?></span>, at <span><? echo $data['location_text']?> <? echo ' ( '.ucwords($data['locatname']).' ) ' ; ?>.</span></div>
<p><? echo $data['small_info']?> </p>
<div class="row">
	<div class="col-md-5 col-6"><a href="<? echo SITE_PATH.'project/'.$data['url']; ?>/" target="_blank">More Details &rarr;</a></div>
	<div class="col-md-7 col-6"><div class="plist_price"><? echo $data['price'] ; ?> </div></div>
</div>
</div></div>
</div>
</div>
<? }   ?>
<?=$this->cell('Paging',[$currentpage,$total,$table,$paginglink]);?>

<? }  else { echo '<div class="message warning" id="flashMessage">DATA NOT FOUND</div>'; } ?>

