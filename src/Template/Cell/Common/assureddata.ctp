<? if(iterator_count($actionableassured)) { ?> <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 col-xsmall">
<div class="action_list1">
<h4>Assured Return Project</h4>
<ul>
<? foreach($actionableassured as $actionableassuredlinks) {  //$hotproject->Banners['photo'] ?>
<li><a href="<? echo SITE_PATH.'project/'.$actionableassuredlinks->url ; ?>/"><? echo $actionableassuredlinks->heading3 ; ?></a></li>
<? } ?>
</ul>
<div class="more_item"><a href="<?=SITE_PATH.'p/assured-return-projects/'?>">More Assured Return Projects..</a></div>
</div>
</div> <? } ?>