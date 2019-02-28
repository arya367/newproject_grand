<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title><?=trim($title)?></title>
<meta name="description" content="<?=trim($seo_description)?>">
<?php  echo $this->element('common-hco'); ?>
<link rel="canonical" href="<?=ROOT_PATH?>" />
<meta name="p:domain_verify" content="c5884eb504461f4c853545f81b67764e"/>
<meta name="google-site-verification" content="ZQsyUi4IV2u9MdvPPug_rqdNbDbUMVOv9SHzOaXt1jE" />
</head>
<body>
<?php  echo $this->element('header'); ?>
<?php  echo $this->element('banner'); ?>
<section class="hm_overview">
<div class="container">
<div class="row">
<div class="col-lg-3 col-md-3 col-sm-6"><div class="ovw_box"><i class="hm_icon hm_designs"></i> <span>Design</span> World’s top interior designers for top notch hotel & residential developments</div></div>
<div class="col-lg-3 col-md-3 col-sm-6"><div class="ovw_box"><i class="hm_icon hm_pres"></i> <span>Presence</span> Delivered more than 80 projects with impressive designs</div></div>
<div class="col-lg-3 col-md-3 col-sm-6"><div class="ovw_box"><i class="hm_icon hm_velocity"></i> <span>3V</span> They work on Value with Velocity to increase Visibility</div></div>
<div class="col-lg-3 col-md-3 col-sm-6"><div class="ovw_box"><i class="hm_icon hm_achiev"></i> <span>Achievements</span> YOO multi awarding winning property international brand</div></div>
</div>

<div class="row">
<div class="col-md-12">
<div class="description">
<h1>YOO New Projects</h1>
<?=$description?>
</div>

<div class="text-md-right theme_color"><a href="javascript:void(0);" onclick="myFunction()" id="myBtn">Read More &darr;</a></div>

</div>
</div>
</div>
</div>
</section>
<section class="hm_prj">
<div class="container">
<div class="row">
<div class="col-md-12"><div class="prj_heading"><h2>YOO Prominent Projects </h2> <span>Exclusive range of projects highlighting International level designs</span></div></div>
</div>
<div class="row">
<div class="col-md-12">
<div id="hmproject_slider" class="carousel slide" data-ride="carousel">
<div class="carousel-inner">
<?=$this->cell('Common::latestprojects');?>
</div>
<a class="carousel-control-prev" href="#hmproject_slider" role="button" data-slide="prev">
<span class="carousel-control-prev-icon" aria-hidden="true"></span>
</a>
<a class="carousel-control-next" href="#hmproject_slider" role="button" data-slide="next">
<span class="carousel-control-next-icon" aria-hidden="true"></span>
</a>
</div>
</div>
</div>
</div>
</section>
<section class="hm_contact">
<div class="container">
<div class="row">
<div class="col-md-12"><div class="contact_heading"><div class="h3">Have any Questions?</div>We believe in protecting our customers and sefeguarding their future.</div></div>
</div>
<div class="row justify-content-center">
<div class="col-lg-7 col-md-9">
<div class="form_content">
<?php // echo $msg->display();?>
<form role="form"  name="form1" method="post" onSubmit="return validate(true);">
<div class="row">
<div class="col-md-6 mb-4"><input type="text" name="name" class="form-control" placeholder="Enter Your Name" required></div>
<div class="col-md-6 mb-4"><input type="email" name="email" class="form-control" placeholder="Enter email" required></div>
<div class="col-md-6 mb-4"><select name="pname" class="form-control" required>
<option value="">Select Projects</option>
<? foreach($fromprojects as $projects) {
?>
<option value="<?=$projects->name?>"><?=$projects->name?></option>
<? } ?>
</select>
</div>
<div class="col-md-6 mb-4">
<div class="input-group"><select name="country" id="country" onchange="countrycode(this.options[this.selectedIndex].value)" class="form-control" required><option value="">Select Country</option></select><div class="input-group-prepend"><span class="input-group-text" id="phonecode"></span>
</div><input type="tel" name="phone" placeholder="Phone No." class="form-control" value="" required></div>
<input type="hidden" name="comment" value="I need to know more about this project" />
</div>
<div class="col-md-12 text-center"><input type="submit" name="Submit" class="btn btn-dark" value="Submit"></div>
</div>
</form>
<div class="row">
<div class="col-md-6"></div>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="hm_blog">
<div class="container">
<div class="row">
<div class="col-md-12"><div class="contact_heading"><h4>Reviews, News, Blogs and more </h4>Stay updated with the latest information. Read them anywhere</div></div>
</div>
<div class="row">
<div class="col-lg-6">
<? 
	//print_r($homepress);    ?>
<div class="big_blg">
<div class="row">
<div class="col-md-6"><div class="big_b_iner">
<h5><?=$homepress['0']['name'] ; ?></h5>
<div class="p_date">Date : <? $date=strtotime($homepress['0']['created']) ; echo date( 'd-M-Y', $date );?>  | By  Admin</div>
<p><? echo substr($homepress['0']['short_post'],0,100) ; ?>...</p>
<a href="<? echo SITE_PATH.'post/'.$homepress['0']['url'] ; ?>" class="btn btn-outline-warning btn-sm">Read More..</a>
</div></div>
 <?php if($homepress['0']['more_images']!="") { $blogs=@explode("##",$homepress['0']['more_images']); if(!empty($blogs)) { foreach ($blogs as $val): if($val!="") { ?>
<div class="col-md-6 blog_thumb" style="background-image:url(<?=SITE_PATH?>img/blogs/<?php echo h($val); ?>);"></div>
<?php } endforeach; } } ?>
</div>
</div>
</div>
<div class="col-lg-6">
<? 
$i==0;
foreach($homepress as $secondshiftdata) {
$i++; ?>
<? if($i=='1'){?> <? } else { ?>
<div class="sml_blg">
<a href="<? echo SITE_PATH.'post/'.$secondshiftdata['url'] ; ?>">
<?php if($secondshiftdata['more_images']!="") { $blogs=@explode("##",$secondshiftdata['more_images']); if(!empty($blogs)) { foreach ($blogs as $val): if($val!="") { ?>
<div class="sml_thumb" style="background-image:url(<?=SITE_PATH?>img/blogs/<?php echo h($val); ?>);"></div>
<?php } endforeach; } } ?>
<h5><? echo substr ($secondshiftdata['name'],0,73) ; ?></h5>
<div class="p_date">Date : <? $date=strtotime($secondshiftdata['created']) ; echo date( 'd-M-Y', $date );?> | By  Admin</div>
</a>
</div>
<?  } }?>
</div>
<div class="col-md-12 text-center my-2"><a href="<?=SITE_PATH?>post/" class="btn btn-outline-dark">Read More Blogs..</a></div>
</div>
</div>
</section>
</main>
<div id="gotoQ"><i class="env_icon"></i></div>
<?php  echo $this->element('footer-home'); ?>
<script src="<?=CDN_PATH?>js/global.js" type="text/javascript"></script>
</body>
</html>