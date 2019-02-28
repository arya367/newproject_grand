<?  if($total!=0) { foreach($news as $key=>$value) { ?><div class="row"><div class="col-lg-12">
<article class="blg_con">
<div class="blg_top">
<div class="cir_date">
<div class="blg_date"><time datetime=""><a class="d_month" href="#"><? print_r(date('M',strtotime($value['created']))); ?></a><span class="d_date"><? print_r(date('d',strtotime($value['created']))); ?></span><a class="d_year" href="#"><? print_r(date('Y',strtotime($value['created']))); ?></a></time></div></div>
<div class="blg_title"><h2><a href="<?=SITE_PATH.'post/'?><?=$value['url']?>/"><?=$value['name']?></a></h2><div class="author"><i class="glyphicon glyphicon-user"></i> <a href="<?=SITE_PATH?>author/<?=$value['ausername']?>/"> <?=$value['aname']?></a></div></div></div>
<div class="blg_inner">
<?=$value['short_post'];?> <a href="<?=SITE_PATH.'post/'?><?=$value['url']?>/">Continue reading <i class="glyphicon glyphicon-chevron-right"></i></a></p>
<?php /*?><div class="blg_tag">TAGS: <span><a href="">Real Estates</a></span>, <span><a href="">Gurgaon</a></span></div><?php */?>
</div>
<div></div>
<p class="clearfix"></p>
</article>
</div></div>
<? } ?>
<?=$this->cell('Paging',[$currentpage,$total,$table,$paginglink]);?>
<? }  else { echo '<div class="message warning" id="flashMessage">DATA NOT FOUND</div>'; } ?>