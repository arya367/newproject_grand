<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title><? print_r(trim($seo_title));?></title>
<meta name="description" content="<? print_r(trim($seo_description));?>">
<link rel="canonical" href="<? print_r($canonical);?>">
<?php  echo $this->element('blog-common'); ?>
</head>
<body>
<?php echo $this->element('blog-header'); ?>
<main>
<section class="blg_bg"></section>
<section class="blg_content">
<div class="container">
<div class="row">
<div class="col-md-12">
<figure class="blog_banner"><img src="<? print_r(SITE_PATH.'img/blogs/orig/'.$blog[0]['image']); ?>" class="img-fluid" alt="<? print_r($blog[0]['name']); ?>"></figure>
<nav>
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="<?=SITE_PATH?>">Home</a></li>
<li class="breadcrumb-item"><a href="<?=SITE_PATH?>post/">Blogs</a></li>
<li class="breadcrumb-item active" aria-current="page"><? print_r($blog[0]['name']); ?></li>
</ol>
</nav>
</div>
</div>

<div class="row my-4">
<div class="col-lg-7 order-lg-2 order-md-2">
<div class="blg_mdl">
<?php  echo $this->fetch('content'); ?>
<div class="row justify-content-between blg_pager">
  <?  if($blog2[0]['url']!='') {?> <div class="col-6"><a href="<?=SITE_PATH.'post/'?><? print_r($blog2[0]['url']);?>" class="text-left"><div class="pager_name"><? print_r($blog2[0]['name']);?></div> <button class="btn btn-warning">&larr; Previous</button></a></div><? }?>
 <? if($blog1[0]['url']!='') {?> <div class="col-6"><a href="<?=SITE_PATH.'post/'?><? print_r($blog1[0]['url']);?>/" class="text-right"><div class="pager_name"><? print_r($blog1[0]['name']);?></div> <button class="btn btn-warning">Next &rarr;</button></a></div> <? } ?>
</div>


</div>
</div>
<?=$this->cell('Common::recentPosts')?>
<div class="col-lg-3 order-last">
<div class="blg_last">
<div class="blog_abt">
<div class="h4">About Admin</div>
<span class="heading_bdr"></span>
<? foreach($auth as $user) {?>
<p><?=$user['about_user'];?></p>
<? } ?>
</div>
<div class="h4">Have any Questions?</div>
<span class="heading_bdr"></span>
<div class="pr_form">
<div class="form_inner">
<?php // echo $msg->display();?>
<form role="form"  name="form1" method="post" onSubmit="return validate(true);">
<div class="row">
<div class="mb-4 col-lg-12"><input type="text" name="name" class="form-control" placeholder="Enter Your Name" required></div>
<div class="mb-4 col-md-12"><input type="email" name="email" class="form-control" placeholder="Enter email" required></div>
<div class="col-md-12"><input type="hidden" name="pname" value="Blog" /></div>
<div class="mb-4 col-md-12"><div class="input-group"><select name="country" id="country" onchange="countrycode(this.options[this.selectedIndex].value)" class="form-control" required><option value="">Select Country</option></select><div class="input-group-prepend"><span class="input-group-text" id="phonecode"></span>
</div><input type="tel" name="phone" placeholder="Phone No." class="form-control" value="" required></div>
</div>
<input type="hidden" name="comment" value="I need to know more about this project" />
<div class="col-md-12 text-center"><input type="submit" name="Submit" class="btn btn-dark" value="Submit"></div>
</div>
</form>
</div>
</div>

</div>
</div>
</div>
</div>
</section>
</main>
<?php  echo $this->element('blog-footer'); ?>
<script src="<?=CDN_PATH?>js/global.js" type="text/javascript"></script>
</body>
</html>