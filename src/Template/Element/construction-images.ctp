<?  use Cake\Datasource\ConnectionManager; $connection = ConnectionManager::get('default'); ?>
<div class="construction_img">
<div class="sub_heading"><h2>Construction Images - <? echo $projects[0]['heading3'] ; ?></h2></div>
<div class="floor_plan">

<? $count=0;  $gallery=$connection->execute("select gall.* from property_galleries as gall where  gall.property_id=:pid and type=:type",['pid'=>$projects[0]['id'],'type'=>$this->request->params['pass'][1]])->fetchAll('assoc');?>
<ul>
<? if(!empty($gallery)) { foreach($gallery as $gall) {?>

<li><div class="thumb_item item-type-line" data-link="index:<?=$count?>">
<div class="item-hover">
<div class="item-info"><?php /*?><div class="sqft">3087 Sq.Ft.</div><?php */?><div class="line"></div><div class="bhk_det"><?=$value3['name']?></div>
</div><div class="mask"></div></div><div class="item-img"><img src="<?=SITE_PATH?>img/property/gallery/orig/<?=$gall['image']?>" title="<?=date("F d, Y ",strtotime($gall['created']))?>" class="img-responsive" alt="<?=$gall['alt']?>" /></div></div>
</li>
<? $count++;  }  ?>

</ul>

<? } ?>
<div class="clearfix"></div>
</div>
</div>
<script src="<?=SITE_PATH?>js/jquery-1.10.0.min.js"></script>
<script src="<?=SITE_PATH?>js/modernizr.min.js" type="text/javascript"></script>
<script src="<?=SITE_PATH?>js/jquery.mousewheel.min.js"></script>
<script src="<?=SITE_PATH?>js/jquery.hammer.min.js" type="text/javascript"></script>
<script src="<?=SITE_PATH?>js/TweenMax.min.js" type="text/javascript"></script>
<script src="<?=SITE_PATH?>js/TouchNSwipe.min.js" type="text/javascript"></script>
<div class="sliderHolder" data-elem="sliderHolder">
<div class="slider" data-elem="slider" data-options="initShow:false; resetScrollDuration:1;" data-show="autoAlpha:1; display:block" data-hide="autoAlpha:0; display:none">
<div class="sliderBg blackBgAlpha90"></div>
<div class="slides" data-elem="slides" data-options="preloaderUrl:images/preloader.gif" ></div>
<div class="thumbsHolder" data-elem="thumbsHolder">
<div class="thumbs blackBgAlpha60" data-elem="thumbs" data-options="space:2; setParentVisibility:true; initShow:false; preloaderUrl:assets/preloader.gif" data-show="bottom:0px; position:absolute; display:block" data-hide="bottom:-100%; display:block" ></div>
</div>
<div class="captionHolder" data-elem="captionHolder">
<div class="caption blackBgAlpha60" data-elem="caption" data-options="initShow:true; setHolderHeight:true; resizeDuration:1;" data-show="top:0%; display:block; autoAlpha:1;" data-hide="top:-60px; display:none; autoAlpha:0; ease:Power4.easeIn"> </div>
</div>
<div class="controlHolder">
<div class="autoPlayIcon controlPos1" data-elem="autoPlay" data-on="background-position:-25px 0px;" data-off="background-position:0px 0px;"> </div>
<div class="prevIcon controlPos2" data-elem="prev" data-on="autoAlpha:1; cursor: pointer;" data-off="autoAlpha:0.5; cursor:default"> </div>
<div class="nextIcon controlPos3" data-elem="next" data-on="autoAlpha:1; cursor: pointer;" data-off="autoAlpha:0.5; cursor:default"> </div>
<div class="zoomOutIcon controlPos4" data-elem="zoomOut" data-on="autoAlpha:1; cursor: pointer;" data-off="autoAlpha:0.5; cursor:default"> </div>
<div class="zoomInIcon controlPos5" data-elem="zoomIn" data-on="autoAlpha:1; cursor: pointer;" data-off="autoAlpha:0.5; cursor:default"> </div>
<div class="thumbsOnIcon controlPos6" data-elem="thumbsToggle" data-on="background-position:-200px 0px;" data-off="background-position:-225px 0px;"></div>
<div class="captionOnIcon controlPos7" data-elem="captionToggle" data-on="background-position:-150px 0px;" data-off="background-position:-175px 0px;"></div>
<div class="closeIcon controlPos8" data-elem="close"></div>
</div>
<ul data-elem="items">
<? if(!empty($gallery)) { foreach($gallery as $gall) {?>
<li><a href="<?=SITE_PATH?>img/property/gallery/orig/<?=$gall['image']?>"><img src="<?=SITE_PATH?>img/property/gallery/orig/<?=$gall['image']?>" alt="<?=$gall['alt']?>"/></a></li>
<? } } ?>
</ul>
</div>
</div>
