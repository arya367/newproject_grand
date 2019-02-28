<? if(iterator_count($actionablebuyBack)) { ?> <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 col-xsmall">
<div class="action_list1">
<h4>Buy Back Scheme Project</h4>
<ul>
<? foreach($actionablebuyBack as $actionablebuyBacklinks) {  //$hotproject->Banners['photo'] ?>
<li><a href="<? echo SITE_PATH.'project/'.$actionablebuyBacklinks->url ; ?>/"><? echo $actionablebuyBacklinks->heading3 ; ?></a></li>
<? } ?>
</ul>
<?php /*?><div class="text-right"><a href="">More..</a></div><?php */?>
</div>
</div> <? } ?>