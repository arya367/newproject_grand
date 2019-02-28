<? if(iterator_count($actionableplp)) { ?> <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 col-xsmall">
<div class="action_list1">
<h4>Possession Linked Plan (PLP)</h4>
<ul>
<? foreach($actionableplp as $actionableplplinks) {  //$hotproject->Banners['photo'] ?>
<li><a href="<? echo SITE_PATH.'project/'.$actionableplplinks->url ; ?>/"><? echo $actionableplplinks->heading3 ; ?></a></li>
<? } ?>
</ul>
<div class="more_item"><a href="<?=SITE_PATH.'p/projects-under-plp-plan/'?>">More PLP Projects..</a></div>
</div>
</div> <? } ?>