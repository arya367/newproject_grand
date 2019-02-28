<? if( isset($result) and !empty($result)) { ?> 
<div class="col-lg-2 order-lg-1 order-md-1">
<div class="blg_left">
<div class="h4">Recent Blogs..</div>
<span class="heading_bdr"></span>
<ul>
<? foreach($result as $data) {?>
<li><a href="<?=SITE_PATH?>post/<? echo $data['url'] ; ?>/"><? echo $data['name'] ; ?></a></li>
<? } ?>
</ul>
</div>
</div>
<? } ?>