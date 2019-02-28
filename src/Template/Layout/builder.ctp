<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><? print_r(trim($seo_title));?></title>
<meta name="description" content="<? print_r(trim($seo_description));?>">
<link rel="canonical" href="<? print_r($canonical);?>">
<? print_r($robots);?>
<meta http-equiv="expires" content="<?=gmdate("D, d M Y H:i:s", time() + (3600*24)) . ' GMT'?>">
<meta http-equiv="pragma" content="no-cache">
<link rel="author" href="<?=SITE_PATH?>">
<?php  echo $this->element('common-hco'); ?>
<link href="<?=CDN_PATH?>css/builder.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php  echo $this->element('inner-header'); ?>
<div class="content-wrapper">
<div class="grey_bg"><div class="container">
<div class="row"><div class="col-lg-12"><ol class="breadcrumb"><li><a href="<?=SITE_PATH?>">Home</a></li><li><a href="<?=SITE_PATH?>/builder/">Builder</a></li></ol></div></div></div></div>
<div class="builder_bg">
<div class="description_bg">
<div class="container">
<div class="row"><div class="col-lg-12"><h1><?=$title?></h1></div></div>
<div class="row"><div class="col-lg-12"><?=$description?></div></div></div></div></div>
<div class="white_bg paddingTB20">
<div class="container">
<div class="row"><?=$this->fetch('content'); ?></div>
<div class="row"><div class="col-lg-12"><?=$this->cell('Paging::builderpaging',[$currentpage,$total,$table,$paginglink]);?></div></div>
</div></div>
<?php  echo $this->element('footer'); ?>
</body>
</html>