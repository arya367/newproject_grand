<? 
$i==0;
if(iterator_count($latestprojects)) { 
?>
<? foreach($latestprojects as $latestprojectslinks) {
$i++;	
	 ?>
<div class="carousel-item <? if($i=='1') {?>active <? }?>">
<div class="row">
<div class="col-lg-6 offset-lg-1 col-12"><a href="<? echo SITE_PATH.'project/'.$latestprojectslinks->url ; ?>/"><img class="img-fluid" src="<?=IMG_PATH?>property/propertyimage/<? echo $latestprojectslinks->property_image ;?>" alt="<? echo $latestprojectslinks->heading3; ?>" /></a></div>
<div class="col-lg-4 col-12">
<div class="slide_inf">
<h3><? echo $latestprojectslinks->heading3 ; ?></h3>
<div class="slider_nm_bg"><? echo $latestprojectslinks->small_info ; ?></div>
<a href="<? echo SITE_PATH.'project/'.$latestprojectslinks->url ; ?>/" class="btn btn-outline-dark" target="_blank">View More..</a>
</div>
</div>
</div>
</div>
<? } ?>
<? } ?>
 