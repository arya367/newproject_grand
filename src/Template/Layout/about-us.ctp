<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><? print_r(trim($seo_title));?></title>
<meta name="description" content="<? print_r(trim($seo_description));?>">
<link rel="canonical" href="<? print_r($canonical);?>">
<link href="<?=CDN_PATH?>css/home.css" rel="stylesheet" type="text/css" />
<?php  echo $this->element('common-hco'); ?>
</head>
<body>
<?php  echo $this->element('inner-header'); ?>
<div class="content-wrapper">
<div class="grey_bg">
<div class="container">
<div class="row">
<div class="col-lg-12 paddingTB10 text-center">
<h1><? echo $title; ?></h1>
</div>
</div>
</div>
</div>
<div class="white_bg paddingTB20"><div class="container">
<div class="row">
<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-9 col-sm-offset-1 text-center"><div class="about_us">
<? echo $pages['0']['description']; ?>
</div>
</div>
</div>
</div></div>
</div>
<?php  echo $this->element('footer'); ?>
</body>
</html>