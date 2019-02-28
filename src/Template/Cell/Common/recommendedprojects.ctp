<? if(iterator_count($recommendedprojects)) { ?> 
<div class="col-md-3"><div class="sitemap_list">
<div class="site_head1">Recommended</div>
<ul>
<? foreach($recommendedprojects as $recommendedprojectslinks) { ?>
<li><a href="<? echo SITE_PATH.'project/'.$recommendedprojectslinks->url ; ?>/"><? echo $recommendedprojectslinks->heading3 ; ?></a></li>
<? } ?>
</ul>
</div></div> <? } ?>