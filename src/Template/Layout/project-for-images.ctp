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

<?php  //echo $this->element('amenities'); ?>
</main>
<div id="gotoQ"><i class="env_icon"></i></div>
<? if ($this->request->params['pass'][1]=='location-map') {?>
<?php  echo $this->element('footer-for-location'); ?>
<? } else {?>
<?php  echo $this->element('footer-projects'); ?>
<? }?>
<script src="<?=CDN_PATH?>js/global.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.2/dist/jquery.fancybox.min.css" />
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.2/dist/jquery.fancybox.min.js"></script>
		
</body>
</html>