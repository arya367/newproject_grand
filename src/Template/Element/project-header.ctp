<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top inner_header">
<div class="container">
<a class="navbar-brand" href="<?=ROOT_PATH?>"><img src="<?=SITE_PATH?>images/logo.png" alt="" class="img-fluid"></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#home_menu" aria-controls="home_menu" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="home_menu">
<span class="mr-auto"></span>
<ul class="navbar-nav">
<li class="nav-item <? if($this->request->params['action']=='display'){?> active <? } ?>"><a class="nav-link" href="<?=ROOT_PATH?>">Home</a></li>
<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true">Projects </a>
<div class="dropdown-menu" aria-labelledby="navbarDropdown">
<?php echo  $this->cell('Common::homemenu');?>
</div>
</li>
<li class="nav-item  <? if($this->request->params['action']=='contactus'){?> active <? } ?>"><a class="nav-link" href="<?=ROOT_PATH?>contact-us">Contact Us</a></li>
<?php /*?><li class="nav-item"><a class="nav-link" href="javascript:void(0);">+91 9811 999 666</a></li><?php */?>
</ul>
</div>
</div>
</nav>