<div class="keyplan">
<div class="sub_heading"><h2><?=stripslashes($projects[0]['keyplan_heading']);?></h2></div>
<div class="locality"><img src="<?=SITE_PATH?>img/property/keyplan_plan/<? print_r($projects[0]['keyplan_image']);?>" class="img-responsive" alt="<? print_r($projects[0]['keyplan_alt_tag']);?>" data-link="index:0"  /></div>
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
<li><a href="<?=SITE_PATH?>img/property/keyplan_plan/<? print_r($projects[0]['keyplan_image']);?>"><img src="<?=SITE_PATH?>img/property/keyplan_plan/<? print_r($projects[0]['keyplan_image']);?>" alt="<? print_r($projects[0]['keyplan_alt_tag']);?>"/></a></li>
</ul>
</div>
</div>

