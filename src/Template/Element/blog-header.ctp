<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
<div class="container">
<a class="navbar-brand" href="<?=SITE_PATH?>post"><img src="<?=SITE_PATH?>images/logo-blog.png" alt="YOO Blog" class="img-fluid"></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#home_menu" aria-controls="home_menu" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="home_menu">
<span class="mr-auto"></span>
<ul class="navbar-nav">
<li class="nav-item"><a class="nav-link btn btn-outline-secondary" href="<?=SITE_PATH?>">Home</a></li>
<li class="nav-item  <? if($this->request->params['action']=='contactus'){?> active <? } ?>"><a class="nav-link btn btn-outline-secondary" href="<?=ROOT_PATH?>contact-us">Contact Us</a></li>
<?php /*?><li class="nav-item"><a class="nav-link" href="javascript:void(0);">+91 9811 999 666</a></li><?php */?>
</ul>
</div>
</div>
</nav>