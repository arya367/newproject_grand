<div class="container">
<div class="row menu_margin">
<div class="col-lg-8">
<div class="menu_bar" id="menu_affix" data-spy="affix" data-offset-top="400">
<nav class="navbar navbar-default">
<div class="navbar-header">
<a class="navbar-brand p_interest" href="#m_form">Interested?</a>
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
</div>
<div id="navbar" class="navbar-collapse collapse">
<ul class="nav navbar-nav">
<li<? if(!isset($this->request->params['pass'][1])){ ?> class="active"<? } ?>><a itemprop="url" href="<?=SITE_PATH?>project/<?=$url?>/">Overview</a></li>
<?  if(!empty($alltabs)) { foreach($alltabs as $key=>$value){ if($value['catid']==0) { ?>
<? if($value['url']=='gallery') { ?>

<li class="dropdown<? if(isset($this->request->params['pass'][1]) and $this->request->params['pass'][1]==$value['url']){ ?> active <? } ?>">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Gallery <span class="caret"></span></a>

<ul class="dropdown-menu" role="menu">
<? foreach($bannerurls as $banurls) { ?>
<li><a href="<?=SITE_PATH.'project/'.$url.'/'.$banurls['type']?>/"><? echo ucwords(str_replace('-',' ',$banurls['type'])); ?></a></li>
<? } ?> 
<? if($projects[0]['youtube_url']!='') { ?><li><a href="<?=SITE_PATH.'project/'.$url.'/project-walkthrough'?>/">Walkthrough</a></li><? } ?>
</ul>
</li>
<? } else { ?>
<li<? if(isset($this->request->params['pass'][1]) and $this->request->params['pass'][1]==$value['url']){ ?> class="active" <? } ?>><a href="<?=SITE_PATH?>project/<?=$url."/".$value['url']?>/"><?=$value['name']?></a></li>
<? } } } } ?>

<?  if(!empty($pdf)) { ?><li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Download <span class="caret"></span></a>
<ul class="dropdown-menu" role="menu">
<? foreach($pdf as $downkey=>$downloadpdf) { if($downloadpdf!='') { ?>
<li><a href="<? echo SITE_PATH.'img/property/documents/'.$downloadpdf?>" target="_blank"><? echo ucwords(str_replace('-',' ',$downkey)); ?></a></li>
<? }} ?>
</ul>
</li><? } ?>
</ul>
</div>
</nav>
</div></div>

</div>
</div>





<? /*?>

<div class="menu_bar" id="menu_affix" data-spy="affix" data-offset-top="80"><nav class="navbar navbar-default">
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
</div>
<div id="navbar" class="navbar-collapse collapse">
<ul class="nav navbar-nav">
<li<? if(!isset($this->request->params['pass'][1])){ ?> class="active"<? } ?>><a href="<?=SITE_PATH?>project/<?=$url?>/">Overview</a></li>
<?  if(!empty($alltabs)) { foreach($alltabs as $key=>$value){ if($value['catid']==0) { ?>
<? if($value['url']=='gallery') { ?>

<li class="dropdown<? if(isset($this->request->params['pass'][1]) and $this->request->params['pass'][1]==$value['url']){ ?> active <? } ?>">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Gallery <span class="caret"></span></a>
<ul class="dropdown-menu" role="menu">
<? foreach($bannerurls as $banurls) { ?>
<li><a href="<?=SITE_PATH.'project/'.$url.'/'.$banurls['type']?>/"><? echo ucwords(str_replace('-',' ',$banurls['type'])); ?></a></li>
<? } ?> 
<? if($projects[0]['youtube_url']!='') { ?><li><a href="<?=SITE_PATH.'project/'.$url.'/project-walkthrough'?>/">Walkthrough</a></li><? } ?>
</ul>
</li>
<? } else { ?>
<li<? if(isset($this->request->params['pass'][1]) and $this->request->params['pass'][1]==$value['url']){ ?> class="active" <? } ?>><a href="<?=SITE_PATH?>project/<?=$url."/".$value['url']?>/"><?=$value['name']?></a></li>
<? } } } } ?>

<?  if(!empty($pdf)) { ?><li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Download <span class="caret"></span></a>
<ul class="dropdown-menu" role="menu">
<? foreach($pdf as $downkey=>$downloadpdf) { if($downloadpdf!='') { ?>
<li><a href="<? echo SITE_PATH.'img/property/documents/'.$downloadpdf?>" target="_blank"><? echo ucwords(str_replace('-',' ',$downkey)); ?></a></li>
<? }} ?>
</ul>
</li><? } ?>
</ul>
</div>
</nav></div>
<? */?>