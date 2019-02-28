<!doctype html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title><? print_r($seo_title);?></title>
<meta name="description" content="<? print_r($seo_description);?>">
<link rel="canonical" href="<? print_r($canonical);?>">
<? print_r($robots);?>
<meta http-equiv="expires" content="<?=gmdate("D, d M Y H:i:s", time() + (3600*24)) . ' GMT'?>">
<meta http-equiv="pragma" content="no-cache">
<link rel="author" href="<?=SITE_PATH?>">
<?php  echo $this->element('common-hco'); ?>
<style type="text/css">#gotoQ{display:none !important;}</style>
</head>
<body>
<?php  echo $this->element('project-header'); ?>
<main>
<section class="plist_con">
<div class="breadcrumb_bg">
<div class="container">
<div class="row">
<div class="col-md-12">
<nav>
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="<?=SITE_PATH?>">Home</a></li>
<li class="breadcrumb-item active">Projects</li>
</ol>
</nav>
</div>
</div>
</div>
</div>
<div class="container py-5">
<div class="row">
<div class="col-lg-8">
 <?= $this->fetch('content') ?>
</div>
<?php  echo $this->element('projectlist-form'); ?>
</div>
</div>
</section>
</main>
<div id="gotoQ"><i class="env_icon"></i></div>
<?php  echo $this->element('footer-home'); ?>
<script src="<?=CDN_PATH?>js/global.js" type="text/javascript"></script>
</body>
</html>