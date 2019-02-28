<!doctype html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Thank You</title>
<?php  echo $this->element('common-hco'); ?>
<link rel="canonical" href="<? print_r($canonical);?>">
</head>
<body>
<?php  echo $this->element('header'); ?>
<main>
<section class="tnk_bg"></section>
<section class="thnk_white">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="thank_con">
<figure><img src="<?=SITE_PATH?>images/thank-you.png" alt="Thank You" width="256" height="256" class="img-fluid"></figure>
<div class="lead plist_frmheading theme_color">We at www.yoonewprojects.com would like to thank you for your interest in our services and contacting us.</div>
<p class="lead">We really appreciate you giving us a moment of your time today. Thanks for being you.</p>
<div class="text-center"><a href="<?=SITE_PATH?>" class="btn btn-outline-primary">Go Home</a></div>
</div></div>
</div>
</div>
</section>
</main>
<?php  echo $this->element('footer-home'); ?>
</body>
</html>