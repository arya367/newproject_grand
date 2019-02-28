<?  if($total!=0) { foreach($news as $key=>$value) { ?>
<div class="col-lg-6">
<div class="blg_main">
<div class="row">
<div class="col-md-7 col-sm-7">
<div class="blg_inner_list">
<h2><a href="<?=SITE_PATH.'post/'?><?=$value['url']?>/"><?=$value['name']?></a></h2>
<div class="author_date"><? print_r(date('M',strtotime($value['created']))); ?> <span class="d_date"> <? print_r(date('d',strtotime($value['created']))); ?></span> , <? print_r(date('Y',strtotime($value['created']))); ?></div>
<p><?=$value['short_post'];?>...</p>
<a href="<?=SITE_PATH.'post/'?><?=$value['url']?>/" class="btn btn-outline-dark btn-sm">Continue reading</a>
</div>

</div>
<?php if($value['more_images']!="") { $blogs=@explode("##",$value['more_images']); if(!empty($blogs)) { foreach ($blogs as $val): if($val!="") { ?>
<div class="col-md-5 col-sm-5 blg_list_thumb" style="background-image:url(<?=SITE_PATH ?>img/blogs/<?php echo h($val); ?>);"></div>
<?php } endforeach; } } ?>
</div>
</div>	
</div>
<? } ?>

<? }  else { echo '<div class="message warning" id="flashMessage">DATA NOT FOUND</div>'; } ?>