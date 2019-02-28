<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
<div class="container-fluid">
<a class="navbar-brand" href="<?=SITE_PATH?>project/<?=$url."/".$value['url']?>"><img src="<? echo SITE_PATH.'img/property/logo/'.$projects[0]['property_logo']; ?>" alt="<? echo $projects[0]['name']; ?>" class="img-fluid"></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#home_menu" aria-controls="home_menu" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="home_menu">
<span class="mr-auto"></span>
<ul class="navbar-nav">
<li class="nav-item <? if(!isset($this->request->params['pass'][1])){ ?> active <? } ?>"><a class="nav-link" href="<?=SITE_PATH?>project/<?=$url?>/">Overview</a></li>
<?  if(!empty($alltabs)) { foreach($alltabs as $key=>$value){ if($value['catid']==0) { ?>

<li class="nav-item <? if(isset($this->request->params['pass'][1]) and $this->request->params['pass'][1]==$value['url']){ ?> active  <? } ?>"><a class="nav-link" href="<?=SITE_PATH?>project/<?=$url."/".$value['url']?>/"><?=$value['name']?></a></li>
<?  } } } ?>
<?php /*?><li class="nav-item"><a class="nav-link" href="javascript:void(0);"> +91 9811 999 666</a></li><?php */?>
</ul></div></div>
</nav>