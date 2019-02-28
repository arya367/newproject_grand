<? use Cake\Datasource\ConnectionManager; $connection = ConnectionManager::get('default');?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><? print_r(trim($seo_title));?></title>
<meta name="description" content="<? print_r(trim($seo_description));?>">
<link rel="canonical" href="<? print_r($canonical);?>">
<link href="<?=CDN_PATH?>css/project_list.css" rel="stylesheet" type="text/css" />
<?php  echo $this->element('common-hco'); ?>
</head>
<body>
<?php  echo $this->element('inner-header'); ?>
<div class="content-wrapper">
<div class="container">
<div class="row">
<div class="col-lg-12"><ol itemprop="breadcrumb" class="breadcrumb"><li><a href="<?=SITE_PATH?>" itemprop="url" class="brd_icon">Home</a></li><li>Sitemaps</li></ol></div></div>

</div>
</div>
<div class="white_bg">
<div class="container">
<div class="row"><div class="col-lg-12 text-center paddingB30 paddingT20"><h1><? echo $title; ?></h1></div></div>
<div class="row">
<div class="col-md-9 col-md-offset-2 paddingB40">
<div class="row">
<?=$this->cell('Common::sitemapdata');?>
<div class="col-md-3"><div class="sitemap_list">
<div class="site_head1">Recommended</div>
<ul>
<?php /*?><? foreach($recommendedprojects as $recommendedprojectslinks) { ?><?php */?>
<li><a href="<? echo SITE_PATH.'p/projects-under-plp-plan/'; ?>">Projects Under PLP Plan</a></li>
<li><a href="<? echo SITE_PATH.'p/projects-under-subvention-scheme/'; ?>">Subvention Scheme Projects</a></li>
<li><a href="<? echo SITE_PATH.'p/assured-return-projects/'; ?>">Assured Return Projects</a></li>
<li><a href="<? echo SITE_PATH.'p/projects-under-monthly-rental-scheme/'; ?>">Monthly Rental Scheme</a></li>
<li><a href="<? echo SITE_PATH.'p/projects-under-buy-back-scheme/'; ?>">Buy Back Scheme</a></li>

<?php /*?><? } ?><?php */?>
</ul>
</div></div>
<div class="col-md-3"><div class="sitemap_list">
<div class="site_head1">Our Company</div>
<ul>
<li><a href="<?=SITE_PATH?>">Home</a></li>
<li><a href="<?=SITE_PATH?>about-us/">About Us</a></li>
<li><a href="<?=SITE_PATH?>contact-us/">Contact Us</a></li>
<li><a href="<?=SITE_PATH?>nri-real-estate-investment/">NRI</a></li>
<li><a href="<?=SITE_PATH?>disclaimer/">Disclaimer</a></li>
<li><a href="<?=SITE_PATH?>">Blog</a></li>
<li><a href="<?=SITE_PATH?>post/">Post</a></li>
</ul>
</div></div>
</div>
</div>
</div>
</div>
</div>

<div class="grey_bg">
<div class="container">

<div class="row">
<div class="col-lg-12 paddingT20 paddingB30">
<div class="sitemap_headbig paddingT20">Real Estate Developers in India</div>
<hr />
<section id="sitemap_content">
<? $builder=$connection->execute("select name,id,url from builders where status='active' order by name asc ")->fetchAll('assoc'); if(!empty($builder)) { foreach($builder as $bkey=>$builders) { ?>
<article class="white-panel"> 
<div class="site_head2"><a href="<?=SITE_PATH.'builder/'.$builders['url'];?>/"><?=$builders['name']?></a></div>
<ul>
<? $buildersproject = $connection->execute("select pro.heading3,pro.url from properties as pro  where pro.status='active' and pro.builder_id=:id  order by name asc ",['id'=>$builders['id']])->fetchAll('assoc'); 
if(!empty($buildersproject)) { foreach($buildersproject as $bpkey=>$bplist) { ?>
<li><a href="<?=SITE_PATH.'project/'.$bplist['url'];?>/"><? echo $bplist['heading3']; ?></a></li>
<? } } ?>
</ul>
</article>
<? } } ?>
<div class="clear"></div>
</section>
</div>

</div>
</div>
</div>
<?php  echo $this->element('footer'); ?>
<script src="<?=CDN_PATH?>js/grid.js"></script> 
<script>
$(document).ready(function() {
$('#sitemap_content').sitemap_grid({
no_columns: 4,
padding_x: 10,
padding_y: 10,
margin_bottom: 50,
single_column_breakpoint: 700
});
});
</script>
</body>
</html>