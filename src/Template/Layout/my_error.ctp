<!doctype html>
<meta charset="UTF-8">
<title>Page Not Found</title>
<meta name="description" content="">
<?php /*?><link rel="canonical" href="<? print_r($canonical);?>"><?php */?>
<?php  echo $this->element('common-hco'); ?>
</head>
<body>
<main>
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="error_con">
<figure><img src="<?=SITE_PATH?>images/error-img.jpg" alt="404" width="400" height="195" class="img-fluid"></figure>
<div class="lead plist_frmheading theme_color">You have some problems</div>
<p class="lead">The Page you are looking for was moved, removed or might nver existed</p>
<div class="text-center"><a href="<?=SITE_PATH?>" class="btn btn-outline-primary">Go Home</a></div>
</div></div>
</div>
</div>
</main>
</body>
</html>