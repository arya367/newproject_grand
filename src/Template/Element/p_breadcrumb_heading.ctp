<div class="row">
<div class="col-md-8">
<nav>
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="<?=SITE_PATH?>">Home</a></li>
<li class="breadcrumb-item"><a href="<?=SITE_PATH?>project/">Projects</a></li>
<li class="breadcrumb-item"><a href="<?=SITE_PATH?>project/<?=$url."/".$value['url']?>"><? print_r($projects[0]['name']);?></a></li>
<? if($this->request->params['pass'][1]=='specifications'){?>
<li class="breadcrumb-item active" aria-current="page">Specifications</li>
<? } elseif($this->request->params['pass'][1]=='price-list') {?>
<li class="breadcrumb-item active" aria-current="page">Price list</li>
<? } elseif($this->request->params['pass'][1]=='location-map') {?>
<li class="breadcrumb-item active" aria-current="page">Location map</li>
<? } elseif($this->request->params['pass'][1]=='master-plan') {?>
<li class="breadcrumb-item active" aria-current="page">Master plan</li>
<? } elseif($this->request->params['pass'][1]=='floor-plan') {?>
<li class="breadcrumb-item active" aria-current="page">Floor plan</li>
<? } elseif($this->request->params['pass'][1]=='gallery') {?>
<li class="breadcrumb-item active" aria-current="page">Gallery</li>
<? } else {?>
<li class="breadcrumb-item active" aria-current="page">Overview</li>
<? } ?>
</ol>
</nav>
<h1><?=$title;?></h1>
</div>
</div>