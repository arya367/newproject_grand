<? if(!empty($result)) { ?> 
<div class="similar_project">
<div class="sub_heading"><h4>Similar Projects</h4></div>
<div class="row">
<? foreach($result as $relatedlist) { ?>
<div class="col-sm-6 col-md-4 paddingB20 col-xs-6 col-xsmall">            
<div class="thumbnail">
<div class="simi_caption">
<div class="simi_heading"><? echo $relatedlist['heading3']?></div>
<div class="simi_builder"><i class="fa fa-home"></i> : <span><? echo $relatedlist['buildname']?></span></div>
<div class="simi_locality"><i class="fa fa-map-marker"></i> : <span><? echo $relatedlist['location_text']?> (<? echo $relatedlist['locname']?>)</span></div>
<div class="simi_price"><i class="fa fa-rupee"></i> : <? echo $relatedlist['price']?></div>
<div class="simi_btn"><a href="<? echo SITE_PATH.'project/'.$relatedlist['url'] ; ?>/" class="btn btn-default btn-outline btn-sm">View Details</a></div>
</div><img src="<?=SITE_PATH?>img/property/propertyimage/<? echo $relatedlist['property_image']?>" alt="<? echo $relatedlist['heading3']?>">
</div>
</div>
<? } ?>
</div>
</div>
<? } ?>

