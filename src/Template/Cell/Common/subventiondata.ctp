<? if(iterator_count($actionablesubvention)) { ?> <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 col-xsmall">
<div class="action_list1">
<h4>Subvention Scheme</h4>
<ul>
<? foreach($actionablesubvention as $actionablesubventionlinks) {  //$hotproject->Banners['photo'] ?>
<li><a href="<? echo SITE_PATH.'project/'.$actionablesubventionlinks->url ; ?>/"><? echo $actionablesubventionlinks->heading3 ; ?></a></li>
<? } ?>
</ul>
<div class="more_item"><a href="<?=SITE_PATH.'p/projects-under-subvention-scheme/'?>">More Subvention Projects..</a></div>
</div>
</div> <? } ?>