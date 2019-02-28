<!doctype html>
<style type="text/css">#gotoQ{display:none !important;}</style>
<title><? print_r(trim($seo_title));?></title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="<? print_r(trim($seo_description));?>">
<link rel="canonical" href="<? print_r($canonical);?>">
<?php  echo $this->element('common-hco'); ?>
</head>
<body>
<?php  echo $this->element('header'); ?>
<main>
<section class="contact_bg" style="background-image:url(../images/contact-bg.jpg);"></section>
<section class="contct_con">
<div class="container">
<div class="row justify-content-center">
<div class="col-md-11"><div class="contact_white">
<div class="row">
<div class="col-md-7">
<div class="contact_left">
<div class="contact_heading"><div class="h3">Have any Questions?</div>We believe in protecting our customers and sefeguarding their future.</div>
<div class="form_content">
<?php // echo $msg->display();?>
<form role="form"  name="form1" method="post" onSubmit="return validate(true);">
<div class="row">
<div class="col-md-6 mb-5"><input type="text" name="name" class="form-control" placeholder="Enter Your Name" required></div>
<div class="col-md-6 mb-5"><input type="email" name="email" class="form-control" placeholder="Enter email" required></div>
<div class="col-md-6 mb-5"><select name="pname" class="form-control" required>
<option value="">Select Project</option>
<? foreach($query as $project) { ?>
<option value="<? echo $project->name;?>"><? echo $project->name;?></option>
<? } ?>
</select></div>
<div class="col-md-6 mb-5">
<div class="input-group"><select name="country" id="country" onchange="countrycode(this.options[this.selectedIndex].value)" class="form-control" required><option value="">Select Country</option></select><div class="input-group-prepend"><span class="input-group-text" id="phonecode"></span>
</div><input type="tel" name="phone" placeholder="Phone No." class="form-control" value="" required></div>
</div>

<div class="col-md-12 text-center"><input type="submit" name="Submit" class="btn btn-dark" value="Submit"></div>
</div>
</form>
</div>
</div>

</div>
<div class="col-md-5 contact_dark">
<div class="contact_info">Contact With Us!</div>
<div class="offices"><img src="<?=SITE_PATH?>images/contact-ofc.jpg" class="img-fluid"></div>
</div>
</div></div>
</div>
</div>
</section>
</main>
<?php  echo $this->element('footer-home'); ?>
<script async type="text/javascript" src="<?=SITE_PATH?>js/global.js"></script>
</body>
</html>