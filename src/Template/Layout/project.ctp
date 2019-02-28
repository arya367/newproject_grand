<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?php  echo $this->element('common-hco'); ?>
<link rel="stylesheet" href="<?=CDN_PATH?>css/project-page.css">
<title><? print_r(trim($seo_title));?></title>
<meta name="description" content="<? print_r(trim($seo_description));?>">
<link rel="canonical" href="<? print_r($canonical);?>">
<META NAME="ROBOTS" CONTENT="<? print_r($follow);?>">
</head>
<body>
<? echo $this->element('inner-header');?>
<main>
<? echo $this->element('project-banner');?>
<section class="pr_main">
<div class="container">
<? echo $this->element('p_breadcrumb_heading');?>

<div class="white_bg">
<div class="row">
<? echo $this->element('project-form');?>
<?php  echo $this->fetch('content'); ?>
<?php  echo $this->element('amenities'); ?>
<? if(isset($connectivity)) { if(count($connectivity)!=0) { ?>
<section class="prj_location">
<div class="container">
<div class="row">
<div class="col-lg-6">
<div class="prject_heading"><h4><?=$title?> - Location Advantage</h4></div>
<ol class="location_list">
<? foreach($connectivity as $conn) { ?><li><? echo $conn['name']?></li><? }?>
</ol>
</div>
<div class="col-lg-6 loc_img">
<figure><img src="<?=SITE_PATH?>images/map-location-pin.jpg" alt="Dynamic Name" class="img-fluid"></figure>
<div class="location_more"><a href="<?=SITE_PATH?>project/<?=$url?>/location-map" class="btn btn-outline-dark">Explore Neighbourhood</a></div>
</div>
</div>
</div>
</section>
<? }}?>
</main>
<div id="gotoQ"><i class="env_icon"></i></div>
<?php  echo $this->element('footer-projects'); ?>
<script src="<?=CDN_PATH?>js/global.js" type="text/javascript"></script>

</body>
</html>