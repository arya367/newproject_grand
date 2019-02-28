<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Real Estate News, Project, Property Offers & Updates – YOO Project</title>
<meta name="description" content="Read authentic property news, real estate updates, blog, project deals, trends policy, property schemes & offers of YOO Project.">
<link rel="canonical" href="<? print_r($canonical);?>">
<? echo $robots; ?>
<?php  echo $this->element('blog-common'); ?>
</head>
<body>
<?php  echo $this->element('blog-header'); ?>
<main>
<section class="blg_list_bg">
<div class="container">
<div class="row justify-content-center">
<div class="col-md-8"><h1>Take Your Knowledge To Another Level - Ready The Best!!!</h1>
<!-- <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what's most interesting in this post's contents.</p> --></div>
</div>
</div>
</section>

<section class="container my-5">
<div class="row">
<?php  echo $this->fetch('content'); ?>
</div>
<div class="row">
<div class="col-md-12">
<?=$this->cell('Paging',[$currentpage,$total,$table,$paginglink]);?>
</div>
</div>
</section>

</main>
<?php  echo $this->element('blog-footer'); ?>
</body>
</html>